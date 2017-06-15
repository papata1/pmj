<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Enterpise_info;
use App\Enterpise_detail;
use App\Enterpise_list;
use App\Enterpise_man;
use App\Enterpise_visit;
use App\Enterpise_approval;
use App\Year;
use Illuminate\Support\Facades\DB;

class Fund_enterpiseController extends Controller
{
  public function __construct()
  {
     $this->middleware('auth');
      $this->middleware('project')->except('index');

  }
    public function index(){

    $ser = DB::table('Enterpise_info')
                ->leftJoin('year','year.id', '=', 'Enterpise_info.year')
                ->select('*','Enterpise_info.id as id')
                ->get();
      //คำสั่งเชื่อมต่อกับฐานข้อมูล   
      //ดึงข้อมูลทั้งหมดของโครงการออกมา       
      return view('Fund_enterpise.index',compact('ser'));
      //คำสั่งที่ส่งค่าที่ได้ไปหน้าview
    }
    public function create(){
 $year = Year::pluck('year','id')->toArray();
    return view('Fund_enterpise.create',compact('year'));
    }
    public function store(ServiceRequest $request)
     {
       $info = Enterpise_info::create($request->all());
       $detail =  Enterpise_detail::create($request->all());
       $list =  Enterpise_list::create($request->all());
       $man =  Enterpise_man::create($request->all());

       $man1 =  Enterpise_man::create([
              'name_m'=>$request->get('name_m1'),
              'surename_m'=>$request->get('surename_m1'),
              'location_m'=>$request->get('location_m1'),
              'phone_m'=>$request->get('phone_m1'),
              'cat'=>2,
              'enterpise_info_id'=>$info->id,
            ]);
        for ($i = 1; $i < 10; $i++) {
          $name = "name_l$i";
          $cost = "cost_l$i";
          $get = $request->get($name);
          $get1 = $request->get($cost);
          if($get){
             Enterpise_list::create([
              'name_l'=>$get,
              'cost_l'=>$get1,
              'enterpise_info_id'=>$info->id,
            ]);
          }
        }
            DB::table('Enterpise_detail')
            ->where('id',$detail->id)
            ->update(['enterpise_info_id'=>$info->id]);
            DB::table('Enterpise_list')
            ->where('id',$list->id)
            ->update(['enterpise_info_id'=>$info->id]);
            DB::table('Enterpise_man')
            ->where('id',$man->id)
            ->update(['enterpise_info_id'=>$info->id,
            'cat'=>1,
            ]);

            Enterpise_visit::create([
              'enterpise_info_id'=>$info->id,
            ]);
            Enterpise_approval::create([
              'enterpise_info_id'=>$info->id,
            ]);

        return redirect()->route('Fund_enterpise.index');
     }

     public function show($id)
     {
//dd($service);
   $service = DB::table('Enterpise_info')
            ->leftJoin('Enterpise_detail','Enterpise_detail.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_list','Enterpise_list.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_man','Enterpise_man.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_visit','Enterpise_visit.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_approval','Enterpise_approval.enterpise_info_id', '=', 'Enterpise_info.id')
            ->where('Enterpise_info.id',$id)
            ->where('Enterpise_man.cat',1)
            ->select('*','Enterpise_info.id as id_info','Enterpise_visit.remark as remark1','Enterpise_approval.status as st')
            ->first();
            //dd($service);
      $ser = DB::table('Enterpise_man')
       ->where('enterpise_info_id',$id)
       ->where('Enterpise_man.cat',2)
       ->select('*')
        ->first();
         $ser1 = DB::table('Enterpise_list')
       ->where('enterpise_info_id',$id)
       ->select('*')
        ->get();
       //dd($ser1);
       $year = Year::pluck('year','id')->toArray();
        return view('Fund_enterpise.show',compact('service','ser','ser1','year'));
     }

     public function edit($id)
    {
    //คำสั่งดึงขอมูลออกมาตามค่าid
    $service = DB::table('Enterpise_info')
            ->leftJoin('Enterpise_detail','Enterpise_detail.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_list','Enterpise_list.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_man','Enterpise_man.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_visit','Enterpise_visit.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_approval','Enterpise_approval.enterpise_info_id', '=', 'Enterpise_info.id')
            ->where('Enterpise_info.id',$id)
            ->where('Enterpise_man.cat',1)
            ->select('*','Enterpise_info.id as id_info','Enterpise_visit.remark as remark1','Enterpise_approval.status as st','Enterpise_visit.status as status1')
            ->first();

      //ไปหน้าวิว edit โดยส่งค่าไปด้วย
      return view('Fund_enterpise.edit',compact('service','ser','ser1','year'));
      $ser = DB::table('Enterpise_man')
       ->where('enterpise_info_id',$id)
       ->where('Enterpise_man.cat',2)
       ->select('*')
        ->first();
         $ser1 = DB::table('Enterpise_list')
       ->where('enterpise_info_id',$id)
       ->select('*')
        ->get();
       //dd($ser1);
       $year = Year::pluck('year','id')->toArray();
        
    }

