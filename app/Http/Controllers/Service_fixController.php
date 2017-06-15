<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Identity_infoRequest;
use App\Http\Requests\DeRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Address;
use App\Identity_info;
use App\Identity_status;
use App\category;
use App\Year;
use Illuminate\Support\Facades\DB;

class Service_fixController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    
  }
    public function index(){
      //$app = application_layer::all();
      //$ser = DB::table('Service')->get();
     $ser = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->leftJoin('category','category.id', '=', 'Identity_status.cat')
            ->leftJoin('year','year.id', '=', 'Identity_status.year')
            ->where('Address.category', '1')
            ->where('class', 'id')
            ->where('Identity_info.category', '1')
            ->select('*','category.name as cname','Identity_info.name as iname','year.year as year','Identity_status.id as id')
            ->get();

                // $ser = 0 ;                           
                       //   dd($ser);

      return view('service_fix.index',compact('ser'));
    }
    public function create(){
        $ser1=array();
        $i=0;
            $ser = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->where('class', 'id')
            ->where('Identity_info.category', '1')
            ->select('id_p')
            ->get();
            foreach($ser as $row){
                $ser1[$i] = $row->id_p;
                $i++;
            }
                      $dd = Category::pluck('remark', 'id')->toArray();
                      $year = Year::pluck('year','id')->toArray();
//dd($ser1);
    return view('service_fix.create',compact('dd','year','ser','ser1'));
    }
    public function store(ServiceRequest $request)
     {
      $id = Identity_info::create($request->all());
      $address = Address::create($request->all());
      $status = Identity_status::create($request->all());
      $add= new Address(array(
            'address' => $request->get('address1'),
            'village' => $request->get('village1'),
            'room_number' => $request->get('room_number1'),
            'room_floor' => $request->get('room_floor1'),
            'group_home' => $request->get('group_home1'),
            'alley' => $request->get('alley1'),
            'road' => $request->get('road1'),
            'local' => $request->get('local'),
            'district' => $request->get('district1'),
            'province' => $request->get('province1'),
            'zip_code' => $request->get('zip_code1'),
            'phone' => $request->get('phone1'),
            'category'=>'2',
        ));
        $add->save();
       $id1 = new Identity_info(array(
            'name' => $request->get('name1'),
            'surename' => $request->get('surename1'),
            'id_p' => $request->get('id_p1'),
            'id_exp' => $request->get('id_exp1'),
            'prefix' => $request->get('prefix1'),
            //'dob' => $request->get('dob1'),
            'category'=>'2',

        ));
        $id1->save();
            DB::table('Identity_info')
            ->where('id',$id1->id)
            ->update(['id_rela' => $status->id]);
            DB::table('Identity_info')
            ->where('id',$id->id)
            ->update(['id_rela' => $status->id]);
            DB::table('Address')
            ->where('id',$address->id)
            ->update(['id_rela' => $status->id]);
            DB::table('Address')
            ->where('id',$add->id)
            ->update(['id_rela' => $status->id]);
        return redirect()->route('service_fix.index')->with('message','item has been added successfully');
     }

     public function show($service)
     {
         // dd($service);
         $ser = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '1')
            ->where('Identity_info.category', '1')
            ->where('Identity_info.id_rela',$service)
            ->first();
               $ser1 = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '2')
            ->where('Identity_info.category', '2')
            ->where('Identity_info.id_rela',$service)
            ->first();
             $service = DB::table('Identity_status')
            ->where('id',$service)
            ->first();
         //dd($ser);
                $dd = Category::pluck('remark', 'id')->toArray();
                $year = Year::pluck('year')->toArray();
                 //$cc = Category::pluck('remark', 'id')->toArray();
                 //dd($service);
              
        return view('service_fix.show',compact('service','ser1','ser','dd','year'));
     }

     public function edit($service)
    {
         $ck_id=array();
        $i=0;
            $q5 = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->where('class', 'id')
            ->where('Identity_info.category', '1')
            ->select('id_p')
            ->get();
            foreach($q5 as $row){
                $ck_id[$i] = $row->id_p;
                $i++;
            }
        // dd($service);
              $ser = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '1')
            ->where('Identity_info.category', '1')
            ->where('Identity_info.id_rela',$service)
            ->first();
               $ser1 = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '2')
            ->where('Identity_info.category', '2')
            ->where('Identity_info.id_rela',$service)
            ->first();
            $service = DB::table('Identity_status')
            ->where('id',$service)
            ->first();
        // 
                $dd = Category::pluck('remark','id')->toArray();
                  $year = Year::pluck('year','id')->toArray();
                //$cc = Category::pluck('remark', 'id')->toArray();
               // dd($service);
        return view('service_fix.edit',compact('service','ser1','ser','dd','year','ck_id'));

    }
    public function update(ServiceRequest $request,$service)
   {

       //dd($service);
       DB::table('Identity_status')
            ->where('id', $service)
            ->update([
           'check_live' => $request->get('check_live'),
            'live_cate' => $request->get('live_cate'),
            'live_status' => $request->get('live_status'),
            'c_live_status' => $request->get('c_live_status'),
            'job' => $request->get('job'),
            'income' => $request->get('income'),
            'date' => $request->get('date'),
            'year' => $request->get('year'),
            'm_status' => $request->get('m_status'),
            'process' => $request->get('process'),

            ]);
       $id = DB::table('Identity_info')
            ->where('id_rela', $service)
            ->where('category', '1')
            ->update([
            'name' => $request->get('name'),
            'surename' => $request->get('surename'),
            'id_p' => $request->get('id_p'),
            'id_exp' => $request->get('id_exp'),
            'prefix' => $request->get('prefix'),
            'dob' => $request->get('dob'),
           // 'category'=>'1',

            ]);
        $address = DB::table('Address')
            ->where('id_rela', $service)
            ->where('category', '1')
            ->update([
            'address' => $request->get('address'),
            'village' => $request->get('village'),
            'room_number' => $request->get('room_number'),
            'room_floor' => $request->get('room_floor'),
            'group_home' => $request->get('group_home'),
            'alley' => $request->get('alley'),
            'road' => $request->get('road'),
            'local' => $request->get('local'),
            'district' => $request->get('district'),
            'province' => $request->get('province'),
            'zip_code' => $request->get('zip_code'),
            'phone' => $request->get('phone'),
           // 'category'=>'1',
            ]);
        $add= DB::table('Address')
            ->where('id_rela', $service)
            ->where('category', '2')
            ->update([
            'address' => $request->get('address1'),
            'village' => $request->get('village1'),
            'room_number' => $request->get('room_number1'),
            'room_floor' => $request->get('room_floor1'),
            'group_home' => $request->get('group_home1'),
            'alley' => $request->get('alley1'),
            'road' => $request->get('road1'),
            'local' => $request->get('local1'),
            'district' => $request->get('district1'),
            'province' => $request->get('province1'),
            'zip_code' => $request->get('zip_code1'),
            'phone' => $request->get('phone1'),
           // 'category'=>'2',
            ]);
       $id1 = DB::table('Identity_info')
            ->where('id_rela', $service)
            ->where('category', '2')
            ->update([
            'name' => $request->get('name1'),
            'surename' => $request->get('surename1'),
            'id_p' => $request->get('id_p1'),
            'id_exp' => $request->get('id_exp1'),
            'prefix' => $request->get('prefix1'),
            'dob' => $request->get('dob1'),
            //'category'=>'2',

            ]);
       return redirect()->route('service_fix.index')->with('message','item has been updated successfully');
   }

     public function destroy($service)
     {
        DB::table('Identity_status')
            ->where('id', $service)
            ->delete();
        DB::table('Identity_info')
            ->where('id_rela', $service)
            ->delete();
        DB::table('Address')
            ->where('id_rela', $service)
            ->delete();
        return redirect()->route('service_fix.index');
     }
     public function excel($a){
            
            $service = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '1')
            ->where('Identity_info.category', '1')
            ->where('Identity_info.id_rela',$a)
            ->first();
               $ser = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '2')
            ->where('Identity_info.category', '2')
            ->where('Identity_info.id_rela',$a)
            ->first();
           /* $service = DB::table('Identity_status')
            ->where('id',$service)
            ->first();*/
            //dd($service);
   // return view('service_fix.excel',compact('ser','service','ser1'));
   $templateProcessor2 = new \PhpOffice\PhpWord\TemplateProcessor(asset('/tem/sevice.docx'));
    $templateProcessor2->setValue('year', $service->year);
    $templateProcessor2->setValue('date', $service->date);
    $templateProcessor2->setValue('id_p', $service->id_p);
    $templateProcessor2->setValue('id_exp', $service->id_exp);
    $templateProcessor2->setValue('prefix', $service->prefix);
    $templateProcessor2->setValue('name', $service->name);
    $templateProcessor2->setValue('sname', $service->surename);
    $templateProcessor2->setValue('dob', $service->dob);
    $templateProcessor2->setValue('address', $service->address);
    $templateProcessor2->setValue('village', $service->village);
    $templateProcessor2->setValue('room_number', $service->room_number);
    $templateProcessor2->setValue('room_floor', $service->room_floor);
    $templateProcessor2->setValue('group_home', $service->group_home);
    $templateProcessor2->setValue('road', $service->road);
    $templateProcessor2->setValue('local', $service->local);
    $templateProcessor2->setValue('district', $service->district);
    $templateProcessor2->setValue('province', $service->province);
    $templateProcessor2->setValue('zip_code', $service->zip_code);
    $templateProcessor2->setValue('phone', $service->phone);
        $templateProcessor2->setValue('address1', $ser->address);
    $templateProcessor2->setValue('village1', $ser->village);
    $templateProcessor2->setValue('room_number1', $ser->room_number);
    $templateProcessor2->setValue('room_floor1', $ser->room_floor);
    $templateProcessor2->setValue('group_home1', $ser->group_home);
    $templateProcessor2->setValue('road1', $ser->road);
    $templateProcessor2->setValue('local1', $ser->local);
    $templateProcessor2->setValue('district1', $ser->district);
    $templateProcessor2->setValue('province1', $ser->province);
    $templateProcessor2->setValue('zip_code1', $ser->zip_code);
    $templateProcessor2->setValue('phone1', $ser->phone);
    $templateProcessor2->setValue('m_status', $service->m_status);
    $templateProcessor2->setValue('zip_code1', $ser->zip_code);
     $templateProcessor2->setValue('id_p2', $ser->id_p);
    $templateProcessor2->setValue('id_exp2', $ser->id_exp);
    $templateProcessor2->setValue('prefix2', $ser->prefix);
    $templateProcessor2->setValue('name2', $ser->name);
    $templateProcessor2->setValue('sname2', $ser->surename);
    $templateProcessor2->setValue('dob2', $ser->dob);
    $templateProcessor2->setValue('job', $ser->job);
    $templateProcessor2->setValue('income', $ser->income);
            $templateProcessor2->setValue('check_live', $service->check_live);
        $templateProcessor2->setValue('live_cate', $service->live_cate);

    if($service->live_status== 1 ){
        $templateProcessor2->setValue('live_status', 'เช่า');
    }elseif($service->live_status== 2 ){
        $templateProcessor2->setValue('live_status', 'ผ่อน :'.$service->c_live_status.'บาท/เดือน');
    }else{
        $templateProcessor2->setValue('live_status', 'อื่นๆ'.$service->c_live_status);
    }

    $templateProcessor2->saveAs('ข้อมูลผู้เข้ารับบริการ_'.$service->name.'.docx');

    return response()->download('ข้อมูลผู้เข้ารับบริการ_'.$service->name.'.docx'); 

    }
}
