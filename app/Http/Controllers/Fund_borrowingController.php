<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\Identity_infoRequest;
use App\Http\Requests\ServiceRequest;
use App\Borrowing_info;
use App\Address;
use App\Identity_info;
use App\Identity_status;
use App\category;
use App\debt_new;
use App\debt_record_result;
use App\debt_record;
use App\Year;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class Fund_borrowingController extends Controller
{
  public function __construct()
  {
     $this->middleware('auth');
      $this->middleware('rent')->except('index');

  }
    public function index(){
      //$app = application_layer::all();
     // $ser = DB::table('Service')->get();
     $ser = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('year','year.id', '=', 'Identity_status.year')
            //->whereIn('class', ['guarantor', 'borrow'])
           // ->where('class', 'guarantor')
           ->Where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_r','debt_new.name as status','Identity_info.name as namei')
            ->get();
             $ser1 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            //->whereIn('class', ['guarantor', 'borrow'])
           // ->where('class', 'guarantor')
           ->Where('class', 'guarantor')
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_r')
            ->get();

      //return view('service.index');
    // dd($ser);
      return view('fund_borrowing.index',compact('ser','ser1'));
    }
    public function create(){
        
         $ser1=array();
        $i=0;
            $ser = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->where('Identity_info.category', '1')
            ->select('id_p')
            ->get();
            foreach($ser as $row){
                $ser1[$i] = $row->id_p;
                $i++;
            }
       $year = Year::pluck('year','id')->toArray();

    return view('fund_borrowing.create',compact('year','ser1'));
    }
    public function store(Identity_infoRequest $request)
     {
      $bowwoer = Borrowing_info::create($request->all());
         DB::table('debt_new')->insert([
             'name' => 0,
      'id_borrower' => $bowwoer->id
      ]);
        DB::table('debt_record_result')->insert([
      'id_borrower' => $bowwoer->id
      ]);
      if ($request->hasFile('pic')) {
            $fileName = $bowwoer->id . '.' .
                $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move(
                base_path() . '/public/images/', $fileName

            );
            $busfile = DB::table('Borrowing_info')
                ->where('id', $bowwoer->id)
                ->update(['pic' => $fileName]);
        }
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
            'job' => $request->get('job1'),
            'income' => $request->get('income1'),
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

     public function show($service1)
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
              ->where('Address.category', '2')
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
         // dd($ser3);

            $year = Year::pluck('year','id')->toArray();
        return view('fund_borrowing.show',compact('service','ser','ser1','ser2','ser3','ser35','ser4','ser5','year'));
     }

     public function edit($service1)
    {
        $ck_id=array();
        $i=0;
            $q5 = DB::table('Identity_status')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->where('Identity_info.category', '1')
            ->select('id_p')
            ->get();
            foreach($q5 as $row){
                $ck_id[$i] = $row->id_p;
                $i++;
            }
             $service = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Address','Address.id_rela', '=', 'Identity_status.id')
            ->Where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->where('borrowing_info.id',$service1)
            ->select('*','borrowing_info.id as id')
            ->first();
            //dd($service);
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
              ->where('Address.category', '2')
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
          //dd($ck_id);

            $year = Year::pluck('year','id')->toArray();
        return view('fund_borrowing.edit',compact('service','ser','ser1','ser2','ser3','ser35','ser4','ser5','year','ck_id'));
    }

    public function update(ServiceRequest $request,$service1)
   {
          //dd($service);
          $i = mt_rand(0,100);

        if ($request->hasFile('pic')) {
            $fileName = 'edit'.$service1.'-'.$i. '.' .
                $request->file('pic')->getClientOriginalExtension();
           // $fileName1 = $bus->id . '.' .
            //    $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move(
                base_path() . '/public/images/', $fileName

            );

            $busfile1 = DB::table('borrowing_info')
                ->where('id', $service1)
                ->update(['pic' => $fileName]);
        }
            $rela = $request->get('id_rela');
            $rela1 = $request->get('id_rela1');
            $rela2 = $request->get('id_rela2');
           $borrow = DB::table('borrowing_info')
            ->where('id', $service1)
            ->update([
            'debt_cat' => $request->get('debt_cat'),
            'money' => $request->get('money'),
            'forwhat' => $request->get('forwhat'),
            'job_remark' => $request->get('job_remark'),
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
            //'category'=>'1',
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
            //'category'=>'1',
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
            'job' => $request->get('job1'),
            'income' => $request->get('income1'),
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
            'c_live_status' => $request->get('c_live_status5'),
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
        // dd($service1);
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
                    //dd($ser1);

          DB::table('borrowing_info')
            ->where('id', $service1)
            ->delete();
          DB::table('Identity_status')
            ->where('borrower_id', $service1)
            ->delete();
          DB::table('Identity_info')
            ->where('id_rela', $ser->id)
            ->delete();
            DB::table('Identity_info')
            ->where('id_rela', $ser1->id)
            ->delete();
            DB::table('Identity_info')
            ->where('id_rela', $ser2->id)
            ->delete();
          DB::table('Address')
            ->where('id_rela',$ser->id)
            ->delete();
            DB::table('Address')
            ->where('id_rela',$ser1->id)
            ->delete();
            DB::table('Address')
            ->where('id_rela',$ser2->id)
            ->delete();
         DB::table('debt_new')
            ->where('id_borrower', $service1)
            ->delete();
        DB::table('debt_record_result')
            ->where('id_borrower', $service1)
            ->delete();
            DB::table('payment')
            ->where('id_borrower', $service1)
            ->delete();
      // dd($ser3);
        return redirect()->route('Fund_borrowing.index')->with('message','item has been deleted successfully');
     }
      public function excel($service1)
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
              ->where('Address.category', '2')
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

            //$year = Year::pluck('year','id')->toArray();
      //  return view('Fund_borrowing.excel',compact('service','ser','ser1','ser2','ser3','ser35','ser4','ser5','year'));
    $templateProcessor2 = new \PhpOffice\PhpWord\TemplateProcessor(asset('/tem/borrower_info.docx'));
    $templateProcessor2->setValue('year', $service->year);
    $templateProcessor2->setValue('date', $service->date);
    $templateProcessor2->setValue('debt_cat', $service->debt_cat);
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
    $templateProcessor2->setValue('job_borrow', $ser->job_borrow);
    $templateProcessor2->setValue('income_borrow', $ser->income_borrow);
    $templateProcessor2->setValue('m_status', $service->m_status);
    $templateProcessor2->setValue('zip_code1', $ser->zip_code);
    $templateProcessor2->setValue('phone1', $ser->phone);
        $templateProcessor2->setValue('id_p2', $ser->id_p);
    $templateProcessor2->setValue('id_exp2', $ser->id_exp);
    $templateProcessor2->setValue('prefix2', $ser->prefix);
    $templateProcessor2->setValue('name2', $ser->name);
    $templateProcessor2->setValue('sname2', $ser->surename);
    $templateProcessor2->setValue('dob2', $ser->dob);
    $templateProcessor2->setValue('job', $ser->job);
    $templateProcessor2->setValue('income', $ser->income);
    $templateProcessor2->setValue('money', $ser->money);
    $templateProcessor2->setValue('forwhat', $ser->forwhat);
        $templateProcessor2->setValue('id_p3', $ser->id_p);
    $templateProcessor2->setValue('id_exp3', $ser->id_exp);
    $templateProcessor2->setValue('prefix3', $ser->prefix);
    $templateProcessor2->setValue('name3', $ser->name);
    $templateProcessor2->setValue('sname3', $ser->surename);
    $templateProcessor2->setValue('dob3', $ser->dob);
        $templateProcessor2->setValue('address2', $ser2->address);
    $templateProcessor2->setValue('village2', $ser2->village);
    $templateProcessor2->setValue('room_number2', $ser2->room_number);
    $templateProcessor2->setValue('room_floor2', $ser2->room_floor);
    $templateProcessor2->setValue('group_home2', $ser2->group_home);
    $templateProcessor2->setValue('road2', $ser2->road);
    $templateProcessor2->setValue('local2', $ser2->local);
    $templateProcessor2->setValue('district2', $ser2->district);
    $templateProcessor2->setValue('province2', $ser2->province);
    $templateProcessor2->setValue('zip_code2', $ser2->zip_code);
    $templateProcessor2->setValue('phone2', $ser2->phone);
        $templateProcessor2->setValue('address3', $ser3->address);
    $templateProcessor2->setValue('village3', $ser3->village);
    $templateProcessor2->setValue('room_number3', $ser3->room_number);
    $templateProcessor2->setValue('room_floor3', $ser3->room_floor);
    $templateProcessor2->setValue('group_home3', $ser3->group_home);
    $templateProcessor2->setValue('road3', $ser3->road);
    $templateProcessor2->setValue('local3', $ser3->local);
    $templateProcessor2->setValue('district3', $ser3->district);
    $templateProcessor2->setValue('province3', $ser3->province);
    $templateProcessor2->setValue('zip_code3', $ser3->zip_code);
     $templateProcessor2->setValue('rela', $service->relation);
    $templateProcessor2->setValue('j', $ser35->job);
    $templateProcessor2->setValue('j1', $ser35->role);
    $templateProcessor2->setValue('j2', $ser35->income);
    $templateProcessor2->setValue('bname', $ser35->bname); 
        $templateProcessor2->setValue('address4', $ser35->address);
    $templateProcessor2->setValue('village4', $ser35->village);
    $templateProcessor2->setValue('room_number4', $ser35->room_number);
    $templateProcessor2->setValue('room_floor4', $ser35->room_floor);
    $templateProcessor2->setValue('group_home4', $ser35->group_home);
    $templateProcessor2->setValue('road4', $ser35->road);
    $templateProcessor2->setValue('local4', $ser35->local);
    $templateProcessor2->setValue('district4', $ser35->district);
    $templateProcessor2->setValue('province4', $ser35->province);
    $templateProcessor2->setValue('zip_code4', $ser35->zip_code);
    $templateProcessor2->setValue('btel', $ser35->phone_job);
    $templateProcessor2->setValue('btel1', $ser35->phone);
    $templateProcessor2->setValue('life', $service->life);
        $templateProcessor2->setValue('id_p4', $ser4->id_p);
    $templateProcessor2->setValue('id_exp4', $ser4->id_exp);
    $templateProcessor2->setValue('prefix4', $ser4->prefix);
    $templateProcessor2->setValue('name4', $service->name);
    $templateProcessor2->setValue('sname4', $ser4->surename);
    $templateProcessor2->setValue('dob4', $ser4->dob);
    $templateProcessor2->setValue('address5', $ser4->address);
    $templateProcessor2->setValue('village5', $ser4->village);
    $templateProcessor2->setValue('room_number5', $ser4->room_number);
    $templateProcessor2->setValue('room_floor5', $ser4->room_floor);
    $templateProcessor2->setValue('group_home5', $ser4->group_home);
    $templateProcessor2->setValue('road5', $ser4->road);
    $templateProcessor2->setValue('local5', $ser4->local);
    $templateProcessor2->setValue('district5', $ser4->district);
    $templateProcessor2->setValue('province5', $ser4->province);
    $templateProcessor2->setValue('zip_code5', $ser4->zip_code);
    $templateProcessor2->setValue('phone5', $ser4->phone);
    $templateProcessor2->setValue('address6', $ser5->address);
    $templateProcessor2->setValue('village6', $ser5->village);
    $templateProcessor2->setValue('room_number6', $ser5->room_number);
    $templateProcessor2->setValue('room_floor6', $ser5->room_floor);
    $templateProcessor2->setValue('group_home6', $ser5->group_home);
    $templateProcessor2->setValue('road6', $ser5->road);
    $templateProcessor2->setValue('local6', $ser5->local);
    $templateProcessor2->setValue('district6', $ser5->district);
    $templateProcessor2->setValue('province6', $ser5->province);
    $templateProcessor2->setValue('zip_code6', $ser5->zip_code);
        $templateProcessor2->setValue('check_live', $service->check_live);
        $templateProcessor2->setValue('check_live1', $ser2->check_live);
        $templateProcessor2->setValue('check_live2', $ser4->check_live);
        $templateProcessor2->setValue('live_cate', $service->live_cate);
        $templateProcessor2->setValue('live_cate1', $ser2->live_cate);
        $templateProcessor2->setValue('live_cate2', $ser5->live_cate);
    if($service->live_status== 1 ){
        $templateProcessor2->setValue('live_status', 'เช่า');
    }elseif($service->live_status== 2 ){
        $templateProcessor2->setValue('live_status', 'ผ่อน :'.$service->c_live_status.'บาท/เดือน');
    }else{
        $templateProcessor2->setValue('live_status', 'อื่นๆ'.$service->c_live_status);
    }
    if($ser2->live_status== 1 ){
        $templateProcessor2->setValue('live_status2', 'เช่า');
    }elseif($ser2->live_status== 2 ){
        $templateProcessor2->setValue('live_status2', 'ผ่อน :'.$ser2->c_live_status.'บาท/เดือน');
    }else{
        $templateProcessor2->setValue('live_status2', 'อื่นๆ'.$ser2->c_live_status);
    }
    if($ser5->live_status== 1 ){
        $templateProcessor2->setValue('live_status3', 'เช่า');
    }elseif($ser5->live_status== 2 ){
        $templateProcessor2->setValue('live_status3', 'ผ่อน :'.$ser5->c_live_status.'บาท/เดือน');
    }else{
        $templateProcessor2->setValue('live_status3', 'อื่นๆ'.$ser5->c_live_status);
    }


    


        $templateProcessor2->saveAs('ข้อมูลผู้กู้_'.$service->name.'.docx');

    return response()->download('ข้อมูลผู้กู้_'.$service->name.'.docx'); 

     }
}
