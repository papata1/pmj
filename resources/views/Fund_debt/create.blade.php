@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ลงบันทึกการติดตามทวงถามหนี้</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('Fund_debt.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">

                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">



                                        {!! Form::open(array('route'=>'Fund_debt.store','class' => 'form',
                                        'novalidate' => 'novalidate',
                                        'files' => true)) !!}
                                      <br / >
                    <h4 style="font-weight:bold;">บันทึกการติดตามทวงถามหนี้ค้างชำระของกองทุนผู้สูงอายุ</h4>
                    <hr />

                    <label class="col-lg-2 ">เลขที่สัญญา</label>
                    <input type="text" class="col-lg-3" disabled value="{{$ser->contect_id}}"/>
                    <label  class="col-lg-1"></label>
                    <label  class="col-lg-5 text-right"></label>
                    <div class="col-lg-12"> <br />  </div>

                    <label class="col-lg-2 ">ชื่อ-สกุล ผู้กู้</label>
                    <input type="text" class="col-lg-3" disabled  value="{{$ser->name}} {{$ser->surename}}"/>
                    <label  class="col-lg-1"></label>
                    <label  class="col-lg-2 text-right">เบอร์โทรผู้กู้</label>
                    <input type="text" class="col-lg-3" disabled="" value="{{$ser->phone}}"/>
                    <div class="col-lg-12"> <br />  </div>

                    <label class="col-lg-2 ">ชื่อ-สกุล ผู้คํ้า</label>
                    <input type="text" class="col-lg-3"  disabled value="{{$ser1->name}} {{$ser1->surename}}"/>
                    <label  class="col-lg-1"></label>
                    <label  class="col-lg-2 text-right">เบอร์โทรผู้คํ้า</label>
                    <input type="text" class="col-lg-3" disabled="" value="{{$ser1->phone}}"/>
                    <div class="col-lg-12"> <br />  </div>

                    <label class="col-lg-2 ">วันเริ่มสัญญา</label>
                    <input type="date" class="col-lg-3"  disabled value="{{$ser->date_start}}"/>
                    <label  class="col-lg-1"></label>
                    <label  class="col-lg-2 text-right">วันครบกำหนดสัญญา</label>
                    <input type="date" class="col-lg-3" disabled value="{{$ser->date_end}}"/>
                    <label  class="col-lg-1"></label>
                    <div class="col-lg-12"> <br />  </div>

                    <div class="col-lg-12"> <hr  /> </div>
                    <div class="col-lg-12"> <br />  </div>

                    <h4 class="col-md-12" style="font-weight:bold;">วิธีติดตาม</h4>
                    <div class="col-md-12">
                      <div class="col-md-6">
                       <div class="form-group">
                               <select class="form-control" name="method" id="method">
                               @if($ser5)
                                  @if($ser5->method==1)
                                 <option value="2" selected>ทำหนังสือแจ้งครั้งที่ 2</option>
                                  @elseif($ser5->method==2)

                                 <option value="3" selected>ทำหนังสือแจ้งครั้งที่ 3</option>

                                  @elseif($ser5->method==3)

                                 <option value="4" selected>ทำหนังสือแจ้งครั้งที่ 4</option>

                                  @elseif($ser5->method==4)

                                <option value="5" selected>เยี่ยมบ้านผู้กู้</option>
                                  @else

                                 <option value="6" selected>เยี่ยมบ้านผู้คํ้า</option>
                                 @endif
                                 @else
                                 <option value="1">ทำหนังสือแจ้งครั้งที่ 1</option>
                                 @endif
                                 
                  
                              </select>
                       </div>
                     </div>
                    </div>

                                                    <?php
                                                        $ldate = date('Y-m-d');
                                                        $date1=date_create($ldate);
                                                        $date2=date_create($ser->date_latest);
                                                        $diff=date_diff($date1,$date2);
                                                           // dd($diff->format("%R%a"));
                                                        $plus = floor($diff->format("%a")/30) * $ser->return_money;
                                                    ?>

                    <label class="col-lg-2 ">ค้างชำระ</label>
                    <input type="text" class="col-lg-3"  name="remain"  value="<?php  echo floor($diff->format("%a")/30); ?>"/>
                    <label  class="col-lg-1">งวด</label>
                    <label  class="col-lg-2 text-right">เป็นเงิน</label>
                    <input type="text" class="col-lg-3" name="cost"  value="<?php  echo $plus  ; ?>"/>
                    <label  class="col-lg-1">บาท</label>
                    <div class="col-lg-12"> <br />  </div>

                    
                    <label class="col-lg-2 ">วันที่ผู้กู้</label>
                    <input type="text" class="col-lg-3" id="loan" name="date_loan" value=""/>
                    <label  class="col-lg-1"></label>
                    <label  class="col-lg-2 text-right">วันที่ผู้คํ้า</label>
                    <input type="text" class="col-lg-3" id="ga" name="date_garun" value=""/>
                    <label  class="col-lg-1"></label>
                    <div class="col-lg-12"> <br />  </div>
                    
                    

                    <div class="col-lg-12"> <hr  /> </div>
                    <div class="col-lg-12"> <br />  </div>

                    <h4 class="col-md-12" style="font-weight:bold;">ผลติดตาม</h4>
                    <div class="col-lg-12"> <br />  </div>
                 

                     

<div class="change">



                    <label class="col-lg-2 ">ติดต่อชำระ จำนวน</label>
                    <input type="text" class="col-lg-3" name="pay" value="" />
                    <label  class="col-lg-1">บาท</label>
                    <label  class="col-lg-2 text-right">เมื่อวันที่</label>
                    <input type="text" class="col-lg-3" name="date" value=""/>
                    <label  class="col-lg-1"></label>
                    <div class="col-lg-12"> <hr  /> </div>

                    <label class="col-lg-2">จดหมายตีกลับ</label>
                    <div class="col-lg-10">
                    <input type="radio" name="letter"  value="1" class="check"/><span> จ่าหน้าซองไม่ชัดเจน&nbsp;</span> &nbsp;&nbsp;
                    <input type="radio" name="letter"  value="2"class="check"/><span> ไม่มีเลขที่บ้านตามจ่าหน้า&nbsp;</span> &nbsp;&nbsp;
                    <input type="radio" name="letter" value="3" class="check"/><span> ไม่ยอมรับ &nbsp;&nbsp;</span>
                    <input type="radio" name="letter"  value="4" class="check"/><span> ไม่มีผู้รับตามจ่าหน้า &nbsp;&nbsp;</span>

                    </div>
                    <div class="col-lg-12"> <br />  </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                      <input type="radio" name="letter"  value="5" class="check"/><span> ไม่มารับภายในกำหนด  &nbsp;&nbsp;</span>
                      <input type="radio" name="letter"  value="6" class="check"/><span> เลิกกิจการ  &nbsp;&nbsp;</span>
                      <input type="radio" name="letter"  value="7" class="check"/><span> ย้ายไม่ทราบที่อยู่ใหม่   &nbsp;&nbsp;</span>
                      <input type="radio" name="letter"  id="checked"/><span> อื่นๆ <input type="text" name="letter1"  value="" id="checkedinput" disabled/> &nbsp;&nbsp;</span>
                    </div>
                    <div class="col-lg-12"> <hr  /> </div>

                    <label class="col-lg-2 ">ไม่ติดต่อชำระ เพราะ</label>
                    <textarea class="col-lg-9" name="so" value=""></textarea>
                    <label class="col-lg-1"> </label>
                    <div class="col-lg-12"> <hr  /> </div>

                    <label class="col-lg-2">ทำหนังสือรับสภาพหนี้ </label>
                    <div class="col-lg-10">
                    <input type="radio" name="book" value="1" /><span> ผู้กู้ยืม&nbsp;</span> &nbsp;&nbsp;
                    <input type="radio" name="book" value="2"/><span> ผู้ค้ำประกัน &nbsp;</span> &nbsp;&nbsp;
                    <span>เมื่อวันที่</span> <input type="text" name="date_con" value=""/>&nbsp;&nbsp;
                    <span>อายุความสัญญา</span> <input type="text"  name="exp" value=""/>&nbsp;&nbsp;
                    </div>
                    <div class="col-lg-12"> <hr  /> </div>
                    

                    

              <!--   <h4 class="col-md-12" style="font-weight:bold;">ความเห็นเจ้าหน้าที่</h4>
                    <div class="col-lg-12"> <br />  </div>

                    <label class="col-lg-2 ">จากการติดตามทวงหนี้ปรากฏว่า</label>
                    <textarea type="text" class="col-lg-3" name="result" ></textarea>
                    <label  class="col-lg-1 text-right">ดังนั้น</label>
                    <label  class="col-lg-2 text-right">เห็นควรนำเสนอต่อ</label>
                    <textarea type="text" class="col-lg-3" name="than"  ></textarea>
                    <label  class="col-lg-1"></label>
                    <div class="col-lg-12"> <br />  </div>

                    <label class="col-lg-2 ">ลงชื่อเจ้าหน้าที่</label>
                    <input type="text" class="col-lg-3"  name="name" value=""/>
                    <label  class="col-lg-1">บาท</label>
                    <label  class="col-lg-2 text-right">ตำแหน่ง</label>
                    <input type="text" class="col-lg-3" name="position" value=""/>
                    <label  class="col-lg-1"></label>
                    <div class="col-lg-12"> <br />  </div>
                    -->
                    </div>

                    <div class="cha">
                   
                    <div class="col-lg-12"> <hr  /> </div>
                    <label class="col-lg-3 "> <input type="radio" name="book" id='yes' value="3"/>&nbsp;พบผู้กู้ไม่ชำระ เพราะ</label>
                    <textarea class="col-lg-9 yes" name="so" value="" disabled></textarea><div class="col-lg-6">  </div>
                    <div class="col-lg-12"> <br />  </div>


                    <label class="col-lg-3">ทำหนังสือรับสภาพหนี้ วันที่</label>
                    <input type="text" class="col-lg-3 yes" name="date_con" value="" disabled/>
                    <label class="col-lg-2 ">อายุความสัญญา</label>
                    <input type="text" class="col-lg-3 yes" name="exp" value="" disabled/><div class="col-lg-12"> <br />  </div>
                    <div class="col-lg-12"> <hr />  </div>

                     <label class="col-lg-3"> <input type="radio" name="book" id='no' value="4"/>&nbsp; ไม่พบผู้กู้ เพราะ</label>
                   <textarea class="col-lg-9 no" name="so" value="" disabled></textarea><div class="col-lg-6">  </div>
                    <div class="col-lg-12"> <br />  </div>

                    </div>

                    <input type="hidden" value="{{$a}}" name="id_borrower">


                                                           <div class="form-group col-lg-12" >
<button type="button" id="reset" class="btn btn-danger" >ค่าเริ่มต้น</button>
                                        {!! Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                                      </div>


                                    {!! Form::close() !!}
                          </div>
                          <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->
                      <div class="form-group col-lg-12" align="center">

            </div>
            <br /><br /><br />
                  <!-- /.col-lg-12 -->
                </div><!-- /row -->



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

          });
          $('#checked').on('click',function(){
              $("#checkedinput").prop('disabled', false);
          });
          $('#no').on('click',function(){
              $(".yes").val('');
             $(".no").prop('disabled', false);
             $(".yes").prop('disabled', true);

          });
          $('#yes').on('click',function(){
              $(".no").val('');
              $(".yes").prop('disabled', false);
               $(".no").prop('disabled', true);

          });
          $('.cha').hide();
           $('#method').on('change',function(){
        if($('#method option:selected' ).val() =='5'){
           $('.change').hide();
           $('.cha').show();
           $("#loan").prop('disabled', false);
            $("#ga").prop('disabled', true);
        //alert(55);
        }
         if($('#method option:selected' ).val() =='6'){
           $('.change').hide();
           $('.cha').show();
           $("#ga").prop('disabled', false);
           $("#loan").prop('disabled', true);
        //alert(55);
        }
         if($('#method option:selected' ).val() < '5'){
           $('.change').show();
           $('.cha').hide();
            $("#ga").prop('disabled', false);
           $("#loan").prop('disabled', false);
        //alert(55);
        }

                });
});
</script>
@stop