    public function update(ServiceRequest $request,$service)
   {
      if($request->get('status1')){
            DB::table('Enterpise_visit')
            ->where('enterpise_info_id',$service)
            ->update([
              'status'=>$request->get('status1'),
              'remark'=>$request->get('remark1'),
            ]);
            }
             if($request->get('status')){
            DB::table('Enterpise_approval')
            ->where('enterpise_info_id',$service)
            ->update([
              'money'=>$request->get('money'),
              'status'=>$request->get('status'),
              'remark'=>$request->get('remark'),
            ]);
             }


             if($request->get('year')){
              $chk = $request->get('chk');
              $chk1 = $request->get('chk1');
             // dd($chk);
       //dd($service);
           DB::table('Enterpise_info')
            ->where('id',$service)
            ->update([
              'year'=>$request->get('year'),
              'date'=>$request->get('date'),
              'name_th'=>$request->get('name_th'),
              'name_en'=>$request->get('name_en'),
              'company'=>$request->get('company'),
              'category'=>$request->get('category'),
              'category_other'=>$request->get('category_other'),
              'location'=>$request->get('location'),
              'fax'=>$request->get('fax'),
              'email'=>$request->get('email'),
              'year_start'=>$request->get('name_th'),
              'objective_i'=>$request->get('name_en'),

            ]);
            DB::table('Enterpise_detail')
            ->where('enterpise_info_id',$service)
            ->update([
              'money_category'=>$request->get('money_category'),
              'objective'=>$request->get('objective'),
              'target_group'=>$request->get('target_group'),
              'budgets'=>$request->get('budgets'),
              'budgets_fund'=>$request->get('budgets_fund'),
              'budgets_pre'=>$request->get('budgets_pre'),
              'other_fund'=>$request->get('other_fund'),
              'fund_cate'=>$request->get('fund_cate'),
              'name_d'=>$request->get('name_d'),
              'cost'=>$request->get('cost'),

            ]);
        

         for ($i = 1; $i < $chk; $i++) {
          $id = "id$i";
          $name = "name_l$i";
          $cost = "cost_l$i";
          $get_id = $request->get($id);
          $get2 = $request->get($name);
          $get3 = $request->get($cost);
          //if($get_id){
            DB::table('Enterpise_list')
            ->where('enterpise_info_id',$service)
            ->where('id',$get_id)
            ->update([
             'name_l'=>$get2,
              'cost_l'=>$get3,
            ]);
          //}
        }


            for ($i = $chk; $i <= $chk1; $i++) {
          $name = "name_l$i";
          $cost = "cost_l$i";
          $get = $request->get($name);
          $get1 = $request->get($cost);
          if($get){
             Enterpise_list::create([
              'name_l'=>$get,
              'cost_l'=>$get1,
              'enterpise_info_id'=>$service,
            ]);
          }
        }
            DB::table('Enterpise_man')
            ->where('enterpise_info_id',$service)
            ->where('cat',1)
            ->update([
              'name_m'=>$request->get('name_m'),
              'surename_m'=>$request->get('surename_m'),
              'location_m'=>$request->get('location_m'),
              'phone_m'=>$request->get('phone_m'),
            ]);
            DB::table('Enterpise_man')
            ->where('cat',2)
            ->where('enterpise_info_id',$service)
            ->update([
              'name_m'=>$request->get('name_m1'),
              'surename_m'=>$request->get('surename_m1'),
              'location_m'=>$request->get('location_m1'),
              'phone_m'=>$request->get('phone_m1'),

            ]);
             }
                 if($request->get('money')){
               DB::table('Enterpise_detail')
            ->where('enterpise_info_id',$service)
            ->update([
              'budgets'=>$request->get('money'),
            ]);
             }
       return redirect()->route('Fund_enterpise.index')->with('message','item has been updated successfully');
   }

