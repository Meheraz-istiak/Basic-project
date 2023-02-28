<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exp_particularls;
use App\Models\exp_bill_details;
use Illuminate\Support\Facades\Auth;
use DB;



class exp_bill_detailController extends Controller
{
    public function index()
    {
        $exp_particularl_data=exp_particularls::all();
        $table_data = DB::table('exp_bill_details')
               ->join('exp_particularls','exp_bill_details.particular_id','exp_particularls.id')
               ->join('users','exp_bill_details.created_by','users.id')

               ->select('exp_bill_details.*','users.name','exp_particularls.s_name')->get();
            //    dd($table_data);

        return view('exp_bill.index',compact('exp_particularl_data','table_data'));
    }


    public function store(Request $request)
    {

        $user = Auth::user();
        // $exp_par = exp_particularls::all();

        $data = new exp_bill_details;
        $data->particular_id = $request->particular_id;
        $data->ref = $request->ref;
        $data->amount = $request->amount;
        $data->date = $request->date;
        $data->p_or_l = $request->p_or_l;
        $data->created_by = $user->id;
        $data->updated_by = $user->id;

        // dd($data);
        $data->save();
        return redirect()->back()->with('msg','Expanse information successfully store');


    }


    public function edit($id)
    {
        $exp_particularl_data=exp_particularls::all();

        $table_data = DB::table('exp_bill_details')
               ->join('exp_particularls','exp_bill_details.particular_id','exp_particularls.id')
               ->join('users','exp_bill_details.created_by','users.id')

               ->select('exp_bill_details.*','users.name','exp_particularls.s_name')->get();

        $data = exp_bill_details::where('id', $id)->first();

        return view('exp_bill.index',compact('exp_particularl_data','data','table_data'));
    }

    public function update(Request $request,$id)
    {
        $user = Auth::user();
        $data = exp_bill_details::find($id);
        $data->particular_id = $request->particular_id;
        $data->ref = $request->ref;
        $data->amount = $request->amount;
        $data->date = $request->date;
        $data->p_or_l = $request->p_or_l;
        $data->created_by = $user->id;
        $data->updated_by = $user->id;
        $data->update();
        return redirect()->back()->with('msg', 'Expanse information successfully update');


    }


    public function delete($id)
    {
       $data = exp_bill_details::findOrFail($id);

       if ($data->delete()) {
           return redirect()->back()->with('msg','Expanse information successfully Delete.');
        }
    }
}
