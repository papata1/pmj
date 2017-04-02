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
      //$app = application_layer::all();
     // $ser = DB::table('Service')->get();
     // return view('service.index',compact('ser'));
      return view('Fund_enterpise.index');
    }
    public function create(){
    return view('Fund_enterpise.create');
    }
    public function store(ServiceRequest $request)
     {
       Service::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/

        return redirect()->route('Fund_enterpise.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(Service $service)
    {
        return view('Fund_enterpise.edit',compact('service'));
    }

    public function update(ServiceRequest $request,Service $service)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       $service->update($request->all());
       return redirect()->route('Fund_enterpise.index')->with('message','item has been updated successfully');
   }

     public function destroy(Service $service)
     {
        $service->delete();
        return redirect()->route('Fund_enterpise.index')->with('message','item has been deleted successfully');
     }
}
