<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Year;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ser = DB::table('year')
        ->orderBy('id', 'desc')
        ->first();
        $y = date('Y');
        if($ser->year_en < $y ){
        Year::create([
             'year'=>$ser->year+1,
              'year_en'=>$y,
            ]);
        }
           // dd($y);
        return view('admin.dashboard.index');
    }
}
