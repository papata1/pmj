<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Year;
use Illuminate\Support\Facades\DB;

class Fund_processController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('process');

  }
    public function index(){
       $year = Year::pluck('year','id')->toArray();
     $year1 = DB::table('year')
       ->select('*')
       ->get();
      return view('Fund_process.index',compact('year1','year'));
    }
    public function create(){
    return view('Fund_process.create');
    }
    
    public function store(ServiceRequest $request)
     {
       $year = $request->get('year');
       $mounth = $request->get('mounth');
       $cat = $request->get('cat');
       $dataq = $request->get('data');
                 //  dd($year);
                 //dd($cat);
                        

      // $data1;
     //   dd($mounth);
     if($dataq == 1){
      /* if($cat=="dob"){
        // dd($cat);
            if($mounth && $year){
                        $data1 =  DB::table('borrowing_info')
                                    ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
                                    ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
                                    ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
                                    ->where('Address.category', '1')
                                    ->Where('class', 'borrow')
                                    ->where('Identity_info.category', '1')
                                    ->where('year',$year)
                                    ->whereMonth('date',$mounth)
                                    ->select($cat,'money')
                                    ->get();

                              }elseif($mounth){
                        $data1 =  DB::table('borrowing_info')
                                    ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
                                    ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
                                    ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
                                    ->where('Address.category', '1')
                                    ->where('class', 'borrow')
                                    ->where('Identity_info.category', '1')
                                    ->whereMonth('date',$mounth)
                                    ->select($cat,'money')
                                    ->get();
                              }elseif($year){
                        $data1 =  DB::table('borrowing_info')
                                    ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
                                    ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
                                    ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
                                    ->where('Address.category', '1')
                                    ->where('class', 'borrow')
                                    ->where('Identity_info.category', '1')
                                    ->where('year',$year)
                                    ->select($cat,'money')
                                    ->get();
                              }else{
                        $data1 =  DB::table('borrowing_info')
                                    ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
                                    ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
                                    ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
                                    ->where('Address.category', '1')
                                    ->where('class', 'borrow')
                                    ->where('Identity_info.category', '1')
                                    ->select($cat)
                                   // $ldate = date('Y-m-d');
                                    ->get();
                                  //  dd($data1);
                              }
       }else{*/
     if($mounth && $year){
$data1 =  DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->WhereIn('debt_new.name', ['2','3'])
            ->where('Address.category', '1')
            ->Where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->where('year',$year)
            ->whereMonth('date',$mounth)
            ->select($cat,'money')
            ->get();

       }elseif($mounth){
$data1 =  DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->WhereIn('debt_new.name', ['2','3'])
            ->where('Address.category', '1')
            ->where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->whereMonth('date',$mounth)
            ->select($cat,'money')
            ->get();
       }elseif($year){
$data1 =  DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->WhereIn('debt_new.name', ['2','3'])
            ->where('Address.category', '1')
            ->where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->where('year',$year)
            ->select($cat,'money')
            ->get();
       }else{
$data1 =  DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')  
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->WhereIn('debt_new.name', ['2','3'])
            ->where('Address.category', '1')
            ->where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->select($cat,'money')
            ->get();
       }
      // }
//----------------------------------------------------------------------------------------------------------------//
     }else{
       if($mounth && $year){
$data5 = DB::table('Enterpise_info')
            ->leftJoin('Enterpise_detail','Enterpise_detail.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_list','Enterpise_list.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_approval','Enterpise_approval.enterpise_info_id', '=', 'Enterpise_info.id')
            ->where('year',$year)
            ->whereMonth('date',$mounth)
            ->select('budgets')
            ->get();

       }elseif($mounth){
$data5 = DB::table('Enterpise_info')
            ->leftJoin('Enterpise_detail','Enterpise_detail.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_list','Enterpise_list.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_approval','Enterpise_approval.enterpise_info_id', '=', 'Enterpise_info.id')
            ->whereMonth('date',$mounth)
            ->select('budgets')
            ->get();
       }elseif($year){
$data5 =  DB::table('Enterpise_info')
            ->leftJoin('Enterpise_detail','Enterpise_detail.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_list','Enterpise_list.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_approval','Enterpise_approval.enterpise_info_id', '=', 'Enterpise_info.id')
            ->where('year',$year)
            ->select('*')
            ->get();
            
       }else{
$data5 =  DB::table('Enterpise_info')
            ->leftJoin('Enterpise_detail','Enterpise_detail.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_list','Enterpise_list.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_approval','Enterpise_approval.enterpise_info_id', '=', 'Enterpise_info.id')
            ->select('budgets')
            ->get();
       }
     }
     if($cat=="dob"){
 $money= array();
              //dd($data1);
              if(isset($data1)){
                 if($data1->isEmpty()){
                  return view('errors.404');
                }
              }
              $ldate = date('Y');
              //$a[]
       foreach($data1 as $row ){
         $b = $ldate - date('Y',strtotime($row->$cat));
         //dd($b > 20 && $b < 30 );
         if($b < 60 ){
           $a[] = "น้อยกว่า 60 ปี";
           //60--
         }elseif($b > 60 && $b < 70 ){
          $a[] = "70 ถึง 80 ปี";
          // 60-70
         }elseif($b > 70 && $b < 80 ){
          $a[] = "80 ถึง 90 ปี";
          //70-80
         }elseif($b > 90 ){
           //90++
          $a[] = "มากกว่า 90 ปี";
         }
        // $dob[] = date('Y',strtotime($row->$cat));
       }
      // dd($a);
      $data2 = array_count_values($a) ;                                                    
           //  dd($data2);
  foreach ($data2 as $key => $value) {
           
                $data[] =   $value;
                $labels[] = $key;
          }
                //  dd($data1);

                  foreach($data1 as $row ){
                    $c[$row->$cat]= 0;
                      }
                      foreach($data1 as $row ){
                         $c[$row->$cat] +=$row->money;
                      }
                    // $data2 = array_count_values($c) ;
                          //   dd($c);
                  foreach ($c as $key => $value) {
                                $money[] =  $value;
                          }

                          //dd($data);
     }else{
      $money= array();
              //dd($data1);
              if(isset($data1)){
                 if($data1->isEmpty()){
                  return view('errors.404');
                }
       foreach($data1 as $row ){
         $a[] = $row->$cat;
       }
      $data2 = array_count_values($a) ;
            // dd($data2);
  foreach ($data2 as $key => $value) {
                $data[] =   $value;
                $labels[] = $key;
          }
               //   dd($data2);

                  foreach($data1 as $row ){
                    $c[$row->$cat]= 0;
                      }
                      foreach($data1 as $row ){
                         $c[$row->$cat] +=$row->money;
                      }
                    // $data2 = array_count_values($c) ;
                          //  
                  foreach ($c as $key => $value) {
                     $k[] =  $key;
                                $money[] =  $value;
                          }
                // dd($data);
       }
       if(isset($data5)){
                    if($data5->isEmpty()){
                        return view('errors.404');
                      }
       foreach($data5 as $row ){
         $a[] = $row->budgets;
       }
      $data2 = array_count_values($a) ;
            // dd($data5);
  foreach ($data2 as $key => $value) {
                $data[] =   $value;
                $labels[] = $key;
          }
       }
     }
     
      // dd($labels);

if($year == 0){
         $year = 'ทั้งหมด';
       }
       if($mounth == 0){
         $mounth = 'ทั้งหมด';
       }
       if($cat == "district"){
         $cat = 'อำเภอ';
       }elseif($cat == "job"){
         $cat = 'อาชีพ';
       }elseif($cat == "dob"){
         $cat = 'ช่วงอายุ';
       }else{
         $cat = 'เพศ';
       }

  if(  $request->get('class')=='excel'  ){
        return view('Fund_process.show',compact('data2','data','money','labels','cat','year','mounth','dataq'));
     }elseif($dataq == 2){
       return view('Fund_process.edit',compact('data','labels'));
     }else{
       return view('Fund_process.create',compact('data','labels','money'));
     }
     }


     public function show($id)
     {

     }

     public function edit(Service $service)
    {
        return view('Fund_process.edit',compact('service'));
    }

    public function update(ServiceRequest $request,Service $service)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       $service->update($request->all());
       return redirect()->route('Fund_process.index')->with('message','item has been updated successfully');
   }

     public function destroy(Service $service)
     {
        $service->delete();
        return redirect()->route('Fund_process.index')->with('message','item has been deleted successfully');
     }
}