     public function destroy($service)
     {
       // $service->delete();
        DB::table('Enterpise_info')
            ->where('id', $service)
            ->delete();
        DB::table('Enterpise_detail')
            ->where('enterpise_info_id', $service)
            ->delete();
        DB::table('Enterpise_list')
            ->where('enterpise_info_id', $service)
            ->delete();
        DB::table('Enterpise_man')
            ->where('enterpise_info_id', $service)
            ->delete();
            DB::table('Enterpise_visit')
            ->where('enterpise_info_id', $service)
            ->delete();
            DB::table('Enterpise_approval')
            ->where('enterpise_info_id', $service)
            ->delete();
        return redirect()->route('Fund_enterpise.index');
     }
     public function excel($id)
     {

        $service = DB::table('Enterpise_info')
            ->leftJoin('Enterpise_detail','Enterpise_detail.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_list','Enterpise_list.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_man','Enterpise_man.enterpise_info_id', '=', 'Enterpise_info.id')
            ->where('Enterpise_info.id',$id)
            ->where('Enterpise_man.cat',1)
            ->select('*')
            ->first();
            //dd($service);
      $ser = DB::table('Enterpise_man')
       ->where('enterpise_info_id',$id)
       ->where('Enterpise_man.cat',2)
       ->select('*')
        ->first();
         $ser1 = DB::table('Enterpise_list')
       ->where('enterpise_info_id',$id)
       ->select('*')
        ->get();
       //dd($ser1);
       //$year = Year::pluck('year','id')->toArray();
       // return view('Fund_enterpise.excel',compact('service','ser','ser1','year'));
       $templateProcessor1 = new \PhpOffice\PhpWord\TemplateProcessor(asset('/tem/enterprise.docx'));
    $templateProcessor1->setValue('year', $service->year);
    $templateProcessor1->setValue('date', $service->date);
    $templateProcessor1->setValue('company', $service->company);
    $templateProcessor1->setValue('name_th', $service->name_th);
    $templateProcessor1->setValue('name_en', $service->name_en);
$templateProcessor1->setValue('location', $service->year);
    $templateProcessor1->setValue('phone', $service->phone);
    $templateProcessor1->setValue('fax', $service->fax);
    $templateProcessor1->setValue('email', $service->email);
    $templateProcessor1->setValue('years', $service->year_start);
    $templateProcessor1->setValue('name', $service->name_m);
    $templateProcessor1->setValue('sname', $service->surename_m);
    $templateProcessor1->setValue('address', $service->location_m);
    $templateProcessor1->setValue('phonee', $service->phone_m);
    $templateProcessor1->setValue('name1', $ser->name_m);
    $templateProcessor1->setValue('sname1', $ser->surename_m);
    $templateProcessor1->setValue('address1', $ser->location_m);
    $templateProcessor1->setValue('phonee1', $ser->phone_m);
        $templateProcessor1->setValue('obj', $service->objective_i);
    $templateProcessor1->setValue('named', $service->name_d);
    $templateProcessor1->setValue('ob', $service->objective);
    $templateProcessor1->setValue('tar', $service->target_group);
    $templateProcessor1->setValue('bud', $service->budgets);
    $templateProcessor1->setValue('bud1', $service->budgets_fund);
    $templateProcessor1->setValue('bud2', $service->budgets_pre);
     $i = 1;
    foreach($ser1 as $ser ){
    $templateProcessor1->setValue('namel'.$i, $ser->name_l);
    $templateProcessor1->setValue('cost'.$i, $ser->cost_l);
     $i++;
    }
    $templateProcessor1->setValue('f1', $service->fund_cate);
    $templateProcessor1->setValue('f2', $service->name_d);
    $templateProcessor1->setValue('f3', $service->cost);
    if($service->other_fund=='1') {
          $templateProcessor1->setValue('f','ไม่');
    }else{
          $templateProcessor1->setValue('f','ใช่');
    }
    if($service->money_category=='1'){
      $templateProcessor1->setValue('mcat','โครงการขนาดเล็ก วงเงินไม่เกิน 50,000 บาท');
    }elseif($service->money_category=='2'){
      $templateProcessor1->setValue('mcat','โครงการขนาดกลาง วงเงิน 50,000 ถึง 300,000 บาท');
    }else{
      $templateProcessor1->setValue('mcat','โครงการขนาดใหญ่ วงเงินเกิน 300,000 ขึ้นไป');
    }
    if($service->category=='1'){
      $templateProcessor1->setValue('cate','องค์กรเอกชน มูลนิธิ');
    }elseif($service->category=='2'){
      $templateProcessor1->setValue('cate','องค์กรปกครองส่วนท้องถิ่น');
    }elseif($service->category=='3'){
      $templateProcessor1->setValue('cate','สถาบันการศึกษาหรือหน่วยราชการ');
    }elseif($service->category=='4'){
      $templateProcessor1->setValue('cate','องค์กร/ชมรมของผู้สูงอายุ');
    }else{
      $templateProcessor1->setValue('cate','อื่นๆ');
    }






    $templateProcessor1->saveAs('ข้อมูลโครงการ_'.$service->name_th.'.docx');

    return response()->download('ข้อมูลโครงการ_'.$service->name_th.'.docx'); 
     }
}
