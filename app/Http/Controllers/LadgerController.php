<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exp_particularls;
use App\Models\exp_bill_details;

use Illuminate\Support\Facades\Auth;
use DB;

class LadgerController extends Controller
{
  public function index(Request $request)

  {

    // $data=DB::select("SELECT * FROM `exp_bill_details` WHERE created_at BETWEEN '$request->form_data' AND '$request->form_data'")->get();
    // dd($data);


    $exp_particularls=exp_particularls::all();

    $exp_bill_details=exp_bill_details::all();


    $table_data = DB::table('exp_bill_details');
    $formdate = $request->formdate;
    $todate = $request->todate;

    if($formdate != NULL && $todate != NULL) {
        $table_data =$table_data->whereBetween('exp_bill_details.date',[$formdate,$todate]);
    } else {
        $table_data =$table_data->where('exp_bill_details.particular_id',$request->exp_particularl);
     }


    $table_data = $table_data
               ->join('exp_particularls','exp_bill_details.particular_id','exp_particularls.id')
               ->join('users','exp_bill_details.created_by','users.id')

               ->select('exp_bill_details.*','users.name','exp_particularls.s_name')->get();

    return view('ladger.index',compact('table_data','exp_particularls'));
  }



}
