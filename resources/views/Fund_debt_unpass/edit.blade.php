@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">การอนุมัติเป็นลูกหนี้</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('Fund_debt_unpass.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                                           <div class="col-md-3">

                                     </div>
                                                                              <div class="col-md-7">  </div>
                     {{ link_to_route('Fund_borrowing.show','ข้อมูลบุคคล',[$service],['class'=>'btn btn-default']) }}
                                   </div>

                                   <!-- /.panel-heading -->

                                       <div class="panel-body">


                            {!! Form::model($service,array('route'=>['Fund_debt_unpass.update',$service],'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}


                              <br / >
                              <h4 style="font-weight:bold;">คำร้องขอใหม่</h4>
                              <hr />
                              <h4>ความคิดเห็นส่วนกลาง</h4>
<input type="hidden" class=""name="check" value="{{$ser3->money}}"/>
                                                         <div class="form-group">
                                                          <div class="radio">
                                                              <label>
                                                                  <input type="radio" name="name"    class="check" value="0"  @if($ser->name=='0')  checked="checked"@endif>ยังไม่ทำการอนุมัติ
                                                              </label>
                                                          </div>
                                                          <div class="radio">
                                                              <label>
                                                              @if($ser->name=='2')
                                                             <input type="radio" name="name" id="checked" value="2"   checked="checked">เห็นชอบตามวงเงินกู้  {{$ser3->money}}  บาท
                                                              @else
                                                             <input type="radio" name="name" id="checked" value="2" >เห็นชอบตามวงเงินกู้  {{$ser3->money}} บาท
                                                              @endif
                                                              </label>
                                                          </div>
                                                          <div class="radio">
                                                              <label>
                                                              @if($ser->name=='3')
                                                                  <input type="radio" name="name" id="check1" value="3"  checked="checked">เห็นชอบ ปรับยอดเงินกู้คงเหลือ
                                                            @else
                                                          <input type="radio" name="name" id="check1" value="3" >เห็นชอบ ปรับยอดเงินกู้คงเหลือ <input type="text" class=""name="other" disabled id="check2"/> บาท
                                                            @endif
                                                              </label>
                                                          </div>
                                                          <div class="radio">
                                                              <label>
                                                                  <input type="radio" name="name" class="check" value="4"  @if($ser->name=='4')  checked="checked"@endif>ไม่เห็นชอบ
                                                              </label>
                                                          </div>
                                       </div>

                                       <div class="form-group">
                                                        <label>ความคิดเห็นเพิ่มเติม</label>
                                                        <textarea class="form-control" rows="3" name="remark" value="">{{$ser->remark}}</textarea>
                                      </div>


<!--
                                      <br / >
                                      <h4 style="font-weight:bold;">ดำเนินการ</h4>
                                      <hr />

                                      <label class="col-lg-2 ">เลขที่สัญญา</label>
                                      <input type="text" class="col-lg-3" name="contect_id" value="{{$ser1->contect_id}}"/>
                                      <label  class="col-lg-1"></label>
                                      <label  class="col-lg-2 text-right">รหัสผู้กู้</label>
                                      <input type="text" class="col-lg-3" placeholder=""  name="no" value="{{$ser1->no}}"/>
                                      <div class="col-lg-12"> <br />  </div>

                                      <label class="col-lg-2 "> จ่ายให้กู้</label>
                                      <input type="date" class="col-lg-3"  name="date_loan" value="{{$ser1->date_loan}}"/>
                                      <label class="col-lg-9 ">  </label>
                                      <div class="col-lg-12"> <br />  </div>

                                      <label  class="col-lg-2 text-right">กำหนดเวลาผ่อนชำระ</label>
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
-->


                                                           <div class="form-group col-lg-12" >
                                        <button type="button" id="reset" class="btn btn-danger" >ค่าเริ่มต้น</button>
                                        {!! Form::button('ลงทะเบียนผู้กู้ยืม',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                                      </div>


                                    {!! Form::close() !!}

                                   </div>
                                   <!-- /.panel-body -->
                                    @if($errors->any())
                                    <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    @endif
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

        $('.check').on('click',function(){
              $("#checkedinput").val('');
              $("#checkedinput").prop('disabled', true);
              $("#check2").val('');
              $("#check2").prop('disabled', true);

          });
          $('#checked').on('click',function(){
              $("#checkedinput").prop('disabled', false);
                            $("#check2").val('');
              $("#check2").prop('disabled', true);

          });
          $('#check1').on('click',function(){
              $("#check2").prop('disabled', false);
                            $("#checkedinput").val('');
              $("#checkedinput").prop('disabled', true);

          });

    });

</script>
@stop
