<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Address;
use App\Identity_info;
use App\Identity_status;
use App\category;
use App\Follow;
use App\Follow_result;
use App\Year;
use Illuminate\Support\Facades\DB;

class Fund_account_exportController extends Controller
{
  public function __construct()
  {
     $this->middleware('auth');
      $this->middleware('account');

  }
    public function index(){

     $year = Year::pluck('year','year_en')->toArray();

      return view('Fund_account_export.index',compact('year'));
    }
    public function create(){

    return view('service.create',compact('dd'));
    }
    public function store(ServiceRequest $request)
     {

          $year = $request->get('year');
       $mounth = $request->get('mounth');


       //dd($ser);
       if($mounth && $year){
$ser = DB::table('borrowing_info')
             ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
             ->Where('class', 'borrow')
             ->WhereIn('debt_new.name', ['2','3'])
              ->whereYear('date_pay',$year)
            ->whereMonth('date_pay',$mounth)
            ->where('Identity_info.category', '1')
            ->select('*','Identity_info.name as name')
            ->get();

       }elseif($mounth){
$ser = DB::table('borrowing_info')
             ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
             ->Where('class', 'borrow')
             ->WhereIn('debt_new.name', ['2','3'])
             ->whereMonth('date_pay',$mounth)
            ->where('Identity_info.category', '1')
            ->select('*','Identity_info.name as name')
            ->get();
       }else if($year){
         if($request->get('class') == 'excel'){
     $ser = DB::table('borrowing_info')
             ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->Where('class', 'borrow')
             ->WhereIn('debt_new.name', ['2','3'])
              ->whereYear('date_latest',$year)
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_b','Identity_info.name as name')
            ->get();
             $ser1 = DB::table('borrowing_info')
             ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
             ->Where('class', 'borrow')
             ->WhereIn('debt_new.name', ['2','3'])
              ->whereYear('date_latest',$year)
            ->where('Identity_info.category', '1')
            ->select('payment.date_pay','payment.id_borrower as id_bo','payment.total as total','Identity_info.name as name')
            ->get();
           // dd( $ser);
         }else{
            $ser = DB::table('borrowing_info')
             ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
             ->Where('class', 'borrow')
             ->WhereIn('debt_new.name', ['2','3'])
              ->whereYear('date_pay',$year)
            ->where('Identity_info.category', '1')
            ->select('*','Identity_info.name as name')
            ->get();
         }
       }else{
         if($request->get('class') == 'excel'){
$ser = DB::table('borrowing_info')
             ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->Where('class', 'borrow')
             ->WhereIn('debt_new.name', ['2','3'])
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_b','Identity_info.name as name')
            ->get();
            $ser1 = DB::table('borrowing_info')
             ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
             ->Where('class', 'borrow') 
             ->WhereIn('debt_new.name', ['2','3'])
            ->where('Identity_info.category', '1')
            ->select('*','payment.id_borrower as id_bo','Identity_info.name as name')
            ->get();
         }else{
$ser = DB::table('borrowing_info')
             ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
             ->Where('class', 'borrow')
             ->WhereIn('debt_new.name', ['2','3'])
            ->where('Identity_info.category', '1')
            ->select('*','Identity_info.name as name')
            ->get();

         }
       }
       
       if($request->get('class') == 'excel'){
         return view('Fund_account_export.show',compact('mounth','year','ser','ser1'));

       }else{
     return view('Fund_account_export.create',compact('mounth','year','ser'));

       }
     }

     public function show(Identity_status $service)
     {

     }

     public function edit(Identity_status $service)
    {

        return view('service.edit',compact('service','ser1','ser','dd'));

    }
    public function update(ServiceRequest $request,Identity_status $service)
   {

   }

     public function destroy(Identity_status $service)
     {

     }
}
