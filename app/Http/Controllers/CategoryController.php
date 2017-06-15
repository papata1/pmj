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
  }
    public function index(){
      //$app = application_layer::all();
      $cate = DB::table('category')
      ->where('id','!=','0')
      ->get();
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

     public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    public function update(CategoryRequest $request,category $category)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       $category->update($request->all());
       return redirect()->route('category.index')->with('message','item has been updated successfully');
   }

     public function destroy(Category $category)
     {
        $category->delete();
        return redirect()->route('category.index')->with('message','item has been deleted successfully');
     }
}
