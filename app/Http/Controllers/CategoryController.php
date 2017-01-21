<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $cate = DB::table('category')->get();
      return view('category.index', compact('cate'));
    }
    public function create(){
    return view('category.create');
    }
    public function store(CategoryRequest $request)
     {
         Category::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/
        return redirect()->route('category.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(Place $place)
    {
        return view('place.edit',compact('place'));
    }

    public function update(DeRequest $request,Place $place)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       $place->update($request->all());
       return redirect()->route('place.index')->with('message','item has been updated successfully');
   }

     public function destroy(Place $place)
     {
        $place->delete();
        return redirect()->route('place.index')->with('message','item has been deleted successfully');
     }
}
