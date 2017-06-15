@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ลงทะเบียนผู้รับบริการ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('service_fix.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                       
                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">

                                        {!! Form::open(array('route'=>'service_fix.store','class' => 'form',
                                        'novalidate' => 'novalidate',
                                        'files' => true)) !!}
                                           <div class="form-group">
                                             <label class="col-lg-2">ปีงบประมาณ</label>
                                             <div class="col-lg-4">
                                              {!! Form::select('year',['' => ''] + $year, null, ['class' => 'form-control']) !!}
                                            </div>
                                           </div>

                                           <div >
                                               <label class="col-lg-1">วันที่</label>
                                               <input type="date" id="date" name="date" class="col-lg-5" />
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


                                       <label class="col-lg-2">เลขบัตรประชาชนประจำตัว</label>
                                          <input type="text"  id="id_p" name="id_p" class="col-lg-2"  />
                                          <div class="col-lg-2" >
                                            <button  value="ตรวจสอบ" id="ck_id" type="button" ><i >ตรวจสอบ</i></button>
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
                                       <input type="text" class="col-lg-2" id="name" name="name"  />
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <input type="text" class="col-lg-2" id="surename" name="surename" />
                                       <label class="col-lg-2 text-right">วันเกิด</label>
                                       <input type="date" class="col-lg-2" id="dob" name="dob" />
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                      <input type="text" class="col-lg-2" id="address" name="address" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village" name="village"/>
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2"  id="room_number" name="room_number" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor" name="room_floor" />
                                       <label class="col-lg-2 text-right">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc" name="group_home" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="allet" name="alley" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road" name="road" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone" name="zone" />
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2 " id="district" name="district" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province" name="province" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code" name="zip_code" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone" name="phone" />
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="check_live" class="check_live" name="check_live" value="ที่เดี่ยวกับบัตรประชาชน" /><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live_0" name="check_live" value="ที่เดียวกับที่ปัจจุบัน" checked /><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" class="check_live" name="check_live" value="อื่นๆ" /><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>


                                       <div id="change">


                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-2" id="address" name="address1" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village" name="village1"/>
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2"  id="room_number" name="room_number1" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor" name="room_floor1" />
                                       <label class="col-lg-2 text-right">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc" name="group_home1" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="allet" name="alley1" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road" name="road1" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone" name="zone1" />
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2 " id="district" name="district1" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province" name="province1" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code" name="zip_code1" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone" name="phone1" />
                                       <div class="col-lg-12"> <br />  </div>


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
                                       <input type="radio" class="c" id="live_status1" name="live_status" value="1" /><span> เช่า&nbsp;</span><input type="text" id="live_status12" name="c_live_status" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" class="c" id="live_status11" name="live_status" value="2" /><span> ผ่อน&nbsp;</span><input type="text" id="live_status13" name="c_live_status" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" class='live_status' id="live_status" name="live_status" value="เป็นของตนเองปลอดภาระ"/><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>
                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="เป็นของบุคคลอื่น"/><span> เป็นของบุคคลอื่น&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="อาศัยอยู่กับบุตรหลานญาติ"/><span> อาศัยอยู่กับบุตรหลาน/ญาติ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="บ้านพักสวัสดิการ"/><span> บ้านพักสวัสดิการ&nbsp;&nbsp;</span>
                                         <input type="radio" class="c" id="live_status111" name="live_status" value="3"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status14" name="c_live_status" disabled/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">สถานภาพ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="s_status" name="m_status" checked value="โสด"/> <span> โสด&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status" class="ck_s"  value="สมรส"/> <span> สมรส&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status" class="ck_s" value="อยู่ด้วยกันโดยไม่จดทะเบียนสมรส"/><span> อยู่ด้วยกันโดยไม่จดทะเบียนสมรส&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status" class="ck_s" value="หย่าร้าง"/><span> หย่าร้าง&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status" class="ck_s"  value="หม้าย"/><span> หม้าย&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div id="s">

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
                                       </div>

                                       <div class="col-lg-12"> <br />  </div>



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
               //$('.c').val(2);
              $("#live_status13").prop('disabled', false);
              $("#live_status12").prop('disabled', true);
              $("#live_status14").prop('disabled', true);
              $("#live_status14").val('');
              $("#live_status12").val('');
          });
           $('#live_status111').on('click',function(){
               //$('.c').val(3);
              $("#live_status14").prop('disabled', false);
              $("#live_status13").prop('disabled', true);
              $("#live_status13").val('');
              $("#live_status12").prop('disabled', true);
              $("#live_status12").val('');
          });
          $('.live_status').on('click',function(){
              //$('.c').val('');
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
               $('#category').val(1);
               $('#class').val('id');
        });
        $('#change').hide();

        $('#check_live_0').on('click',function(){
           $('#change').hide();
         });

         $('.check_live').on('click',function(){
            $('#change').show();
        });
$('#s').hide();

        $('#s_status').on('click',function(){
           $('#s').hide();
         });

         $('.ck_s').on('click',function(){
            $('#s').show();
        });




        var val = <?php echo json_encode($ser1 ); ?>;
        var c = val.length;
        $('#ck_id').on('click',function(){
            var a = $('#id_p').val();
            var c1 = 0;
            if(a.length == 13){
            for (i = 0; i < val.length; i++) {
              if(val[i] == $('#id_p').val()){
                    $('#id_p').val('');
                    alert('หมายเลขบัตรประชาชนนี้ถูกใช้งานไปแล้ว');
                   // c1++;
              }else{
                  c1++;
                  if(c1 == c){
                    alert('ใช้งานได้');

                    }
              }

            }
            }else{
                alert('หมายเลขบัตรประชาชนต้องมี13หลัก');
            }
         });

    });

</script>
@stop
