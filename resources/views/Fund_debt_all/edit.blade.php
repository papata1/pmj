@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ข้อมูลลูกหนี้</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('Fund_debt_all.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                              <div class="panel-heading">
                                   <div class="col-md-3">

                                     </div>
                                                                              <div class="col-md-7">  </div>
                     {{ link_to_route('Fund_borrowing.edit','ข้อมูลบุคคล',[$service],['class'=>'btn btn-default']) }}
                                   </div>

                                   <!-- /.panel-heading -->

                                       <div class="panel-body">


                                        {!! Form::model($service,array('route'=>['Fund_debt_all.update',$service],'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}
 @if($errors->any())
                                    <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    @endif
                                          <br / >
                              <h4 style="font-weight:bold;">ดำเนินการ</h4>
                                      <hr />
<input type="hidden" class=""name="check" value="{{$ser4->money}}"/>
                                      <label class="col-lg-2 ">เลขที่สัญญา</label>
                                      <input type="text" class="col-lg-3" name="contect_id" value="{{$ser1->contect_id}}"/>
                                      <label  class="col-lg-1" style="color:red">***</label>
                                      <label  class="col-lg-2 text-right">รหัสผู้กู้</label>
                                      <input type="text" class="col-lg-3" placeholder=""  name="no" value="{{$ser1->no}}"/>
                                      <label  class="col-lg-1" style="color:red">***</label>
                                      <div class="col-lg-12"> <br />  </div>

                                      <label class="col-lg-2 ">วันจ่ายให้กู้</label>
                                      <input type="date" class="col-lg-3"  name="date_count" value="{{$ser1->date_count}}"/>
                                      <label  class="col-lg-1"></label>
                                      <label  class="col-lg-2 text-right">วันเริ่มนับจ่ายงวด</label>
                                      <input type="date" class="col-lg-3" placeholder=""  name="date_loan" value="{{$ser1->date_loan}}"/>
                                      <label  class="col-lg-1" style="color:red">***</label>
                                      <div class="col-lg-12"> <br />  </div>

                                      <label  class="col-lg-2">กำหนดเวลาผ่อนชำระ</label>
                                      <input type="text" class="col-lg-3"  name="time_total" value="{{$ser1->time_total}}"/>
                                      <label  class="col-lg-1">เดือน</label>
                                      <label  class="col-lg-2 text-right"></label>
                                      <div class="col-lg-12"> <br />  </div>

                                      <label class="col-lg-2 ">วันเริ่มสัญญา</label>
                                      <input type="date" class="col-lg-3" name="date_start" value="{{$ser1->date_start}}"/>
                                      <label  class="col-lg-1"></label>
                                      <label  class="col-lg-2 text-right">วันครบกำหนดสัญญา</label>
                                      <input type="date" class="col-lg-3" name="date_end" value="{{$ser1->date_end}}"/>
                                      <label  class="col-lg-1"></label>
                                      <div class="col-lg-12"> <br />  </div>


                                      <label class="col-lg-2 ">ชำระงวดละ</label>
                                      <input type="text" class="col-lg-3" name="return_money" value="{{$ser1->return_money}}" />
                                      <label  class="col-lg-1">บาท</label>
                                      <label  class="col-lg-2 text-right">ทั้งสิ้น</label>
                                      <input type="text" class="col-lg-3"name="return_money_total" value="{{$ser1->return_money_total}}"/>
                                      <label  class="col-lg-1">งวด</label>
                                      <div class="col-lg-12"> <br />  </div>

                                      <label class="col-lg-2 ">งวดสุดท้าย</label>
                                      <input type="text" class="col-lg-3" name="return_money_last" value="{{$ser1->return_money_last}}"/>
                                      <label  class="col-lg-7 ">บาท</label>
                                      <div class="col-lg-12"> <br />  </div>


                              <div class="col-lg-12">
                              <h4 style="font-weight:bold;">ข้อมูลเงินกู้</h4>
                              <hr /></div>

                              <label class="col-lg-2 ">วงเงินที่กู้ยืม</label>
                              <input type="text" class="col-lg-3"  disabled name="debt" value="{{$ser3->money}}"/>
                              <label  class="col-lg-1">บาท</label>
                              <label  class="col-lg-2 text-right">ยอดชำระแล้ว</label>
                              <input type="text" class="col-lg-3" disabled name="payed" value="{{$ser3->money_payed}}"/>
                              <label  class="col-lg-1">บาท</label>
                              <div class="col-lg-12"> <br />  </div>



                              <label class="col-lg-2 ">งวดค้างชำระ จำนวน</label>
                              <input type="text" class="col-lg-3"  disabled name="no_payed" value="{{$ser3->mounth_remain}}"/>
                              <label  class="col-lg-1">งวด</label>
                              <label  class="col-lg-2 text-right">ยอดคงเหลือ</label>
                              <input type="text" class="col-lg-3" disabled name="remain_round" value="{{$ser3->money_remain}}"/>
                              <label  class="col-lg-1">บาท</label>
                              <div class="col-lg-12"> <br />  </div>


                              <label class="col-lg-2 ">ชำระล่าสุด</label>
                              <input type="text" class="col-lg-3"  disabled name="money_remain" @if($ser5)value="{{$ser5->total}}" @endif/>
                              <label  class="col-lg-1"></label>
                              <label  class="col-lg-2 text-right">วันที่ชำระครั้งล่าสุด</label>
                              <input type="text" class="col-lg-3" disabled name="date_loan" @if($ser5)value="{{$ser5->date_pay}}" @endif/>
                              <label  class="col-lg-1"></label>
                              <div class="col-lg-12"> <br />  </div>

                              <label class="col-lg-2 ">อาชีพประสงค์กู้</label>
                              <input type="text" class="col-lg-3"  disabled name="date_ga" value="{{$ser3->forwhat}}"/>
                              <label  class="col-lg-1"></label>
                              <label  class="col-lg-2 text-right">รายละเอียดอาชีพ</label>
                              <input type="text" class="col-lg-3" disabled name="return_money_last" value="{{$ser3->job_remark}}"/>
                              <label  class="col-lg-1"></label>
                              <div class="col-lg-12"> <br />  </div>

                                <div class="col-lg-12">
                              <h4 style="font-weight:bold;" >คำร้องขอใหม่</h4>
                              <hr />
                              <h4 class="col-lg-12">ความคิดเห็นส่วนกลาง</h4>
                              </div>

                                                            <input type="radio" name="name"  class="col-lg-1"  class="check" value="0"  @if($ser->name=='0')  checked="checked"@endif><span class="col-lg-11">ยังไม่ทำการอนุมัติ</span>

                                                             <input type="radio" name="name"class="col-lg-1" id="checked" value="2"  @if($ser->name=='2')  checked="checked"@endif><span class="col-lg-11">เห็นชอบตามวงเงินกู้ {{$ser4->money}} บาท</span>


                                                                  <input type="radio" class="col-lg-1" name="name" id="check1" value="3"  @if($ser->name=='3')checked="checked"@endif><span class="col-lg-11">เห็นชอบ ปรับยอดเงินกู้คงเหลือ {{$ser->other}} บาท</span>

                                                                  <input type="radio" name="name" class="col-lg-1" class=" check" value="4"  @if($ser->name=='4')  checked="checked"@endif><span class="col-lg-11">ไม่เห็นชอบ</span>
                                                                    <div class="col-lg-12"> <br />  </div>
                                                        <label class="col-lg-3">ความคิดเห็นเพิ่มเติม</label>
                                                        <textarea class="form-control" rows="3" name="remark" value="">{{$ser->remark}}</textarea>


<div class="col-lg-12"> <br />  </div>
                                                           <div class="form-group col-lg-12" >
                                       <button type="button" id="reset" class="btn btn-danger" >ค่าเริ่มต้น</button>
                                        {!! Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                                      </div>


                                    {!! Form::close() !!}

                                   </div>
                                   <!-- /.panel-body -->

                               </div>
                               <!-- /.panel -->
                           </div>
                           <!-- /.col-lg-12 -->
                       </div>
                       <!-- /.row -->

                   </div>
                   <!-- /#page-wrapper -->

               </div>
               <!-- /#wrapper -->
<script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {

        //alert(0);
    });

</script>
@stop
