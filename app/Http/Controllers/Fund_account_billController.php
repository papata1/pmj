<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;


class Fund_account_billController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('account')->except('index');

  }
    public function index(){

      /*$ser = DB::table('Payment')
             ->leftJoin('borrowing_info','borrowing_info.id', '=', 'Payment.id_borrower')
              ->select('*','Payment.id as id_r')
            ->get();*/
            $ser = DB::table('Payment')
            ->leftJoin('borrowing_info','borrowing_info.id', '=', 'Payment.id_borrower')
            ->leftJoin('identity_status','identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('identity_info','identity_info.id_rela', '=', 'identity_status.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('year','year.id', '=', 'Identity_status.year')
            ->select('*','Payment.id as id_r')
            ->where('class','borrow')
            ->where('Identity_info.category', '1')
            ->get();

      return view('Fund_account_bill.index',compact('ser'));
    }
    public function create(){
/*$phpWord  = new \PhpOffice\PhpWord\PhpWord();
	$section = $phpWord->createSection();
	$section->addText('Test PhpWord');
    $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save('testword.docx');*/
	

    //return view('Fund_account_bill.create');
    }
    public function store(ServiceRequest $request)
     {
       Service::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/

        return redirect()->route('Fund_account_bill.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {
        // dd($id);
        DB::table('Payment')
            ->where('id', $id)
            ->delete();

        return redirect()->route('Fund_account_bill.index');
     }

     public function edit($service)
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
            //dd($service);
        return view('Fund_account_bill.edit',compact('service','ser'));
    }

    public function update(ServiceRequest $request,$service)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
    $pay = DB::table('Payment')
         ->where('id',$service)
          ->first();
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
       return redirect()->route('Fund_account_bill.index')->with('message','item has been updated successfully');
   }

     public function destroy($service)
     {
         dd($service);
        DB::table('Payment')
            ->where('id', $service)
            ->delete();

        return redirect()->route('Fund_account_bill.index');
     }
      public function excel($service , $a)
     {

            $ser2 = DB::table('Payment')
            ->leftJoin('borrowing_info','borrowing_info.id', '=', 'Payment.id_borrower')
            ->leftJoin('identity_status','identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('identity_info','identity_info.id_rela', '=', 'identity_status.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'Payment.id_borrower')
            ->select('*','Payment.id as id_r','borrowing_info.money as money')
            ->where('class','borrow')
            ->where('Payment.id',$service)
            ->where('Identity_info.category', '1')
            ->first();
            //dd($ser2);
            if($a==0){
        return view('Fund_account_bill.excel',compact('ser2'));
           

            }
            if($a==1){
                 $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(asset('/tem/bill.docx'));
    $templateProcessor->setValue('prefix', $ser2->prefix);
    $templateProcessor->setValue('name', $ser2->name);
    $templateProcessor->setValue('sname', $ser2->surename);
    $templateProcessor->setValue('no', $ser2->order_no);
    $templateProcessor->setValue('money', $ser2->total);

    $templateProcessor->saveAs('หนังสือส่งใบเสร็จ'.$ser2->name.'.docx');

    return response()->download('หนังสือส่งใบเสร็จ'.$ser2->name.'.docx'); 
       // return view('Fund_account_bill.excel1',compact('ser2'));
            }
            if($a==2){
                 $templateProcessor1 = new \PhpOffice\PhpWord\TemplateProcessor(asset('/tem/confirm.docx'));
    $templateProcessor1->setValue('prefix', $ser2->prefix);
    $templateProcessor1->setValue('name', $ser2->name);
    $templateProcessor1->setValue('sname', $ser2->surename);
    $templateProcessor1->setValue('no', $ser2->contect_id);
    $templateProcessor1->setValue('money', $ser2->money);
    $templateProcessor1->setValue('remain', $ser2->money_remain);
    $templateProcessor1->saveAs('หนังสือแจ้งยืนยันยอด'.$ser2->name.'.docx');

    return response()->download('หนังสือแจ้งยืนยันยอด'.$ser2->name.'.docx'); 
       // return view('Fund_account_bill.excel2',compact('ser2'));
            }

     }

}
