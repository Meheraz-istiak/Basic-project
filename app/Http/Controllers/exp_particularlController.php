<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exp_particularls;
use Illuminate\Support\Facades\Auth;
use DB;


class exp_particularlController extends Controller
{
    public function index()
    {

        $data = DB::table('exp_particularls')
               ->join('users','exp_particularls.created_by','users.id')

               ->select('exp_particularls.*','users.name')->get();


        return view('exp_particularl.index',compact('data'));
    }


    public function store(Request $request)
    {

        $user = Auth::user();
        $data = new exp_particularls;
        $data->s_name = $request->s_name;
        $data->created_by = $user->id;
        $data->updated_by = $user->id;
        // dd($data);
        $data->save();
        return redirect()->back()->with('msg','Expanse information successfully store');


    }

    public function edit($id)
    {
        $data=exp_particularls::all();
        $data1 = exp_particularls::where('id', $id)->first();

        return view('exp_particularl.index',compact('data1','data'));
    }

    public function update(Request $request,$id)
    {
        $user = Auth::user();
        $data = exp_particularls::find($id);

        $data->name = $request->name;
        $data->created_by = $user->id;
        $data->updated_by = $user->id;
        $data->update();
        return redirect('/particularl')->with('msg', 'Expanse information successfully update');


    }


    public function delete($id)
    {
       $data = exp_particularls::findOrFail($id);

       if ($data->delete()) {
           return redirect()->back()->with('msg','Expanse information successfully Delete.');
        }
    }
}
