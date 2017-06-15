<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\Debt_record_resultRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use Illuminate\Support\Facades\DB;

class Fund_debt_allController extends Controller
{
  public function __construct()
  {
     $this->middleware('auth');
      $this->middleware('debt')->except('index');
     $this->middleware('rent')->only('edit','update');

  }
    public function index(){
 $ser = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('year','year.id', '=', 'Identity_status.year')
            //->whereIn('class', ['guarantor', 'borrow'])
           // ->where('class', 'guarantor')
           ->WhereIn('debt_new.name', ['2','3'])
           ->Where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_r','Identity_info.name as namei','year.year as year')
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
      return view('Fund_debt_all.index',compact('ser','ser1'));
    }
    public function create(){
    return view('Fund_debt_all.create');
    }
    public function store(ServiceRequest $request)
     {
       Service::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/

        return redirect()->route('Fund_debt_all.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit($service)
    {
      $ser4 = DB::table('borrowing_info')
            ->where('borrowing_info.id', $service)
            ->select('*')
            ->first();
         $ser = DB::table('debt_new')
            ->where('id_borrower',$service)
            ->first();
               $ser1 = DB::table('debt_record_result')
            ->where('id_borrower',$service)
            ->first();
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
      //dd($ser);
        return view('Fund_debt_all.edit',compact('ser4','ser3','ser1','ser','service','ser5'));
    }

    public function update(Debt_record_resultRequest $request,$service)
   {
    DB::table('Debt_record_result')
            ->where('id_borrower',$service)
            ->update([
            'contect_id' => $request->get('contect_id'),
            'no' => $request->get('no'),
            'money' => $request->get('money'),
            'money_remain' => $request->get('money'),
            'mounth_remain' => $request->get('return_money_total'),
            'date_count' => $request->get('date_count'),
            'time_total' => $request->get('time_total'),
            'date_loan' => $request->get('date_loan'),
            'date_latest' => $request->get('date_loan'),
            'date_start' => $request->get('date_start'),
            'date_end' => $request->get('date_end'),
            'return_money' => $request->get('return_money'),
            'return_money_total' => $request->get('return_money_total'),
            'return_money_last' => $request->get('return_money_last'),
            ]);
            DB::table('Debt_new')
                     ->where('id_borrower',$service)
                     ->update([
                     'name' => $request->get('name'),
                     'other' => $request->get('other'),
                     'remark' => $request->get('remark'),
                     ]);
       return redirect()->route('Fund_debt_all.index')->with('message','item has been updated successfully');
   }

     public function destroy(Service $service)
     {
        //$service->delete();
        return redirect()->route('Fund_debt_all.index')->with('message','item has been deleted successfully');
     }
    public function excel($service){
$s = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            //->whereIn('class', ['guarantor', 'borrow'])
           // ->where('class', 'guarantor')
           ->WhereIn('debt_new.name', ['2','3'])
           ->Where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->select('*','Identity_info.name as n','Identity_info.surename as m')
            ->first();
    $ser = DB::table('debt_record')
            ->where('id_borrower',$service)
            ->first();
               $ser1 = DB::table('debt_record_result')
            ->where('id_borrower',$service)
            ->first();
            $ser3 = DB::table('borrowing_info')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
            ->where('borrowing_info.id',$service)
            ->first();
     // dd($s);
        //return view('Fund_debt_all.excel',compact('s','ser3','ser1','ser','service'));
                $templateProcessor2 = new \PhpOffice\PhpWord\TemplateProcessor(asset('/tem/debt_all.docx'));
                   $templateProcessor2->setValue('contect_id', $ser1->contect_id);
                $templateProcessor2->setValue('prefix', $s->prefix);
                $templateProcessor2->setValue('name', $s->n);
                $templateProcessor2->setValue('sname', $s->m);
                $templateProcessor2->setValue('no', $ser1->no);
                $templateProcessor2->setValue('money', $ser1->money);
                $templateProcessor2->setValue('time_total', $ser1->time_total);
                $templateProcessor2->setValue('date_count', $ser1->date_count);
                $templateProcessor2->setValue('date_start', $ser1->date_start);
                $templateProcessor2->setValue('date_end', $ser1->date_end);
                $templateProcessor2->setValue('return_money', $ser1->return_money);
                $templateProcessor2->setValue('return_money_total', $ser1->return_money_total);
                $templateProcessor2->setValue('return_money_last', $ser1->return_money_last);
                     $templateProcessor2->setValue('other', $ser3->other);
                      $templateProcessor2->setValue('money_payed', $ser3->money_payed);
                       $templateProcessor2->setValue('mounth_remain', $ser3->mounth_remain);
                        $templateProcessor2->setValue('money_remain', $ser3->money_remain);
                         $templateProcessor2->setValue('total', $ser3->total);
                         $templateProcessor2->setValue('date_pay', $ser3->date_pay);
                         $templateProcessor2->setValue('forwhat', $ser3->forwhat);
                         $templateProcessor2->setValue('job_remark', $ser3->job_remark);



                $templateProcessor2->saveAs('ข้อมูลเงินกู้_'.$s->n.'.docx');

    return response()->download('ข้อมูลเงินกู้_'.$s->n.'.docx'); 
    }
}
