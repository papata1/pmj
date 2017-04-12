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
use Illuminate\Support\Facades\DB;

class Fund_enterpiseController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){

    $ser = DB::table('Enterpise_info')

                ->get();

      return view('Fund_enterpise.index',compact('ser'));
    }
    public function create(){

    return view('Fund_enterpise.create');
    }
    public function store(ServiceRequest $request)
     {
       //Service::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/


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
            


        return redirect()->route('Fund_enterpise.index');
     }

     public function show($id)
     {
//dd($service);
    $service = DB::table('Enterpise_info')
            ->leftJoin('Enterpise_detail','Enterpise_detail.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_list','Enterpise_list.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_man','Enterpise_man.enterpise_info_id', '=', 'Enterpise_info.id')
            ->where('Enterpise_info.id',$id)
            ->where('Enterpise_man.cat',1)
            ->select('*','Enterpise_info.id as id_info')
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
       
        return view('Fund_enterpise.show',compact('service','ser','ser1'));
     }

     public function edit($id)
    {
    //  
    $service = DB::table('Enterpise_info')
            ->leftJoin('Enterpise_detail','Enterpise_detail.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_list','Enterpise_list.enterpise_info_id', '=', 'Enterpise_info.id')
            ->leftJoin('Enterpise_man','Enterpise_man.enterpise_info_id', '=', 'Enterpise_info.id')
            ->where('Enterpise_info.id',$id)
            ->where('Enterpise_man.cat',1)
            ->select('*','Enterpise_info.id as id_info')
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
       
        return view('Fund_enterpise.edit',compact('service','ser','ser1'));
    }

    public function update(ServiceRequest $request,$service)
   {
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
          /*  DB::table('Enterpise_list')
            ->where('enterpise_info_id',$service)
            ->update([
              'name_m'=>$request->get('name_m1'),
              'surename_m'=>$request->get('surename_m1'),
              'location_m'=>$request->get('location_m1'),
              'phone_m'=>$request->get('phone_m1'),

            ]);*/
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
        return redirect()->route('Fund_enterpise.index')->with('message','item has been deleted successfully');
     }
}
