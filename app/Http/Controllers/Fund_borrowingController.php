<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\ServiceRequest;
use App\Borrowing_info;
use App\Address;
use App\Identity_info;
use App\Identity_status;
use App\category;
use Illuminate\Support\Facades\DB;

class Fund_borrowingController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
     // $ser = DB::table('Service')->get();
     $ser = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            //->whereIn('class', ['guarantor', 'borrow'])
           // ->where('class', 'guarantor')
           ->Where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_r')
            ->get();

      //return view('service.index');
    // dd($ser);
      return view('fund_borrowing.index',compact('ser'));
    }
    public function create(){
    return view('fund_borrowing.create');
    }
    public function store(ServiceRequest $request)
     {
      $bowwoer = Borrowing_info::create($request->all());
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
            'local' => $request->get('local1'),
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
            DB::table('Identity_status')
            ->where('id',$status->id)
            ->update(['borrower_id' => $bowwoer->id]);

//-------------------------------------------------------------------------------//

      $sta = new Identity_status(array(
            'check_live' => $request->get('check_live1'),
            'live_cate' => $request->get('live_cate1'),
            'live_status' => $request->get('live_status1'),
            'c_live_status' => $request->get('c_live_status1'),
            'borrower_id' => $bowwoer->id,
            //'dob' => $request->get('dob1'),
            'class'=>'guarantor',
            ));
            $sta->save();

      $id2 = new Identity_info(array(
            'name' => $request->get('name2'),
            'surename' => $request->get('surename2'),
            'id_p' => $request->get('id_p2'),
            'id_exp' => $request->get('id_exp2'),
            'prefix' => $request->get('prefix2'),
            'dob' => $request->get('dob2'),
            'category'=>'1',
            'id_rela'=> $sta->id,
            ));
            $id2->save();
      $add2 = new Address(array(
            'address' => $request->get('address2'),
            'village' => $request->get('village2'),
            'room_number' => $request->get('room_number2'),
            'room_floor' => $request->get('room_floor2'),
            'group_home' => $request->get('group_home2'),
            'alley' => $request->get('alley2'),
            'road' => $request->get('road2'),
            'local' => $request->get('local2'),
            'district' => $request->get('district2'),
            'province' => $request->get('province2'),
            'zip_code' => $request->get('zip_code2'),
            'phone' => $request->get('phone2'),
            'category'=>'1',
            'id_rela'=> $sta->id,
            ));
            $add2->save();
      $add3 = new Address(array(
            'address' => $request->get('address3'),
            'village' => $request->get('village3'),
            'room_number' => $request->get('room_number3'),
            'room_floor' => $request->get('room_floor3'),
            'group_home' => $request->get('group_home3'),
            'alley' => $request->get('alley3'),
            'road' => $request->get('road3'),
            'local' => $request->get('local3'),
            'district' => $request->get('district3'),
            'province' => $request->get('province3'),
            'zip_code' => $request->get('zip_code3'),
            'phone' => $request->get('phone3'),
            'category'=>'2',
            'id_rela'=> $sta->id,
            ));
            $add3->save();
      $add4 = new Address(array(
            'address' => $request->get('address4'),
            'village' => $request->get('village4'),
            'room_number' => $request->get('room_number4'),
            'room_floor' => $request->get('room_floor4'),
            'group_home' => $request->get('group_home4'),
            'alley' => $request->get('alley4'),
            'road' => $request->get('road4'),
            'local' => $request->get('local4'),
            'district' => $request->get('district4'),
            'province' => $request->get('province4'),
            'zip_code' => $request->get('zip_code4'),
            'phone' => $request->get('phone4'),
            'category'=>'3',
            'id_rela'=> $sta->id,
            ));
            $add4->save();
      

    //----------------------------------------------------------------------------------//

     $sta1 = new Identity_status(array(
            'check_live' => $request->get('check_live5'),
            'live_cate' => $request->get('live_cate5'),
            'live_status' => $request->get('live_status5'),
            'c_live_status' => $request->get('c_live_status2'),
            'borrower_id' => $bowwoer->id,
            //'dob' => $request->get('dob1'),
            'class'=>'heir',
            ));
            $sta1->save();
      $id5 = new Identity_info(array(
            'name' => $request->get('name5'),
            'surename' => $request->get('surename5'),
            'id_p' => $request->get('id_p5'),
            'id_exp' => $request->get('id_exp5'),
            'prefix' => $request->get('prefix5'),
            'dob' => $request->get('dob5'),
            'category'=>'1',
            'id_rela'=> $sta1->id,
            ));
            $id5->save();
      $add5 = new Address(array(
            'address' => $request->get('address5'),
            'village' => $request->get('village5'),
            'room_number' => $request->get('room_number5'),
            'room_floor' => $request->get('room_floor5'),
            'group_home' => $request->get('group_home5'),
            'alley' => $request->get('alley5'),
            'road' => $request->get('road5'),
            'local' => $request->get('local5'),
            'district' => $request->get('district5'),
            'province' => $request->get('province5'),
            'zip_code' => $request->get('zip_code5'),
            'phone' => $request->get('phone5'),
            'category'=>'1',
            'id_rela'=> $sta1->id,
            ));
            $add5->save();
        $add6 = new Address(array(
            'address' => $request->get('address6'),
            'village' => $request->get('village6'),
            'room_number' => $request->get('room_number6'),
            'room_floor' => $request->get('room_floor6'),
            'group_home' => $request->get('group_home6'),
            'alley' => $request->get('alley6'),
            'road' => $request->get('road6'),
            'local' => $request->get('local6'),
            'district' => $request->get('district6'),
            'province' => $request->get('province6'),
            'zip_code' => $request->get('zip_code6'),
            'phone' => $request->get('phone6'),
            'category'=>'2',
             'id_rela'=> $sta1->id,
            ));
            $add6->save();            

        return redirect()->route('Fund_borrowing.index')->with('message','item has been added successfully');
     }

     public function show(Identity_status $service)
     {
            $ser = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            //->whereIn('class', ['guarantor', 'borrow'])
           // ->where('class', 'guarantor')
           ->Where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->where('borrowing_info.id_rela',$service->id)
            ->select('*')
            ->first();
            return view('Fund_borrowing.show',compact('service'));
     }

     public function edit($service1)
    {
             $service = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->Where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->where('borrowing_info.id',$service1)
            ->select('*','borrowing_info.id as id')
            ->first();
             $ser = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
           ->Where('class', 'borrow')
            ->where('Identity_info.category', '2')
            ->where('borrowing_info.id',$service1)
            ->select('*')
            ->first();
            //--------------------------------------------------------------------
             $ser2 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
           ->Where('class', 'guarantor')
            ->where('Identity_info.category', '1')
            ->where('borrowing_info.id',$service1)
            ->select('*')
            ->first();
             $ser3 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
           ->Where('class', 'guarantor')
            ->where('Identity_info.category', '2')
            ->where('borrowing_info.id',$service1)
            ->select('*')
            ->first();
            $ser35 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
           ->Where('class', 'guarantor')
            ->where('Address.category', '3')
            ->where('borrowing_info.id',$service1)
            ->select('*')
            ->first();
            //---------------------------------------------------------------------
             $ser4 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
           ->Where('class', 'heir')
            ->where('Identity_info.category', '1')
            ->where('borrowing_info.id',$service1)
            ->select('*')
            ->first();
             $ser5 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
           ->Where('class', 'heir')
            ->where('Address.category', '2')
            ->where('borrowing_info.id',$service1)
            ->select('*')
            ->first();
           //dd($service);
           
            
        return view('fund_borrowing.edit',compact('service','ser','ser1','ser2','ser3','ser35','ser4','ser5'));
    }

    public function update(ServiceRequest $request,$service1)
   {
          //dd($service);
            $rela = $request->get('id_rela');
            $rela1 = $request->get('id_rela1');
            $rela2 = $request->get('id_rela2');
           $borrow = DB::table('borrowing_info')
            ->where('id', $service1)
            ->update([
            'debt_cat' => $request->get('debt_cat'),
            'money' => $request->get('money'),
            'forwhat' => $request->get('forwhat'),
            'pic' => $request->get('pic'),
            'relation' => $request->get('relation'),
            'job_borrow' => $request->get('job_borrow'),
            'role' => $request->get('role'),
            'income_borrow' => $request->get('income_borrow'),
            'bname' => $request->get('bname'),
            'phone_job' => $request->get('phone_job'),
            'newname' => $request->get('newname'),
            'newsname' => $request->get('newsname'),
            'life' => $request->get('life'),
            ]);
              $sta = DB::table('Identity_status')
            ->where('id',$rela)
            ->update([
            'date' => $request->get('date'),
            'year' => $request->get('year'),
            'live_cate' => $request->get('live_cate'),
            'live_status' => $request->get('live_status'),
            'm_status' => $request->get('m_status'),
            'job' => $request->get('job'),
            'income' => $request->get('income'),
            'c_live_status' => $request->get('c_live_status'),
            ]);
            $id = DB::table('Identity_info')
            ->where('id_rela', $rela)
            ->where('category', '1')
            ->update([
            'name' => $request->get('name'),
            'surename' => $request->get('surename'),
            'id_p' => $request->get('id_p'),
            'id_exp' => $request->get('id_exp'),
            'prefix' => $request->get('prefix'),
            'dob' => $request->get('dob'),
            'category'=>'1',
            ]);
            $add = DB::table('Address')
            ->where('id_rela', $rela)
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
            'category'=>'1',
            ]);
               $id2 = DB::table('Identity_info')
            ->where('id_rela', $rela)
            ->where('category', '2')
            ->update([
            'name' => $request->get('name1'),
            'surename' => $request->get('surename1'),
            'id_p' => $request->get('id_p1'),
            'id_exp' => $request->get('id_exp1'),
            'prefix' => $request->get('prefix1'),
            'dob' => $request->get('dob1'),
            ]);
            $add2 = DB::table('Address')
            ->where('id_rela', $rela)
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
            ]);
          //-------------------------------------------------------------------
             $sta1 = DB::table('Identity_status')
            ->where('id',$rela1)
            ->update([
            'live_cate' => $request->get('live_cate1'),
            'live_status' => $request->get('live_status1'),
            'c_live_status' => $request->get('c_live_status1'),
            ]);
            $id2 = DB::table('Identity_info')
            ->where('id_rela', $rela1)
            ->where('category', '1')
            ->update([
            'name' => $request->get('name2'),
            'surename' => $request->get('surename2'),
            'id_p' => $request->get('id_p2'),
            'id_exp' => $request->get('id_exp2'),
            'prefix' => $request->get('prefix2'),
            'dob' => $request->get('dob2'),
            ]);
            $add2 = DB::table('Address')
            ->where('id_rela', $rela1)
            ->where('category', '1')
            ->update([
            'address' => $request->get('address2'),
            'village' => $request->get('village2'),
            'room_number' => $request->get('room_number2'),
            'room_floor' => $request->get('room_floor2'),
            'group_home' => $request->get('group_home2'),
            'alley' => $request->get('alley2'),
            'road' => $request->get('road2'),
            'local' => $request->get('local2'),
            'district' => $request->get('district2'),
            'province' => $request->get('province2'),
            'zip_code' => $request->get('zip_code2'),
            'phone' => $request->get('phone2'),
            ]);
            $add3 = DB::table('Address')
            ->where('id_rela', $rela1)
            ->where('category', '2')
            ->update([
            'address' => $request->get('address3'),
            'village' => $request->get('village3'),
            'room_number' => $request->get('room_number3'),
            'room_floor' => $request->get('room_floor3'),
            'group_home' => $request->get('group_home3'),
            'alley' => $request->get('alley3'),
            'road' => $request->get('road3'),
            'local' => $request->get('local3'),
            'district' => $request->get('district3'),
            'province' => $request->get('province3'),
            'zip_code' => $request->get('zip_code3'),
            'phone' => $request->get('phone3'),
            ]);
             $add4 = DB::table('Address')
            ->where('id_rela', $rela1)
            ->where('category', '3')
            ->update([
            'address' => $request->get('address4'),
            'village' => $request->get('village4'),
            'room_number' => $request->get('room_number4'),
            'room_floor' => $request->get('room_floor4'),
            'group_home' => $request->get('group_home4'),
            'alley' => $request->get('alley4'),
            'road' => $request->get('road4'),
            'local' => $request->get('local4'),
            'district' => $request->get('district4'),
            'province' => $request->get('province4'),
            'zip_code' => $request->get('zip_code4'),
            'phone' => $request->get('phone4'),
            ]);
            //-----------------------------------------------------------------------------------
             $sta2 = DB::table('Identity_status')
            ->where('id',$rela2)
            ->update([
            'live_cate' => $request->get('live_cate5'),
            'live_status' => $request->get('live_status5'),
            'c_live_status' => $request->get('c_live_status2'),
            ]);
            $id3 = DB::table('Identity_info')
            ->where('id_rela', $rela2)
            ->where('category', '1')
            ->update([
            'name' => $request->get('name5'),
            'surename' => $request->get('surename5'),
            'id_p' => $request->get('id_p5'),
            'id_exp' => $request->get('id_exp5'),
            'prefix' => $request->get('prefix5'),
            'dob' => $request->get('dob5'),
            ]);
             $add5 = DB::table('Address')
            ->where('id_rela', $rela2)
            ->where('category', '1')
            ->update([
            'address' => $request->get('address5'),
            'village' => $request->get('village5'),
            'room_number' => $request->get('room_number5'),
            'room_floor' => $request->get('room_floor5'),
            'group_home' => $request->get('group_home5'),
            'alley' => $request->get('alley5'),
            'road' => $request->get('road5'),
            'local' => $request->get('local5'),
            'district' => $request->get('district5'),
            'province' => $request->get('province5'),
            'zip_code' => $request->get('zip_code5'),
            'phone' => $request->get('phone5'),
            ]);
             $add5 = DB::table('Address')
            ->where('id_rela', $rela2)
            ->where('category', '2')
            ->update([
            'address' => $request->get('address6'),
            'village' => $request->get('village6'),
            'room_number' => $request->get('room_number6'),
            'room_floor' => $request->get('room_floor6'),
            'group_home' => $request->get('group_home6'),
            'alley' => $request->get('alley6'),
            'road' => $request->get('road6'),
            'local' => $request->get('local6'),
            'district' => $request->get('district6'),
            'province' => $request->get('province6'),
            'zip_code' => $request->get('zip_code6'),
            'phone' => $request->get('phone6'),
            ]);
            //dd($rela2);


       return redirect()->route('Fund_borrowing.index')->with('message','item has been updated successfully');
   }

     public function destroy($service1)
     {
            $ser = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->Where('class','borrow')
            ->where('borrowing_info.id',$service1)
            ->select('Identity_status.id')
            ->first();
            $ser1 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->Where('class','guarantor')
            ->where('borrowing_info.id',$service1)
            ->select('Identity_status.id')
            ->first();
            $ser2 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->Where('class','heir')
            ->where('borrowing_info.id',$service1)
            ->select('Identity_status.id')
            ->first();
          DB::table('borrowing_info')
            ->where('id', $service1)
            ->delete();
          DB::table('Identity_status')
            ->whereIn('id', [$ser->id, $ser1->id, $ser2->id])
            ->delete();
          DB::table('Identity_info')
            ->whereIn('id_rela', [$ser->id, $ser1->id, $ser2->id])
            ->delete();
          DB::table('Address')
            ->whereIn('id_rela', [$ser->id, $ser1->id, $ser2->id])
            ->delete();
            
      // dd($ser3);
        return redirect()->route('Fund_borrowing.index')->with('message','item has been deleted successfully');
     }
}
