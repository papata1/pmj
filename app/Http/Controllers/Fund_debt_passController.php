<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\Debt_record_resultRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Borrowing_info;
use App\Address;
use App\Identity_info;
use App\Identity_status;
use App\category;
use App\Debt_new;
use App\Debt_record_result;
use App\Debt_record;
use Illuminate\Support\Facades\DB;

class Fund_debt_passController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('debt')->except('index');

  }
    public function index(){
      //$app = application_layer::pass();
     // $ser = DB::table('Service')->get();
     // return view('service.index',compact('ser'));
      $ser = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('year','year.id', '=', 'Identity_status.year')
            ->Where('class', 'borrow')
            ->Where('debt_new.name', 0)
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_r','debt_new.name as status','Identity_info.name as namei','year.year as year')
            ->get();
            $ser1 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
           ->Where('class', 'guarantor')
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_r')
            ->get();
      return view('Fund_debt_pass.index',compact('ser','ser1'));
    }
    public function create(){

    return view('Fund_debt_pass.create',compact('ser'));
    }
    public function store(ServiceRequest $request)
     {
       //Service::create($request->pass());
        return redirect()->route('Fund_debt_pass.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit($service)
    {
     // dd($service);
     $ser3 = DB::table('borrowing_info')
           ->where('borrowing_info.id', $service)
           ->select('*')
           ->first();
          $ser = DB::table('debt_new')
            ->where('id_borrower',$service)
            ->first();
               $ser1 = DB::table('debt_record_result')
            ->where('id_borrower',$service)
            ->first();
        return view('Fund_debt_pass.edit',compact('ser3','ser1','ser','service'));
    }

    public function update(Debt_record_resultRequest $request,$service)
   {
  /*$a = $request->get('time_total');
  $b = $request->get('check');
  $c =  $b / $a;
  $d = $b % $c;
  dd($c);
  dd($d);*/
if($request->get('other')){
//  dd($request->get('check'));
   DB::table('Debt_record_result')
            ->where('id_borrower',$service)
            ->update([
            'contect_id' => $request->get('contect_id'),
            'no' => $request->get('no'),
            'date_loan' => $request->get('date_loan'),
            'date_count' => $request->get('date_count'),
            'money' => $request->get('other'),
            'money_remain' => $request->get('other'),
            'mounth_remain' => $request->get('return_money_total'),
            'time_total' => $request->get('time_total'),
            'date_latest' => $request->get('date_loan'),
            'date_start' => $request->get('date_start'),
            'date_end' => $request->get('date_end'),
            'return_money' => $request->get('return_money'),
            'return_money_total' => $request->get('return_money_total'),
            'return_money_last' => $request->get('return_money_last'),
            ]);
            DB::table('Debt_new')
            ->where('id_borrower',$service)
            ->update([
            'name' => $request->get('name'),
            'other' => $request->get('other'),
            'remark' => $request->get('remark'),
            ]);
            DB::table('borrowing_info')
            ->where('id',$service)
            ->update([
            'money' => $request->get('other'),
            ]);
          }else{
          //  dd($request->get('contect_id'));
            DB::table('Debt_record_result')
                     ->where('id_borrower',$service)
                     ->update([
                     'contect_id' => $request->get('contect_id'),
                     'no' => $request->get('no'),
                     'date_loan' => $request->get('date_loan'),
                     'date_count' => $request->get('date_count'),
                     'money' => $request->get('check'),
                     'money_remain' => $request->get('check'),
                     'mounth_remain' => $request->get('return_money_total'),
                     'time_total' => $request->get('time_total'),
                     'date_latest' => $request->get('date_loan'),
                     'date_start' => $request->get('date_start'),
                     'date_end' => $request->get('date_end'),
                     'return_money' => $request->get('return_money'),
                     'return_money_total' => $request->get('return_money_total'),
                     'return_money_last' => $request->get('return_money_last'),
                     ]);
                     DB::table('Debt_new')
                     ->where('id_borrower',$service)
                     ->update([
                     'name' => $request->get('name'),
                     'other' => $request->get('other'),
                     'remark' => $request->get('remark'),
                     ]);
          }
           /* DB::table('Debt_record')
            ->where('id_borrower',$service)
            ->update([
            'debt' => $request->get('debt'),
            'payed' => $request->get('payed'),
            'no_payed' => $request->get('no_payed'),
            'remain_round' => $request->get('remain_round'),
            'money_remain' => $request->get('money_remain'),
            'date_loan' => $request->get('date_loan'),
            'date_ga' => $request->get('date_ga'),
            'objective_debt' => $request->get('objective_debt'),
            'job_debt' => $request->get('job_debt'),
            ]);*/


       return redirect()->route('Fund_debt_pass.index')->with('message','item has been updated successfully');
   }

     public function destroy(Service $service)
     {
        $service->delete();
        return redirect()->route('Fund_debt.index_pass')->with('message','item has been deleted successfully');
     }
}
