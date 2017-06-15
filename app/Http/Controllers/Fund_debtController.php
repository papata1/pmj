<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Borrowing_info;
use App\Address;
use App\Identity_info;
use App\Identity_status;
use App\category;
use App\Debt_new;
use App\Debt_record_result;
use App\Debt_record;
use App\Follow;
use App\Year;
use App\Follow_result;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;


class Fund_debtController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
      $this->middleware('debt')->except('index');

  }
    public function index(){
          $ser = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('year','year.id', '=', 'Identity_status.year')
            //->whereIn('class', ['guarantor', 'borrow'])
           // ->where('class', 'guarantor')
            ->Where('class', 'borrow')
            
            ->Where('money_remain','>', 0)
            ->where('Identity_info.category', '1')
            //->Where('date_latest','>=', $nextmounth  )
            ->select('*','borrowing_info.id as id_r','year.year as year')
            ->get();
         //   dd($ser);
      return view('Fund_debt.index',compact('ser'));
    }
    public function create(){
    return view('Fund_debt.create');
    }
    public function follow($a){
      
       $ser5 = DB::table('Follow')
            ->where('id_borrower',$a)
            ->first();
           // dd($ser5);
 $ser = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('address','address.id_rela', '=', 'Identity_status.id')
            ->Where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->where('borrowing_info.id',$a)
            ->select('*','borrowing_info.id as id_r')
            ->first();
             $ser1 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('address','address.id_rela', '=', 'Identity_status.id')
            ->Where('class', 'guarantor')
            ->where('borrowing_info.id',$a)
            ->where('Identity_info.category', '1')
            ->select('Identity_info.surename','Identity_info.name','address.phone')
            ->first();
            //dd($ser);
    return view('Fund_debt.create',compact('a','ser','ser1','ser5'));
    }
    public function store(ServiceRequest $request)
     {
       $f = Follow::create($request->all());
       $f1 = Follow_result::create($request->all());
       $id = $request->get('id_borrower');
      // dd($id);
       DB::table('Follow')
            ->where('id',$f->id)
            ->update([
            'id_borrower' => $request->get('id_borrower'),
            ]);
            DB::table('Follow_result')
            ->where('id',$f1->id)
            ->update([
           'id_fo' => $f->id,
            ]);
        return redirect()->route('Fund_debt.edit',[$id]);
     }

     public function show($a)
     {
             $ser = DB::table('Follow')
            ->where('id',$a)
            ->first();
            //dd($ser);
             $ser1 = DB::table('Follow_result')
            ->where('id_fo',$ser->id)
            ->first();
            $ser2 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('address','address.id_rela', '=', 'Identity_status.id')
            ->Where('class', 'borrow')
            ->where('borrowing_info.id',$ser->id_borrower)
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_r')
            ->first();
             $ser3 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('address','address.id_rela', '=', 'Identity_status.id')
            ->Where('class', 'guarantor')
            ->where('borrowing_info.id',$ser->id_borrower)
            ->where('Identity_info.category', '1')
            ->select('Identity_info.surename','Identity_info.name','address.phone')
            ->first();

            //dd($ser1);
               return view('Fund_debt.show',compact('a','ser1','ser','a','ser2','ser3'));
     }
       public function followedit($a)
     {
        $ser = DB::table('Follow')
            ->where('id',$a)
            ->first();
            //dd($ser);
             $ser1 = DB::table('Follow_result')
            ->where('id_fo',$ser->id)
            ->first();
            $ser2 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('address','address.id_rela', '=', 'Identity_status.id')
            ->Where('class', 'borrow')
            ->where('borrowing_info.id',$ser->id_borrower)
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_r')
            ->first();
             $ser3 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('address','address.id_rela', '=', 'Identity_status.id')
            ->Where('class', 'guarantor')
            ->where('borrowing_info.id',$ser->id_borrower)
            ->where('Identity_info.category', '1')
            ->select('Identity_info.surename','Identity_info.name','address.phone')
            ->first();
           // dd($ser);

               return view('Fund_debt.edit_follow',compact('a','ser1','ser','a','ser2','ser3'));
     }
       public function update_follow()
   {
        $id = $_POST['id'];
      $id1 = $_POST['id1'];
        //dd($_POST['id']);
        $ser = DB::table('Follow')
        ->where('id',$id)
        ->first();
             DB::table('Follow')
            ->where('id',$id)
            ->update([
            'method' =>$_POST['method'],
            'remain' => $_POST['remain'],
            'cost' => $_POST['cost'],
            'date_loan' => $_POST['date_loan'],
            'date_garun' => $_POST['date_garun'],
            ]);
           /* DB::table('Follow_result')
            ->where('id_fo',$ser->id)
            ->update([
            'pay' =>$_POST['pay'],
            'date' => $_POST['date'],
            'letter' => $_POST['letter'],
            'book' => $_POST['book'],
            'date_con' =>$_POST['date_con'],
            'exp' => $_POST['exp'],

            ]);*/

      //dd($id);
      return redirect()->route('Fund_debt.edit',[$ser->id_borrower]);
       //return redirect()->route('Fund_debt.index');
   }
     public function edit($service)
    {

               $ser1 = DB::table('debt_record_result')
            ->where('id_borrower',$service)
            ->first();
            $ser3 = DB::table('borrowing_info')
             ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('debt_record_result','debt_record_result.id_borrower', '=', 'borrowing_info.id')
             ->leftJoin('payment','payment.id_borrower', '=', 'borrowing_info.id')
              ->select('*','borrowing_info.money as money')
            ->where('borrowing_info.id',$service)
            ->first();
            $ser5 = DB::table('borrowing_info')
             ->leftJoin('Payment','Payment.id_borrower', '=', 'borrowing_info.id')
            ->where('id_borrower',$service)
            ->orderBy('Payment.id', 'Desc')
            ->first();
             $ser2 = DB::table('Follow')
             ->leftJoin('Follow_result','Follow_result.id_fo', '=', 'Follow.id')
             ->where('Follow.id_borrower',$service)
            ->get();
          //dd($ser5);
        return view('Fund_debt.edit',compact('ser3','ser2','ser1','ser','service','ser5'));
    }

    public function update(ServiceRequest $request,$service)
   {
         DB::table('debt_record_result')
            ->where('id',$service)
            ->update([
            'contect_id' =>$request->get('contect_id'),
            'no' => $request->get('no'),
            'money' => $request->get('money'),
            'money_remain' => $request->get('money'),
            'mounth_remain' => $request->get('return_money_total'),
            'time_total' => $request->get('time_total'),
            'date_start' => $request->get('date_start'),
            'date_end' =>$request->get('date_end'),
            'return_money' => $request->get('return_money'),
            'return_money_total' => $request->get('return_money_total'),
            'return_money_last' => $request->get('return_money_last'),
            ]);

       return redirect()->route('Fund_debt.index')->with('message','item has been updated successfully');
   }



     public function destroy($service)
     {
          $a = DB::table('Follow')
         ->where('id', $service)
         ->first();
         //dd();
          DB::table('Follow')
         ->where('id', $service)
            ->delete();
            DB::table('Follow_result')
         ->where('id', $service)
            ->delete();
       // $service->delete();
        //dd($service);
        return redirect()->route('Fund_debt.edit',[$a->id_borrower]);
     }
     public function excel($service, $b)
     {
      $s = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            //->whereIn('class', ['guarantor', 'borrow'])
           // ->where('class', 'guarantor')
           ->Where('class', 'borrow')
            ->where('Identity_info.category', '1')
            ->select('*','Identity_info.name as n','Identity_info.surename as m','borrowing_info.money as money')
            ->first();
            $s1 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('debt_new','debt_new.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
           ->Where('class', 'guarantor')
            ->where('Identity_info.category', '1')
            ->select('*')
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
     if($b==1){
        //return view('Fund_debt.excel',compact('s','s1','ser3','ser1','ser','service'));
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



                $templateProcessor2->saveAs('ข้อมูลเงินกู้จ่ายล่าช้า_'.$s->n.'.docx');

    return response()->download('ข้อมูลเงินกู้จ่ายล่าช้า_'.$s->n.'.docx');
       
     }
     if($b==2){
       // return view('Fund_debt.excel2',compact('s','s1','ser3','ser1','ser','service'));
        $templateProcessor1 = new \PhpOffice\PhpWord\TemplateProcessor(asset('/tem/borrow.docx'));
    $templateProcessor1->setValue('prefix', $s->prefix);
    $templateProcessor1->setValue('name', $s->name);
    $templateProcessor1->setValue('sname', $s->surename);
    $templateProcessor1->setValue('prefix1', $s1->prefix);
    $templateProcessor1->setValue('name1', $s1->name);
    $templateProcessor1->setValue('sname1', $s1->surename);
    $templateProcessor1->setValue('contect_id', $s->contect_id);
    $templateProcessor1->setValue('money', $s->money);
    $templateProcessor1->setValue('remain', $s->money_remain);
    $templateProcessor1->setValue('return', $s->return_money);

    $templateProcessor1->saveAs('แจ้งผิดนัดชำระหนี้ผู้กู้_'.$s->n.'.docx');

    return response()->download('แจ้งผิดนัดชำระหนี้ผู้กู้_'.$s->n.'.docx'); 
       
     }
     if($b==3){
       $templateProcessor1 = new \PhpOffice\PhpWord\TemplateProcessor(asset('/tem/garute.docx'));
    $templateProcessor1->setValue('prefix', $s->prefix);
    $templateProcessor1->setValue('name', $s->name);
    $templateProcessor1->setValue('sname', $s->surename);
    $templateProcessor1->setValue('prefix1', $s1->prefix);
    $templateProcessor1->setValue('name1', $s1->name);
    $templateProcessor1->setValue('sname1', $s1->surename);
    $templateProcessor1->setValue('contect_id', $s->contect_id);
    $templateProcessor1->setValue('money', $s->money);
    $templateProcessor1->setValue('remain', $s->money_remain);
    $templateProcessor1->setValue('return', $s->return_money);

    $templateProcessor1->saveAs('แจ้งผิดนัดชำระหนี้ผู้ค้ำประกัน_'.$s1->name.'.docx');

    return response()->download('แจ้งผิดนัดชำระหนี้ผู้ค้ำประกัน_'.$s1->name.'.docx'); 
        //return view('Fund_debt.excel3',compact('s','s1','ser3','ser1','ser','service'));
     }

     }
     public function excel1($a)
     {
      // dd($b);
            $ser = DB::table('Follow')
             ->leftJoin('Follow_result','Follow_result.id_fo', '=', 'Follow.id')
            ->where('id_borrower',$a)
            ->get();
//dd($ser);
            $ser2 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('address','address.id_rela', '=', 'Identity_status.id')
            ->Where('class', 'borrow')
            ->where('borrowing_info.id',$a)
            ->where('Identity_info.category', '1')
            ->select('*','borrowing_info.id as id_r')
            ->first();
             $ser3 = DB::table('borrowing_info')
            ->leftJoin('Identity_status','Identity_status.borrower_id', '=', 'borrowing_info.id')
            ->leftJoin('Identity_info','Identity_info.id_rela', '=', 'Identity_status.id')
            ->leftJoin('Debt_record_result','Debt_record_result.id_borrower', '=', 'borrowing_info.id')
            ->leftJoin('address','address.id_rela', '=', 'Identity_status.id')
            ->Where('class', 'guarantor')
            ->where('borrowing_info.id',$a)
            ->where('Identity_info.category', '1')
            ->select('*')
            ->first();

            //dd($ser);
              // return view('Fund_debt.excel1',compact('a','ser1','ser','a','ser2','ser3'));
              $templateProcessor2 = new \PhpOffice\PhpWord\TemplateProcessor(asset('/tem/follow.docx'));
                  $templateProcessor2->setValue('contect_id', $ser2->contect_id);
    $templateProcessor2->setValue('prefix', $ser2->prefix);
    $templateProcessor2->setValue('name', $ser2->name);
    $templateProcessor2->setValue('sname', $ser2->surename);
    $templateProcessor2->setValue('prefix1', $ser3->prefix);
    $templateProcessor2->setValue('name1', $ser3->name);
    $templateProcessor2->setValue('sname1', $ser3->surename);
    $templateProcessor2->setValue('tel', $ser2->phone);
    $templateProcessor2->setValue('tel1', $ser3->phone);
    $templateProcessor2->setValue('f_day', $ser2->date_start);
    $templateProcessor2->setValue('e_day', $ser2->date_end);
$i=1;
//dd($ser[$a]->pay);
      //foreach($ser as $row){
        for($a=0;$a<8;$a++){
        if(array_key_exists($a,$ser)){
        $templateProcessor2->setValue('pay'.$i, $ser[$a]->pay);
      
        $templateProcessor2->setValue('date'.$i, $ser[$a]->date); 
     

    
        $templateProcessor2->setValue('letter'.$i, $ser[$a]->letter1);
         $templateProcessor2->setValue('so'.$i, $ser[$a]->so);
         $templateProcessor2->setValue('date_con'.$i, $ser[$a]->date_con);
         $templateProcessor2->setValue('exp'.$i, $ser[$a]->exp);

          $templateProcessor2->setValue('than'.$i, $ser[$a]->than);


          $templateProcessor2->setValue('remain'.$i, $ser[$a]->remain);



          $templateProcessor2->setValue('cost'.$i, $ser[$a]->cost);
    
 
          $templateProcessor2->setValue('date_loan'.$i, $ser[$a]->date_loan);
 
    
          $templateProcessor2->setValue('date_garun'.$i, $ser[$a]->date_garun);
           }else{
            $templateProcessor2->setValue('date_garun'.$i," ");
             $templateProcessor2->setValue('date_loan'.$i," ");
            $templateProcessor2->setValue('cost'.$i," ");
            $templateProcessor2->setValue('remain'.$i," ");
            $templateProcessor2->setValue('than'.$i," ");
            $templateProcessor2->setValue('exp'.$i," ");
            $templateProcessor2->setValue('date_con'.$i," ");
            $templateProcessor2->setValue('so'.$i," ");
            $templateProcessor2->setValue('letter'.$i," ");
            $templateProcessor2->setValue('date'.$i," ");
            $templateProcessor2->setValue('pay'.$i," ");



        }
          $i++;




      }

    $templateProcessor2->saveAs('บันทึกทวงถามหนี้ค้างชำระ_'.$ser2->name.'.docx');

    return response()->download('บันทึกทวงถามหนี้ค้างชำระ_'.$ser2->name.'.docx'); 

     }
}
