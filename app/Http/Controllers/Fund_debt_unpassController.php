<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use Illuminate\Support\Facades\DB;

class Fund_debt_unpassController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::unpass();
     // $ser = DB::table('Service')->get();
     // return view('service.index',compact('ser'));
      return view('Fund_debt_unpass.index');
    }
    public function create(){
    return view('Fund_debt_unpass.create');
    }
    public function store(ServiceRequest $request)
     {
       Service::create($request->unpass());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/

        return redirect()->route('Fund_debt_unpass.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(Service $service)
    {
        return view('Fund_debt.edit_unpass',compact('service'));
    }

    public function update(ServiceRequest $request,Service $service)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       $service->update($request->unpass());
       return redirect()->route('Fund_debt.index_unpass')->with('message','item has been updated successfully');
   }

     public function destroy(Service $service)
     {
        $service->delete();
        return redirect()->route('Fund_debt.index_unpass')->with('message','item has been deleted successfully');
     }
}
