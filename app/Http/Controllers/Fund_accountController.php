<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Payment;
use Illuminate\Support\Facades\DB;

class Fund_accountController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('account')->except('index');
  }
    public function index(){
$ser = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('year','year.id', '=', 'Identity_status.year')
           ->Where('class', 'borrow')
           ->WhereIn('debt_new.name', ['2','3'])
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_r','Identity_info.name as namei')
            ->get();

         $ser1 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
           ->Where('class', 'guarantor')
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_r')
            ->get();
      return view('Fund_account.index',compact('ser','ser1'));
    }
    public function create(){
    return view('Fund_account.create');
    }
    public function store(ServiceRequest $request)
     {
  
           // dd($ser);
       //return_money
       
       $id = $request->get('id_borrower');
       // dd($id);
       $all = DB::table('borrowing_info')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->where('id_borrower', $request->get('id_borrower'))
            ->select('*')
            ->first();
            $time1 = strtotime($all->date_latest);
            $time = date("Y-m-d", strtotime("+1 month", $time1));
        $pay= Payment::create($request->all());
         $debt = DB::table('debt_record_result')
         ->where('id_borrower',$pay->id_borrower)
          ->first();
        if($all->return_money == $request->get('total')){
          DB::table('debt_record_result')
         ->where('id_borrower',$pay->id_borrower)
         ->update([
         'money_remain' => $debt->money_remain - $pay->total,
         'mounth_remain' => $debt->mounth_remain-1,
         'date_latest' => $time,
         'money_payed' =>$debt->money_payed + $pay->total
          ]);

        }else{
         //  $mod = 1 ;
            if($request->get('total') < $all->return_money ){
                    if($all->pay_mod == 0){
                             DB::table('debt_record_result')
                            ->where('id_borrower',$pay->id_borrower)
                            ->update([
                            'money_remain' => $debt->money_remain - $pay->total,
                            'pay_mod' => $request->get('total'),
                            'money_payed' =>$debt->money_payed + $pay->total
                              ]);    
                            }else{
                         $mod = $all->pay_mod + $request->get('total') ;

                                 if($mod < $all->return_money ){
                                       DB::table('debt_record_result')
                                        ->where('id_borrower',$pay->id_borrower)
                                        ->update([
                                        'money_remain' => $debt->money_remain - $pay->total,
                                        'pay_mod' => $mod,
                                         //'mounth_remain' => $debt->mounth_remain-1,
                                        //'date_latest' => $time,
                                        'money_payed' =>$debt->money_payed + $pay->total
                                          ]);  
                                 }else{
                                   $r = $mod - $all->return_money;
                                     DB::table('debt_record_result')
                                        ->where('id_borrower',$pay->id_borrower)
                                        ->update([
                                        'money_remain' => $debt->money_remain - $pay->total,
                                        'pay_mod' => $r,
                                         'mounth_remain' => $debt->mounth_remain-1,
                                        'date_latest' => $time,
                                        'money_payed' =>$debt->money_payed + $pay->total
                                          ]);  
                                 }  
                        
                      }          
                }else{
                  $mod = $all->pay_mod + $request->get('total') ;
                  $r =  floor($mod/$all->return_money);
                  $r_mod =$mod%$all->return_money;
                   $time = date("Y-m-d", strtotime("+".$r." month", $time1));
                   //dd($time);
                  DB::table('debt_record_result')
                  ->where('id_borrower',$pay->id_borrower)
                  ->update([
                  'money_remain' => $debt->money_remain - $pay->total,
                  'pay_mod' => $r_mod,
                  'mounth_remain' => $debt->mounth_remain-1,
                  'date_latest' => $time,
                  'money_payed' =>$debt->money_payed + $pay->total
                  ]);  
                } 
        }
        //dd( $mod);
     // dd($request->get('total'));
       
       
     /*  DB::table('debt_record_result')
         ->where('id_borrower',$pay->id_borrower)
         ->update([
         'money_remain' => $debt->money_remain - $pay->total,
         'mounth_remain' => $debt->mounth_remain-1,
         'date_latest' => $time,
         'money_payed' =>$debt->money_payed + $pay->total
       ]);*/

         $service = $pay->id_borrower;
 
               $ser1 = DB::table('debt_record_result')
            ->where('id_borrower',$pay->id_borrower)
            ->first();
             $ser2 = DB::table('borrowing_info')
             ->leftJoin('Payment','Payment.id_borrower', '=', 'borrowing_info.id')
            ->where('id_borrower',$pay->id_borrower)
            ->get();
                        $ser3 = DB::table('borrowing_info')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
            ->where('borrowing_info.id',$pay->id_borrower)
            ->first();



            
        //return view('Fund_account.edit',compact('ser3','ser2','ser1','ser','service'))->with('message','บันทึกเรียบร้อยแล้ว');
        return redirect()->route('Fund_account.edit', [$id]);
      /* return redirect()->action(
          'Fund_account@edit', [$id]
      );*/
     }

     public function show($id)
     {

//dd($id);
 $service = DB::table('borrowing_info')
            ->leftJoin('identity_status','identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('identity_info','identity_info.id_rela', '=', 'identity_status.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->where('class','borrow')
            ->where('borrowing_info.id',$id)
            ->first();
             $ser = DB::table('borrowing_info')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
            ->where('borrowing_info.id',$id)
            ->first();
return view('Fund_account.show',compact('id','service','ser'));
     }

     public function edit($service)
    {
               $ser1 = DB::table('debt_record_result')
            ->where('id_borrower',$service)
            ->first();
             $ser2 = DB::table('borrowing_info')
             ->leftJoin('Payment','Payment.id_borrower', '=', 'borrowing_info.id')
            ->where('id_borrower',$service)
            ->select('*','Payment.id as id_r')
            ->get();
          //  dd($ser2);
           $ser5 = DB::table('borrowing_info')
             ->leftJoin('Payment','Payment.id_borrower', '=', 'borrowing_info.id')
            ->where('id_borrower',$service)
            ->orderBy('Payment.id', 'Desc')
            ->first();
                        $ser3 = DB::table('borrowing_info')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
             ->select('*','borrowing_info.money as money')
            ->where('borrowing_info.id',$service)
            ->first();
            //dd($ser3);
        return view('Fund_account.edit',compact('ser3','ser2','ser1','ser','service','ser5'));
    }

public function edit1($service)
   {
          $service = DB::table('Payment')
                      ->leftJoin('borrowing_info','borrowing_info.id', '=', 'Payment.id_borrower')
                      ->leftJoin('identity_status','identity_status.borrower_id', '=', 'borrowing_info.id')
                      ->leftJoin('identity_info','identity_info.id_rela', '=', 'identity_status.id')
                      ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
                      ->where('Payment.id',$service)
                      ->select('*','Payment.id as id_p')
                      ->where('class','borrow')
                      ->first();
              $ser = DB::table('borrowing_info')
                      ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
                      ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
                      ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
                      ->where('borrowing_info.id',$service->id_borrower)
                      ->first();
                     // dd($service);
                  return view('Fund_account.edit1',compact('service','ser'));

   }
    public function update($service)
   {
         $pay = DB::table('Payment')
         ->where('id',$service)
          ->first();
         dd($request->get('date_pay'));
       $debt = DB::table('debt_record_result')
         ->where('id_borrower',$pay->id_borrower)
          ->first();
          $rollback = $pay->total + $debt->money_remain;
          $rollback1 =  $debt->money_payed - $pay->total;
      //  $money_remain  = $debt->money_remain - $pay->total;

    $pay1 =  DB::table('Payment')
         ->where('id',$service)
         ->update([
           'date_pay' => $request->get('date_pay'),
           'place_pay' => $request->get('place_pay'),
           'total' => $request->get('total'),
           'bill_book' => $request->get('bill_book'),
           'bill_no' => $request->get('bill_no'),
           'remark' => $request->get('remark'),
           'order_no' => $request->get('order_no'),
            'order_date' => $request->get('order_date')
         ]);
         //dd($service);
              DB::table('debt_record_result')
         ->where('id_borrower',$pay->id_borrower)
         ->update([
         'money_remain' => $rollback - $request->get('total'),
         'money_payed' => $rollback1 + $request->get('total'),
       ]);
                 return redirect()->route('Fund_account.edit', [$pay->id_borrower]);

   }

     public function destroy($service)
     {
        $service->delete();
        return redirect()->route('Fund_account.index')->with('message','item has been deleted successfully');
     }
     public function excel($service)
     {
       $ser2 = DB::table('Payment')
             ->leftJoin('borrowing_info','borrowing_info.id', '=', 'Payment.id_borrower')
             ->leftJoin('identity_status','identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('identity_info','identity_info.id_rela', '=', 'identity_status.id')
            ->where('id_borrower',$service)
             ->Where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->get();
          // dd($ser2);
        return view('Fund_account.excel',compact('ser2'));

     }

}
