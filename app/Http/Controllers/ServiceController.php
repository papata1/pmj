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
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
     // $ser = DB::table('Service')->get();
     $ser = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '1')
            ->where('class', 'id')
            ->where('Identity_info.category', '1')
            ->select('*')
            ->get();
                                                     // dd($ser);

      return view('service.index',compact('ser'));
    }
    public function create(){

                      $dd = Category::pluck('remark', 'id')->toArray();

    return view('service.create',compact('dd'));
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
        return redirect()->route('service.index')->with('message','item has been added successfully');
     }

     public function show(Identity_status $service)
     {
         $ser = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '1')
            ->where('Identity_info.category', '1')
            ->where('Identity_info.id_rela',$service->id)
            ->first();
               $ser1 = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '2')
            ->where('Identity_info.category', '2')
            ->where('Identity_info.id_rela',$service->id)
            ->first();
         //dd($ser);
                $dd = Category::pluck('remark', 'id')->toArray();
                 //$cc = Category::pluck('remark', 'id')->toArray();
                // dd($dd);
        return view('service.show',compact('service','ser1','ser','dd'));
     }

     public function edit(Identity_status $service)
    {
              $ser = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '1')
            ->where('Identity_info.category', '1')
            ->where('Identity_info.id_rela',$service->id)
            ->first();
               $ser1 = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->where('Address.category', '2')
            ->where('Identity_info.category', '2')
            ->where('Identity_info.id_rela',$service->id)
            ->first();
        //  dd($ser);
                $dd = Category::pluck('remark','id')->toArray();
                //$cc = Category::pluck('remark', 'id')->toArray();
        return view('service.edit',compact('service','ser1','ser','dd'));

    }
    public function update(ServiceRequest $request,Identity_status $service)
   {
       $service->update($request->all());
       $id = DB::table('Identity_info')
            ->where('id_rela', $service->id)
            ->where('category', '')
            ->update([
            'name' => $request->get('name'),
            'surename' => $request->get('surename'),
            'id_p' => $request->get('id_p'),
            'id_exp' => $request->get('id_exp'),
            'prefix' => $request->get('prefix'),
            'dob' => $request->get('dob'),
            'category'=>'1',

            ]);
        $address = DB::table('Address')
            ->where('id_rela', $service->id)
            ->where('category', '')
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
            'category'=>'1',
            ]);
        $add= DB::table('Address')
            ->where('id_rela', $service->id)
            ->where('category', '1')
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
            'category'=>'2',
            ]);
       $id1 = DB::table('Identity_info')
            ->where('id_rela', $service->id)
            ->where('category', '1')
            ->update([
            'name' => $request->get('name1'),
            'surename' => $request->get('surename1'),
            'id_p' => $request->get('id_p1'),
            'id_exp' => $request->get('id_exp1'),
            'prefix' => $request->get('prefix1'),
            'dob' => $request->get('dob1'),
            'category'=>'2',

            ]);
       return redirect()->route('service.index')->with('message','item has been updated successfully');
   }

     public function destroy(Identity_status $service)
     {
        $service->delete();
        DB::table('Identity_info')
            ->where('id_rela', $service->id)
            ->delete();
        DB::table('Address')
            ->where('id_rela', $service->id)
            ->delete();
        return redirect()->route('service.index')->with('message','item has been deleted successfully');
     }
}
