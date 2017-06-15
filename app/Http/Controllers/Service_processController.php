<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Year;
use Illuminate\Support\Facades\DB;

class Service_processController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }
    public function index(){
      //$app = application_layer::all();
     // $ser = DB::table('Service')->get();
     // return view('service.index',compact('ser'));
     $year = Year::pluck('year','id')->toArray();
     $year1 = DB::table('year')
       ->select('*')
       ->get();
      $data1 = DB::table('payment')
       ->select('*')
       ->get();
       foreach($data1 as $row ){
         $data[] = $row->order_no;
       }
       $label1 = DB::table('payment')
       ->select('*')
       ->get();
       foreach($label1 as $row ){
         $labels[] = $row->id;
       }
       //dd($labels);
      return view('Service_process.index',compact('year1','year','data','labels'));
    }
    public function create(){
    return view('Service_process.create');
    }
    public function store(ServiceRequest $request)
     {
      
       $year = $request->get('year');
       $mounth = $request->get('mounth');
       $cat = $request->get('cat');
       $dataq = $request->get('data');
  
       
       //dd($y);
     if($mounth && $year){
$data1 = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '1')
            ->where('class', 'id')
            ->where('Identity_info.category', '1')
            ->where('year',$year)
            ->whereMonth('date',$mounth)
            ->select($cat)
            ->get();
       
       }elseif($mounth){
$data1 = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '1')
            ->where('class', 'id')
            ->where('Identity_info.category', '1')
            ->whereMonth('date',$mounth)
            ->select($cat)
            ->get();
       }elseif($year){
$data1 = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '1')
            ->where('class', 'id')
            ->where('Identity_info.category', '1')
            ->where('year',$year)
            ->select($cat)
            ->get();
       }else{
$data1 = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '1')
            ->where('class', 'id')
            ->where('Identity_info.category', '1')
            ->select($cat)
            ->get();
       }
      //dd($data1);
       if($cat=="dob"){
              if($data1->isEmpty()){
        return view('errors.404');
       }
              $ldate = date('Y');
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
}else{
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
     }
       //dd($labels);
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
        return view('Service_process.show',compact('data2','data','labels','cat','dataq','year','mounth'));
     }else{
       return view('Service_process.create',compact('data','labels'));
     }
     }

     public function show()
     {

     }

     public function edit($service)
    {
        
    }

    public function update(ServiceRequest $request,$service)
   {
      
        return view('Service_process.show',compact('data','labels'));;
   }

     public function destroy(Service $service)
     {
        $service->delete();
        return redirect()->route('Service_process.index')->with('message','item has been deleted successfully');
     }
}
