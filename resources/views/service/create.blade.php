@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">จัดการผู้เข้ารับบริการ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('service.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-primary">
                                   <div class="panel-heading">
                                       ลงทะเบียนผู้ขอเข้ารับบริการ
                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">

                                        {!! Form::open(array('route'=>'service.store','class' => 'form',
                                        'novalidate' => 'novalidate',
                                        'files' => true)) !!}
                                           <div class="form-group">
                                             <label>ปีงบประมาณ</label>
                                             <select id="year" name="year">
                                               <option value="2560">2560</option>
                                               <option value="2559">2559</option>
                                               <option value="2558">2558</option>
                                             </select>
                                           </div>

                                           <div >
                                               <label>วันที่</label>
                                               <input type="date" id="date" name="date" />
                                           </div>
                                           <br />
                                           <div class="col-lg-12"> <br />  </div>

                                      <h4 style="font-weight:bold;">ข้อมูลเรื่องที่ขอรับบริการ</h4>
                                      <hr />
                                      <div class="col-lg-12"> <br />  </div>

                                      <div class="form-group col-lg-6">
                                            <label>ประเภท/ลักษณะงานที่มาขอรับบริการ</label>
                                    {!! Form::select('cat', ['0'=>''] + $dd, null, ['class' => 'form-control datar']) !!}
                            		   	 </div>

                                     <div class="form-group col-lg-6">
                                           <label>สถานะการดำเนินการ</label>
                                           <input class="form-control" name="process" id="process" type="text" placeholder="">
                                    </div>
                                       <div class="col-lg-12">
                                       <h4 style="font-weight:bold;">ข้อมูลผู้ขอเข้ารับบริการ</h4>
                                       <hr />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div class="col-lg-6">
                                           <label>เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text" id="id_p" name="id_p" />
                                       </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp" name="id_exp"/>&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp1" name="id_exp" value="ตลอดชีวิต"  />
                                           <span>ตลอดชีวิต</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นาย" /><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นาง" /><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นางสาว" /><span> นางสาว&nbsp;&nbsp;</span>
                                       <input type="radio" id="prefix1" name="prefix"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix11" name="prefix" disabled />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ชื่อ</label>
                                       <input type="text" class="col-lg-3" id="name" name="name"  />
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="surename" name="surename" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ว/ด/ป เกิด</label>
                                       <input type="date" class="col-lg-3" id="dob" name="dob" />
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3" id="address" name="address" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="village" name="village"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3"  id="room_number" name="room_number" />
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="room_floor" name="room_floor" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3" id="bloc" name="group_home" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="allet" name="alley" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3" id="road" name="road" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="local" name="local" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3" id="district" name="district" />
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="province" name="province" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3" id="zip_code" name="zip_code" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="phone" name="phone" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="check_live" name="check_live" value="ที่เดี่ยวกับบัตรประชาชน" /><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" name="check_live" value="ที่เดียวกับที่ปัจจุบัน" /><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" name="check_live" value="อื่นๆ" /><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>

                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3" id="house_number1" name="address1" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="village1" name="village1" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3" id="room_number1" name="room_number1" />
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="room_floor1" name="room_floor1" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3" id="bloc1" name="group_home1" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="alley1" name="alley1" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3" id="road1" name="road1" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="local1" name="local1" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3" id="district1" name="district1" />
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="province1" name="province1" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3" id="zip_code1" name="zip_code1" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="phone1" name="phone1" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">ประเภทที่อยู่</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="live_cate" id="live_cate" name="live_cate" value="บ้าน" /><span> บ้าน&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate" id="live_cate" name="live_cate" value="ทาวน์เฮาส์" /><span> ทาวน์เฮาส์&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate" id="live_cate" name="live_cate" value="คอนโดมิเนียม" /><span> คอนโดมิเนียม&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate" id="live_cate" name="live_cate" value="อพาร์ทเม้นท์หอพักแฟลต" /><span> อพาร์ทเม้นท์/หอพัก/แฟลต&nbsp;&nbsp;</span>
                                       <input type="radio"  id="live_cate1" name="live_cate"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_cate11" name="live_cate" disabled/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">สถานะการอยู่อาศัย</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="c" id="live_status1" name="live_status" value="" /><span> เช่า&nbsp;</span><input type="text" id="live_status12" name="live_status" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" class="c" id="live_status11" name="live_status" value="" /><span> ผ่อน&nbsp;</span><input type="text" id="live_status13" name="live_status" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" class='live_status' id="live_status" name="live_status" value="เป็นของตนเองปลอดภาระ"/><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>
                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="เป็นของบุคคลอื่น"/><span> เป็นของบุคคลอื่น&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="อาศัยอยู่กับบุตรหลานญาติ"/><span> อาศัยอยู่กับบุตรหลาน/ญาติ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="บ้านพักสวัสดิการ"/><span> บ้านพักสวัสดิการ&nbsp;&nbsp;</span>
                                         <input type="radio" class="c" id="live_status111" name="live_status" value=""/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status14" name="live_status" disabled/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">สถานภาพ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="m_status" name="m_status"  value="โสด"/> <span> โสด&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status"  value="สมรส"/> <span> สมรส&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status"  value="อยู่ด้วยกันโดยไม่จดทะเบียนสมรส"/><span> อยู่ด้วยกันโดยไม่จดทะเบียนสมรส&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status"  value="หย่าร้าง"/><span> หย่าร้าง&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status"  value="หม้าย"/><span> หม้าย&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div class="col-lg-6">
                                           <label>เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text" id="id_p1" name="id_p1" />
                                       </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp3" name="id_exp1" />&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp2" name="id_exp1" value="ตลอดชีวิต" />
                                           <span>ตลอดชีวิต</span>

                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="prefix1" name="prefix1" value="นาย" class='check'/><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" id="prefix1" name="prefix1" value="นาง" class='check'/><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" id="prefix1" name="prefix1" value="นางสาว" class='check'/><span> นางสาว&nbsp;&nbsp;</span>
                                       <input type="radio" id="prefix12" name="prefix1"  class='checked'/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix123" name="prefix1" class='checkedinput' disabled />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">สามีหรือภรรยาชื่อ</label>
                                       <input type="text" class="col-lg-3" id="name1" name="name1" />
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="surename1" name="surename1" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อาชีพปัจจุบัน</label>
                                       <input type="text" class="col-lg-3" id="job" name="job" />
                                       <label  class="col-lg-2 text-right">รายได้/เดือน</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="income" name="income"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>



                                 {!! Form::hidden('c_live_status', null,['id' => 'c_live_status']) !!}
                                 {!! Form::hidden('category', null,['id' => 'category']) !!}
                                 {!! Form::hidden('class', null,['id' => 'class']) !!}



                                      <div class="form-group col-lg-12" >
                                        {{ link_to_route('service.create','ค่าเริ่มต้น',null,['class'=>'btn btn-danger']) }}                                       
                                        {!! Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
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

                //              alert(5);

              var a;  

          $('.check').on('click',function(){
              $(".checkedinput").val('');
              $(".checkedinput").prop('disabled', true);
          });
          $('.checked').on('click',function(){
              $(".checkedinput").prop('disabled', false);
          });

           $('#live_status1').on('click',function(){
              $('.c').val(1);
              $("#live_status12").prop('disabled', false);
              $("#live_status14").prop('disabled', true);
              $("#live_status14").val('');
              $("#live_status13").prop('disabled', true);
              $("#live_status13").val('');
          });
         $('#id_exp1').on('click',function(){
              if(a==1){
              $("#id_exp").prop('disabled', false);
              a = 0 ;
              }else{
              $("#id_exp").val('');
              $("#id_exp").prop('disabled', true);
              a = 1;
              }
          });
          $('#id_exp2').on('click',function(){
              if(a==1){
              $("#id_exp3").prop('disabled', false);
              a = 0 ;
              }else{
              $("#id_exp3").val('');
              $("#id_exp3").prop('disabled', true);
              a = 1;
              }
          });
          $('#live_status11').on('click',function(){
               $('.c').val(2);
              $("#live_status13").prop('disabled', false);
              $("#live_status12").prop('disabled', true);
              $("#live_status14").prop('disabled', true);
              $("#live_status14").val('');
              $("#live_status12").val('');
          });
           $('#live_status111').on('click',function(){
               $('.c').val(3);
              $("#live_status14").prop('disabled', false);
              $("#live_status13").prop('disabled', true);
              $("#live_status13").val('');
              $("#live_status12").prop('disabled', true);
              $("#live_status12").val('');
          });
          $('.live_status').on('click',function(){
              $('.c').val('');
              $("#live_status14").prop('disabled', true);
              $("#live_status14").val('');
              $("#live_status13").prop('disabled', true);
              $("#live_status13").val('');
              $("#live_status12").prop('disabled', true);
              $("#live_status12").val('');
          });

           $('#live_cate1').on('click',function(){
              $("#live_cate11").prop('disabled', false);
          });
           $('.live_cate').on('click',function(){
              $("#live_cate11").val('');
              $("#live_cate11").prop('disabled', true);
          });
          
          $('#prefix1').on('click',function(){
              $("#prefix11").prop('disabled', false);
          });
          $('.prefix').on('click',function(){
              $("#prefix11").val('');
              $("#prefix11").prop('disabled', true);
          });

         $('#add1').click(function () {
              $('#c_live_status').val($('.c').val());
              $('#category').val(1);
               $('#category').val('id');
        });

    });

</script>
@stop
