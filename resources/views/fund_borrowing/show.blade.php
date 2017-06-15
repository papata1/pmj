
@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">แสดงข้อมูลผู้กู้ยืมเงินผู้สูงอายุ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('Fund_borrowing.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">

                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">
                                        {!! Form::model($service,array('route'=>['Fund_borrowing.update',$service->id],'method'=>'PUT',
                                        'novalidate' => 'novalidate','files' => true)) !!}


                                        <div class="form-group">
                                         <label class="col-lg-2">ปีงบประมาณ</label>
                                         <div class="col-lg-3">
                                          {!! Form::select('year',['' => ''] + $year, null, ['class' => 'form-control']) !!}
                                        </div>
                                       </div>
                                        <label class="col-lg-1">วันที่</label>
                                           <input type="date" id="date" name="date" class="col-lg-3" value="{{$service->date}}"/>
                                       <br />
                                       <div class="col-lg-12"> <br />  </div>





                                  <div class="col-lg-12"><h4 style="font-weight:bold;">ผู้ยื่นกู้</h4><hr /></div>
                                      <div class="col-lg-12"> </div>
                                        <label class="col-lg-2 ">ประเภทกองทุน</label>
                                        <div class="col-md-3">
                                        <select name="debt_cat" class="form-control">
                                            @if($service->debt_cat == 'รายบุคคล')
                                            <option value="รายบุคคล" selected>รายบุคคล</option>
                                            <option value="รายกลุ่ม">รายกลุ่ม</option>
                                            @else
                                            <option value="รายบุคคล" >รายบุคคล</option>
                                            <option value="รายกลุ่ม" selected>รายกลุ่ม</option>
                                            @endif
                                        </select>
                                        </div>

                                          <div class="col-lg-7"> <br />  </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div class="col-lg-6" >
                                           <label >เลขบัตรประชาชนประจำตัว</label>
                                          <input type="text"  id="id_p_b" name="id_p"   value="{{$service->id_p}}"/>
                                            <button  value="ตรวจสอบ" id="ck_id" type="button" ><i >ตรวจสอบ</i></button>
                                          </div>


                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp" name="id_exp" value="{{$service->id_exp}}" @if($ser->id_exp=='ตลอดชีวิต')  disabled="disabled"@endif/>&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp1" name="id_exp" value="ตลอดชีวิต"  @if($ser->id_exp=='ตลอดชีวิต')  checked="checked"@endif/>
                                           <span>ตลอดชีวิต</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นาย" @if($service->prefix=='นาย')checked="checked"@endif/><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นาง" @if($service->prefix=='นาง')checked="checked"@endif/><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นางสาว" @if($service->prefix=='นางสาว')checked="checked"@endif/><span> นางสาว&nbsp;&nbsp;</span>
                                        @if($service->prefix!='นางสาว' && $service->prefix!='นาง' && $service->prefix!='นาย')
                                       <input type="radio" id="prefix1" name="prefix" checked="checked"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix11" name="prefix3" disabled />
                                       @else
                                       <input type="radio" id="prefix1" name="prefix"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix11" name="prefix3" disabled />
                                       @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                        <label class="col-lg-1 ">ชื่อ</label>
                                       <input type="text" class="col-lg-2" id="name" name="name"   value="{{$service->name}}"/>
                                       <div class="col-lg-1"></div>
                                       <label  class="col-lg-1 text-right">นามสกุล</label>
                                       <input type="text" class="col-lg-2" id="surename" name="surename" value="{{$service->surename}}"/>
                                       <div class="col-lg-1"></div>
                                       <label class="col-lg-1 ">วันเกิด</label>
                                       <input type="date" class="col-lg-3" id="dob" name="dob" value="{{$service->dob}}"/>
                                       <div class="col-lg-12"> <br />  </div>




                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-2" id="house_number" name="address" value="{{$service->address}}"/>
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village" name="village" value="{{$service->village}}"/>
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2"  id="room_number" name="room_number" value="{{$service->room_number}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor" name="room_floor" value="{{$service->room_floor}}"/>
                                       <label class="col-lg-2 text-right">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc" name="group_home" value="{{$service->group_home}}"/>
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="allet" name="alley" value="{{$service->alley}}"/>
                                      <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road" name="road" value="{{$service->road}}"/>
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone" name="local" value="{{$service->local}}"/>
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2" id="district" name="district" value="{{$service->district}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province" name="province" value="{{$service->province}}" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code" name="zip_code" value="{{$service->zip_code}}"/>
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone" name="phone" value="{{$service->phone}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="check_live" class="check_live"name="check_live" value="ที่เดี่ยวกับบัตรประชาชน" @if($service->check_live=='ที่เดี่ยวกับบัตรประชาชน')checked="checked"@endif/><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live_0" name="check_live" value="ที่เดียวกับที่ปัจจุบัน" @if($service->check_live=='ที่เดียวกับที่ปัจจุบัน')checked="checked"@endif/><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" class="check_live"name="check_live" value="อื่นๆ" @if($service->check_live=='อื่นๆ')checked="checked"@endif/><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>


                                       <div id="change">



                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-2" id="house_number" name="address1" value="{{$ser->address}}"/>
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village" name="village1" value="{{$ser->village}}"/>
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2"  id="room_number" name="room_number1" value="{{$ser->room_number}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor" name="room_floor1" value="{{$ser->room_floor}}"/>
                                       <label class="col-lg-2 text-right">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc" name="group_home1" value="{{$ser->group_home}}"/>
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="allet" name="alley1" value="{{$ser->alley}}"/>
                                      <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road" name="road1" value="{{$ser->road}}"/>
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone" name="local1" value="{{$ser->local}}"/>
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2" id="district" name="district1" value="{{$ser->district}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province" name="province1" value="{{$ser->province}}" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code" name="zip_code1" value="{{$ser->zip_code}}"/>
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone" name="phone1" value="{{$ser->phone}}"/>
                                       <div class="col-lg-12"> <br />  </div>


                                       </div>



                                       <label class="col-lg-2">ประเภทที่อยู่</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="live_cate" id="live_cate" name="live_cate" value="บ้าน" @if($service->live_cate=='บ้าน')checked="checked"@endif /><span> บ้าน&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate" id="live_cate" name="live_cate" value="ทาวน์เฮาส์" @if($service->live_cate=='ทาวน์เฮาส์')checked="checked"@endif/><span> ทาวน์เฮาส์&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate" id="live_cate" name="live_cate" value="คอนโดมิเนียม" @if($service->live_cate=='คอนโดมิเนียม')checked="checked"@endif/><span> คอนโดมิเนียม&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate" id="live_cate" name="live_cate" value="อพาร์ทเม้นท์หอพักแฟลต" @if($service->live_cate=='อพาร์ทเม้นท์หอพักแฟลต')checked="checked"@endif/><span> อพาร์ทเม้นท์/หอพัก/แฟลต&nbsp;&nbsp;</span>
                                      @if($service->live_cate!='บ้าน' && $service->live_cate!='ทาวน์เฮาส์' && $service->live_cate!='คอนโดมิเนียม' && $service->live_cate!='อพาร์ทเม้นท์หอพักแฟลต')
                                       <input type="radio"  id="live_cate1" name="live_cate"  checked="checked" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_cate11" name="live_cate" value="{{$service->live_cate}}" />
                                       @else
                                       <input type="radio"  id="live_cate1" name="live_cate"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_cate11" name="live_cate" disabled/>
                                       @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">สถานะการอยู่อาศัย</label>
                                       <div class="col-lg-10">
                                      @if($service->live_status== 1 )
                                       <input type="radio"  class="c" id="live_status1" name="live_status" value="1" checked="checked"/><span> เช่า&nbsp;</span><input type="text" id="live_status12" name="c_live_status" value="{{$service->c_live_status}}"/> บาท/เดือน&nbsp;&nbsp;
                                       @else
                                       <input type="radio"  class="c" id="live_status1" name="live_status" value="1" /><span> เช่า&nbsp;</span><input type="text" id="live_status12" name="c_live_status" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       @endif
                                       @if($service->live_status== 2 )
                                       <input type="radio"  class="c" id="live_status11" name="live_status" value="2" checked="checked"/><span> ผ่อน&nbsp;</span><input type="text" id="live_status13" name="c_live_status"  value="{{$service->c_live_status}}"/> บาท/เดือน&nbsp;&nbsp;
                                       @else
                                       <input type="radio"  class="c" id="live_status11" name="live_status" value="2" /><span> ผ่อน&nbsp;</span><input type="text" id="live_status13" name="c_live_status" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       @endif
                                       <input type="radio" class='live_status' id="live_status" name="live_status" value="เป็นของตนเองปลอดภาระ" @if($service->live_status=='เป็นของตนเองปลอดภาระ')checked="checked"@endif/><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                       <input type="radio" class='live_status' id="live_status" name="live_status" value="เป็นของตนเองปลอดภาระ" @if($service->live_status=='เป็นของตนเองปลอดภาระ')checked="checked"@endif/><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>
                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="เป็นของบุคคลอื่น" @if($service->live_status=='เป็นของบุคคลอื่น')checked="checked"@endif/><span> เป็นของบุคคลอื่น&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="อาศัยอยู่กับบุตรหลานญาติ" @if($service->live_status=='อาศัยอยู่กับบุตรหลานญาติ')checked="checked"@endif/><span> อาศัยอยู่กับบุตรหลาน/ญาติ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="บ้านพักสวัสดิการ" @if($service->live_status=='บ้านพักสวัสดิการ')checked="checked"@endif/><span> บ้านพักสวัสดิการ&nbsp;&nbsp;</span>
                                         @if($service->live_status== 3 )
                                         <input type="radio"  class="c" id="live_status111" name="live_status" checked="checked" value="3"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status14" name="c_live_status" value="{{$service->c_live_status}}"/>
                                         @else
                                         <input type="radio"  class="c" id="live_status111" name="live_status"  value="3" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status14" name="c_live_status" disabled/>
                                         @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 ">อาชีพปัจจุบัน</label>
                                       <input type="text" class="col-lg-3" id="job" name="job_borrow" value="{{$ser->job_borrow}}"/>
                                       <label  class="col-lg-2 text-right">รายได้/เดือน</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="income" name="income_borrow" value="{{$ser->income_borrow}}"/>
                                       </div>
                                        <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2">สถานภาพ</label>
                                       <div class="col-lg-10">
                                      <input type="radio" id="s_status" name="m_status"  value="โสด" @if($service->m_status=='โสด')checked="checked"@endif/> <span> โสด&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" class="ck_s" name="m_status"  value="สมรส" @if($service->m_status=='สมรส')checked="checked"@endif/> <span> สมรส&nbsp;</span>
                                       <input type="radio" id="m_status" class="ck_s" name="m_status"  value="อยู่ด้วยกันโดยไม่จดทะเบียนสมรส" @if($service->m_status=='อยู่ด้วยกันโดยไม่จดทะเบียนสมรส')checked="checked"@endif/><span> อยู่ด้วยกันโดยไม่จดทะเบียนสมรส&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status"  class="ck_s" name="m_status"  value="หย่าร้าง" @if($service->m_status=='หย่าร้าง')checked="checked"@endif/><span> หย่าร้าง&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status"  class="ck_s" name="m_status"  value="หม้าย" @if($service->m_status=='หม้าย')checked="checked"@endif/><span> หม้าย&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div id="s">

                                       <div class="col-lg-6">
                                           <label>เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text" id="id_p1" name="id_p1"  value="{{$ser->id_p}}"/>
                                       </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp3" name="id_exp1" value="{{$ser->id_exp}}"@if($ser->id_exp=='ตลอดชีวิต')  disabled="disabled"@endif/>&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp2" name="id_exp1"  value="ตลอดชีวิต" @if($ser->id_exp=='ตลอดชีวิต')  checked="checked"@endif/>
                                           <span>ตลอดชีวิต</span>

                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio"  class='check' id="prefix1" name="prefix1" value="นาย" @if($ser->prefix=='นาย')checked="checked"@endif/><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio"  class='check' id="prefix1" name="prefix1" value="นาง" @if($ser->prefix=='นาง')checked="checked"@endif/><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio"  class='check' id="prefix1" name="prefix1" value="นางสาว" @if($ser->prefix=='นางสาว')checked="checked"@endif/><span> นางสาว&nbsp;&nbsp;</span>
                                       @if($ser->prefix!='นางสาว' && $ser->prefix!='นาง' && $ser->prefix!='นาย')
                                       <input type="radio"  class='checked' id="prefix12" name="prefix1" checked="checked" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text"  id="prefix123" name="prefix1"  class='checkedinput' value="{{$service->prefix}}"  />
                                       @else
                                       <input type="radio"  class='checked' id="prefix12" name="prefix1"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text"  id="prefix123" name="prefix1"  class='checkedinput' disabled />
                                       @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">สามีหรือภรรยาชื่อ</label>
                                       <input type="text" class="col-lg-3" id="name1" name="name1" value="{{$ser->name}}"/>
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="surename1" name="surename1" value="{{$ser->surename}}"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                        <label class="col-lg-2 ">อาชีพปัจจุบัน</label>
                                       <input type="text" class="col-lg-3" id="job" name="job" value="{{$ser->job}}"/>
                                       <label  class="col-lg-2 text-right">รายได้/เดือน</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="income" name="income" value="{{$ser->income}}"/>
                                       </div>
                                       </div>
                                        <div class="col-lg-12"> <br />  </div>


                                        <label class="col-lg-5" style="color:blue">ประสงค์จะขอกู้ยืมเงินกองทุนผู้สูงอายุเป็นจำนวนเงิน</label>
                                        <input type="text" class="col-lg-3" name="money"  value="{{$ser->money}}" />
                                        <label class="col-lg-4" >บาท</label>
                                        <div class="col-lg-12"> <br />  </div>

                                        <label class="col-lg-3" style="color:blue">เพื่อนำไปประกอบอาชีพ</label>
                                       <input list="browsers" name="forwhat"class="col-lg-3" value="{{$ser->forwhat}}" disabled/>
                                           <datalist id="browsers">
                                           <option value="ปศุสัตว์">
                                           <option value="เกษตรกรรม">
                                           <option value="ค้าขาย">
                                           <option value="หัตถกรรม">
                                           <option value="รับจ้าง/บริการ ">
                                           </datalist>
                                       <label  class="col-lg-2 text-right">รายละเอียดอาชีพ</label>
                                       <div class="col-lg-4">
                                      <input type="text" class="col-lg-8"  name="job_remark" value="{{$ser->job_remark}}" disabled/>
                                      </div>
                                       <div class="col-lg-12"> <br />  </div>

                                        <div class="col-lg-12">
                                        <label class="col-lg-3" >รูปผู้กู้ยืม</label>
                                        @if ($ser->pic)
                                        <input type="file" name="pic" value="{{$ser->pic}}" >
                                        <div class="col-lg-12" ></div>
                                       <p><img src="{{ URL::to('/') }}/images/{{ $ser->pic }}"   width="200" height="200" /></p>
                                        @else
                                         <input type="file" name="pic" value="{{$ser->pic}}" >
                                          <div class="col-lg-12" ></div>
                                        <div class="col-lg-3" ></div><label >ไม่มีรูปภาพ</label>
                                        @endif
                                        <div class="col-lg-12"> <br />  </div>
                                        <div class="col-lg-12"> <br />  </div></div>

<!-----------------------------------------------------------------------------------------------------------------------------------------------!-->

                           <div class="col-lg-12">
                           <h4 style="font-weight:bold;">ข้อมูลผู้คํ้าประกัน</h4>
                           <hr />
                           </div>
                           <div class="col-lg-12"> <br />  </div>
                                        <div class="col-lg-6" >
                                           <label >เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text" id="id_p" name="id_p2"  value="{{$ser2->id_p}}"/>
                                           <button  value="ตรวจสอบ" id="ck_id1" type="button" ><i >ตรวจสอบ</i></button>
                                         </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp5" name="id_exp2" value="{{$ser2->id_exp}}"/>&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp6" name="id_exp2" value="ตลอดชีวิต"  />
                                           <span>ตลอดชีวิต</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="prefix1" id="prefix" name="prefix2" value="นาย" @if($ser2->prefix=='นาย')checked="checked"@endif/><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix1" id="prefix" name="prefix2" value="นาง" @if($ser2->prefix=='นาง')checked="checked"@endif/><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix1" id="prefix" name="prefix2" value="นางสาว" @if($ser2->prefix=='นางสาว')checked="checked"@endif/><span> นางสาว&nbsp;&nbsp;</span>
                                       <input type="radio" id="prefix2" name="prefix2"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix3" name="prefix" disabled />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ชื่อ</label>
                                       <input type="text" class="col-lg-2" id="name" name="name2"  value="{{$ser2->name}}"/>
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <input type="text" class="col-lg-2" id="surename" name="surename2" value="{{$ser2->surename}}"/>
                                       <label class="col-lg-2 text-right">วันเกิด</label>
                                       <input type="date" class="col-lg-2" id="dob" name="dob2" value="{{$ser2->dob}}"/>
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                      <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-2" id="house_number" name="address2" value="{{$ser2->address}}"/>
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village" name="village2" value="{{$ser2->village}}"/>
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2"  id="room_number" name="room_number2" value="{{$ser2->room_number}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor" name="room_floor2" value="{{$ser2->room_floor}}"/>
                                       <label class="col-lg-2 text-right">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc" name="group_home2" value="{{$ser2->group_home}}"/>
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="allet" name="alley2" value="{{$ser2->alley}}"/>
                                      <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road" name="road2" value="{{$ser2->road}}"/>
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone" name="local2" value="{{$ser2->local}}"/>
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2" id="district" name="district2" value="{{$ser2->district}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province" name="province2" value="{{$ser2->province}}" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code" name="zip_code2" value="{{$ser2->zip_code}}"/>
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone" name="phone2" value="{{$ser2->phone}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="check_live" name="check_live1"class="check_live1" value="ที่เดี่ยวกับบัตรประชาชน" @if($ser2->check_live=='ที่เดี่ยวกับบัตรประชาชน')checked="checked"@endif /><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live_1" name="check_live1" value="ที่เดียวกับที่ปัจจุบัน" @if($ser2->check_live=='ที่เดียวกับที่ปัจจุบัน')checked="checked"@endif/><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" name="check_live1" class="check_live1"value="อื่นๆ" @if($ser2->check_live=='อื่นๆ')checked="checked"@endif/><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div id="change1">


                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-2" id="house_number" name="address3" value="{{$ser3->address}}"/>
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village" name="village3" value="{{$ser3->village}}"/>
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2"  id="room_number" name="room_number3" value="{{$ser3->room_number}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor" name="room_floor3" value="{{$ser3->room_floor}}"/>
                                       <label class="col-lg-2 text-right">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc" name="group_home3" value="{{$ser3->group_home}}"/>
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="allet" name="alley3" value="{{$ser3->alley}}"/>
                                      <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road" name="road3" value="{{$ser3->road}}"/>
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone" name="local3" value="{{$ser3->local}}"/>
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2" id="district" name="district3" value="{{$ser3->district}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province" name="province3" value="{{$ser3->province}}" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code" name="zip_code3" value="{{$ser3->zip_code}}"/>
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone" name="phone3" value="{{$ser3->phone}}"/>
                                       <div class="col-lg-12"> <br />  </div>



                                       </div>



                                       <label class="col-lg-2">ประเภทที่อยู่</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="live_cate1" id="live_cate" name="live_cate1" value="บ้าน" @if($ser2->live_cate=='บ้าน')checked="checked"@endif/><span> บ้าน&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate1" id="live_cate" name="live_cate1" value="ทาวน์เฮาส์" @if($ser2->live_cate=='ทาวน์เฮาส์')checked="checked"@endif/><span> ทาวน์เฮาส์&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate1" id="live_cate" name="live_cate1" value="คอนโดมิเนียม" @if($ser2->live_cate=='คอนโดมิเนียม')checked="checked"@endif/><span> คอนโดมิเนียม&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate1" id="live_cate" name="live_cate1" value="อพาร์ทเม้นท์หอพักแฟลต" @if($ser2->live_cate=='อพาร์ทเม้นท์หอพักแฟลต')checked="checked"@endif/><span> อพาร์ทเม้นท์/หอพัก/แฟลต&nbsp;&nbsp;</span>
                                       @if($ser2->live_cate!='บ้าน' && $ser2->live_cate!='ทาวน์เฮาส์' && $ser2->live_cate!='คอนโดมิเนียม' && $ser2->live_cate!='อพาร์ทเม้นท์หอพักแฟลต')
                                       <input type="radio"  id="live_cate1" name="live_cate1"  checked="checked"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_cate3" name="live_cate1" value="{{$service->live_cate}}"/>
                                       @else
                                       <input type="radio"  id="live_cate1" name="live_cate1"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_cate3" name="live_cate1" disabled/>
                                       @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">สถานะการอยู่อาศัย</label>
                                       <div class="col-lg-10">
                                        @if($ser2->live_status== 1 )
                                       <input type="radio" class="b" id="live_status2" name="live_status1" value="1" checked="checked"/><span> เช่า&nbsp;</span><input type="text" id="live_status22" name="c_live_status1" value="{{$ser2->c_live_status}}"/> บาท/เดือน&nbsp;&nbsp;
                                        @else
                                         <input type="radio" class="b" id="live_status2" name="live_status1" value="1" /><span> เช่า&nbsp;</span><input type="text" id="live_status22" name="c_live_status1" disabled/> บาท/เดือน&nbsp;&nbsp;
                                        @endif
                                        @if($ser2->live_status== 2 )
                                       <input type="radio" class="b" id="live_status3" name="live_status1" value="2" checked="checked"/><span> ผ่อน&nbsp;</span><input type="text" id="live_status33" name="c_live_status1" value="{{$ser2->c_live_status}}"/> บาท/เดือน&nbsp;&nbsp;
                                       @else
                                       <input type="radio" class="b" id="live_status3" name="live_status1" value="2" /><span> ผ่อน&nbsp;</span><input type="text" id="live_status33" name="c_live_status1" disabled/> บาท/เดือน&nbsp;&nbsp;
                                        @endif
                                       <input type="radio" class='live_status1' id="live_status" name="live_status1" value="เป็นของตนเองปลอดภาระ"/><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>
                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class='live_status1' id="live_status" name="live_status1" value="เป็นของบุคคลอื่น"/><span> เป็นของบุคคลอื่น&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status1' id="live_status" name="live_status1" value="อาศัยอยู่กับบุตรหลานญาติ"/><span> อาศัยอยู่กับบุตรหลาน/ญาติ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status1' id="live_status" name="live_status1" value="บ้านพักสวัสดิการ"/><span> บ้านพักสวัสดิการ&nbsp;&nbsp;</span>
                                       @if($ser2->live_status== 3 )
                                         <input type="radio" class="b" id="live_status4" name="live_status1" value="3" checked="checked"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status44" name="c_live_status1" value="{{$ser2->c_live_status}}"/>>
                                         @else
                                         <input type="radio" class="b" id="live_status4" name="live_status1" value="3"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status44" name="c_live_status1" disabled/>
                                         @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2">ความสัมพันธ์กับผู้กู้</label>
                           <div class="col-lg-10">
                           <input type="radio" name="relation" value="บุตร" @if($service->relation=='บุตร')checked="checked"@endif/><span> บุตร&nbsp;&nbsp;</span>
                           <input type="radio" name="relation" value="ญาติ"@if($service->relation=='ญาติ')checked="checked"@endif/><span> ญาติ&nbsp;&nbsp;</span>
                           <input type="radio" name="relation" value="คนรู้จัก/เพื่อนบ้าน" @if($service->relation=='คนรู้จัก/เพื่อนบ้าน')checked="checked"@endif/><span> คนรู้จัก/เพื่อนบ้าน&nbsp;&nbsp;</span>
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">อาชีพปัจจุบัน</label>
                           <input type="text" class="col-lg-2"   name="job1" value="{{$ser35->job}}"/>
                           <label class="col-lg-2 text-right ">ตำแหน่ง</label>
                           <input type="text" class="col-lg-2"   name="role" value="{{$ser35->role}}"/>
                           <label  class="col-lg-2 text-right">รายได้/เดือน</label>
                           <input type="text" class="col-lg-2" name="income1" value="{{$ser35->income}}"/>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">ชื่อบริษัท/สำนักงาน</label>
                           <input type="text" class="col-lg-2"  name="bname" value="{{$ser35->bname}}"/>
                           <label  class="col-lg-2 text-right">เลขที่</label>
                           <input type="text" class="col-lg-2" name="address4" value="{{$ser35->address}}"/>
                           <label class="col-lg-2 text-right">อาคาร</label>
                           <input type="text" class="col-lg-2" name="village4" value="{{$ser35->village}}"/>
                           <div class="col-lg-12"> <br />  </div>


                           <label  class="col-lg-2">เลขที่ห้อง</label>
                           <input type="text" class="col-lg-2" name="room_number4" value="{{$ser35->room_number}}"/>
                           <label class="col-lg-2 text-right">ชั้น</label>
                           <input type="text" class="col-lg-2" name="room_floor4" value="{{$ser35->room_floor}}"/>
                           <label  class="col-lg-2 text-right">หมู่ที่</label>
                           <input type="text" class="col-lg-2" name="group_home4" value="{{$ser35->group_home}}"/>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">ตรอก/ซอย</label>
                           <input type="text" class="col-lg-2"  name="alley4" value="{{$ser35->alley}}"/>
                           <label  class="col-lg-2 text-right">ถนน</label>
                           <input type="text" class="col-lg-2" name="road4" value="{{$ser35->road}}"/>
                           <label class="col-lg-2 text-right">ตำบล/แขวง</label>
                           <input type="text" class="col-lg-2"  name="local4" value="{{$ser35->local}}"/>
                           <div class="col-lg-12"> <br />  </div>


                           <label  class="col-lg-2">อำเภอ/เขต</label>
                           <input type="text" class="col-lg-2" name="district4" value="{{$ser35->district}}"/>
                           <label class="col-lg-2 text-right">จังหวัด</label>
                           <input type="text" class="col-lg-2" name="province4"  value="{{$ser35->province}}"/>
                           <label  class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                           <input type="text" class="col-lg-2" name="zip_code4" value="{{$ser35->zip_code}}"/>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">โทรศัพท์ที่ทำงาน</label>
                           <input type="text" class="col-lg-2" name="phone_job" value="{{$ser35->phone_job}}"/>
                           <label  class="col-lg-2 text-right">โทรศัพท์มือถือ</label>
                           <input type="text" class="col-lg-2" name="phone4" value="{{$ser35->phone}}"/>
                           <div class="col-lg-12"> <br />  </div>

                           <div class="col-lg-12"> <br />  </div>
                           <div class="col-lg-12">


 <!-----------------------------------------------------------------------------------------------------------------------------------------------!-->

                           <h4 style="font-weight:bold;">ข้อมูลอื่นๆ</h4>
                           <hr />
                           </div>
                           <div class="col-lg-12"> <br />  </div>



                           <label class="col-lg-12 " style="color:red;" >กรณีเสียชีวิต</label>
                           <div class="col-lg-10">
                           <input type="radio" name="life" value="ยังมีชีวิตอยู่" @if($service->life=='ยังมีชีวิตอยู่')checked="checked"@endif /><span> ยังมีชีวิตอยู่&nbsp;&nbsp;</span>
                           <input type="radio" name="life" value="เสียชีวิต" @if($service->life=='เสียชีวิต')checked="checked"@endif/><span> เสียชีวิต&nbsp;&nbsp;</span>
                           </div>
                           <div class="col-lg-12"> <br />  </div><div class="col-lg-12"> <br />  </div>


                           <h4><label class="col-lg-12 "  >ข้อมูลทายาท</label></h4>

                         <div class="col-lg-6">
                                           <label>เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text" id="id_p" name="id_p5" value="{{$ser4->id_p}}"/>
                                       </div>
                                       <div class="col-lg-6">
                                       <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp7" name="id_exp5" value="{{$ser4->id_exp}}"/>&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp8" name="id_exp5" value="ตลอดชีวิต"  />
                                           <span>ตลอดชีวิต</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="prefix2" id="prefix" name="prefix5" value="นาย" @if($ser4->prefix=='นาย')checked="checked"@endif/><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix2" id="prefix" name="prefix5" value="นาง" @if($ser4->prefix=='นาง')checked="checked"@endif/><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix2" id="prefix" name="prefix5" value="นางสาว" @if($ser4->prefix=='นางสาว')checked="checked"@endif/><span> นางสาว&nbsp;&nbsp;</span>
                                       <input type="radio" id="prefix4" name="prefix5"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix5" name="prefix5" disabled />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ชื่อ</label>
                                       <input type="text" class="col-lg-3" id="name" name="name5"  value="{{$ser4->name}}"/>
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="surename" name="surename5" value="{{$ser4->surename}}"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ว/ด/ป เกิด</label>
                                       <input type="date" class="col-lg-3" id="dob" name="dob5" value="{{$ser4->dob}}"/>
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-2" id="house_number" name="address5" value="{{$ser4->address}}"/>
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village" name="village5" value="{{$ser4->village}}"/>
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2"  id="room_number" name="room_number5" value="{{$ser4->room_number}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor" name="room_floor5" value="{{$ser4->room_floor}}"/>
                                       <label class="col-lg-2 text-right">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc" name="group_home5" value="{{$ser4->group_home}}"/>
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="allet" name="alley5" value="{{$ser4->alley}}"/>
                                      <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road" name="road5" value="{{$ser4->road}}"/>
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone" name="local5" value="{{$ser4->local}}"/>
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2" id="district" name="district5" value="{{$ser4->district}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province" name="province5" value="{{$ser4->province}}" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code" name="zip_code5" value="{{$ser4->zip_code}}"/>
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone" name="phone5" value="{{$ser4->phone}}"/>
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="check_live" class="check_live2" name="check_live5" value="ที่เดี่ยวกับบัตรประชาชน" @if($ser4->check_live=='ที่เดี่ยวกับบัตรประชาชน')checked="checked"@endif/><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live_2" name="check_live5" value="ที่เดียวกับที่ปัจจุบัน" @if($ser4->check_live=='ที่เดียวกับที่ปัจจุบัน')checked="checked"@endif/><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" class="check_live2"name="check_live5" value="อื่นๆ" @if($ser4->check_live=='อื่นๆ')checked="checked"@endif/><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div id="change2">



                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-2" id="house_number" name="address6" value="{{$ser5->address}}"/>
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village" name="village6" value="{{$ser5->village}}"/>
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2"  id="room_number" name="room_number6" value="{{$ser5->room_number}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor" name="room_floor6" value="{{$ser5->room_floor}}"/>
                                       <label class="col-lg-2 text-right">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc" name="group_home6" value="{{$ser5->group_home}}"/>
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="allet" name="alley6" value="{{$ser5->alley}}"/>
                                      <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road" name="road6" value="{{$ser5->road}}"/>
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone" name="local6" value="{{$ser5->local}}"/>
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2" id="district" name="district6" value="{{$ser5->district}}"/>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province" name="province6" value="{{$ser5->province}}" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code" name="zip_code6" value="{{$ser5->zip_code}}"/>
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone" name="phone6" value="{{$ser5->phone}}"/>
                                       <div class="col-lg-12"> <br />  </div>


                                       </div>


                                       <label class="col-lg-2">ประเภทที่อยู่</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="live_cate2" id="live_cate" name="live_cate5" value="บ้าน" /><span> บ้าน&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate2" id="live_cate" name="live_cate5" value="ทาวน์เฮาส์" /><span> ทาวน์เฮาส์&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate2" id="live_cate" name="live_cate5" value="คอนโดมิเนียม" /><span> คอนโดมิเนียม&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate2" id="live_cate" name="live_cate5" value="อพาร์ทเม้นท์หอพักแฟลต" /><span> อพาร์ทเม้นท์/หอพัก/แฟลต&nbsp;&nbsp;</span>
                                       <input type="radio"  id="live_cate4" name="live_cate5"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_cate5" name="live_cate5" disabled/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">สถานะการอยู่อาศัย</label>
                                       <div class="col-lg-10">
                                        @if($ser5->live_status== 1 )
                                       <input type="radio" class="a" id="live_status21" name="live_status5" value="1" checked="checked"/><span> เช่า&nbsp;</span><input type="text" id="live_status221" name="c_live_status5" value="{{$ser5->c_live_status}}"/> บาท/เดือน&nbsp;&nbsp;
                                       @else
                                       <input type="radio" class="a" id="live_status21" name="live_status5" value="1" /><span> เช่า&nbsp;</span><input type="text" id="live_status221" name="c_live_status5" disabled/> บาท/เดือน&nbsp;&nbsp;
                                         @endif
                                         @if($ser5->live_status== 2 )
                                       <input type="radio" class="a" id="live_status31" name="live_status5" value="2" checked="checked"/><span> ผ่อน&nbsp;</span><input type="text" id="live_status331" name="c_live_status5" value="{{$ser5->c_live_status}}"/> บาท/เดือน&nbsp;&nbsp;
                                       @else
                                       <input type="radio" class="a" id="live_status31" name="live_status5" value="2" /><span> ผ่อน&nbsp;</span><input type="text" id="live_status331" name="c_live_status5" disabled/> บาท/เดือน&nbsp;&nbsp;
                                        @endif
                                       <input type="radio" class='live_status2' id="live_status" name="live_statuS5" value="เป็นของตนเองปลอดภาระ"/><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>
                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class='live_status2' id="live_status" name="live_status5" value="เป็นของบุคคลอื่น"/><span> เป็นของบุคคลอื่น&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status2' id="live_status" name="live_status5" value="อาศัยอยู่กับบุตรหลานญาติ"/><span> อาศัยอยู่กับบุตรหลาน/ญาติ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status2' id="live_status" name="live_status5" value="บ้านพักสวัสดิการ"/><span> บ้านพักสวัสดิการ&nbsp;&nbsp;</span>
                                         @if($ser5->live_status== 3 )
                                         <input type="radio" class="a" id="live_status41" name="live_status5" value="3" checked="checked"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status441" name="c_live_status5" value="{{$ser5->c_live_status}}"/>
                                         @else
                                          <input type="radio" class="a" id="live_status41" name="live_status5" value="3"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status441" name="c_live_status5" disabled/>
                                         @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>






                                <input type="hidden" name="id_rela" value="{{$ser->id_rela}}">
                                <input type="hidden" name="id_rela1" value="{{$ser3->id_rela}}">
                                <input type="hidden" name="id_rela2" value="{{$ser5->id_rela}}">

                                 {!! Form::hidden('category', null,['id' => 'category']) !!}
                                 {!! Form::hidden('class', null,['id' => 'class']) !!}





                                      <div class="form-group col-lg-12" >

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

                //             alert(5);
                 var a;
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
          $('#id_exp3').on('click',function(){
              if(a==1){
              $("#id_exp2").prop('disabled', false);
              a = 0 ;
              }else{
              $("#id_exp2").val('');
              $("#id_exp2").prop('disabled', true);
              a = 1;
              }
          });
           $('#id_exp6').on('click',function(){
              if(a==1){
              $("#id_exp5").prop('disabled', false);
              a = 0 ;
              }else{
              $("#id_exp5").val('');
              $("#id_exp5").prop('disabled', true);
              a = 1;
              }
          });
            $('#id_exp8').on('click',function(){
              if(a==1){
              $("#id_exp7").prop('disabled', false);
              a = 0 ;
              }else{
              $("#id_exp7").val('');
              $("#id_exp7").prop('disabled', true);
              a = 1;
              }
          });

//--------------------------------------------------------------------------------------------------------------

          $('.check').on('click',function(){
              $(".checkedinput").val('');
              $(".checkedinput").prop('disabled', true);
          });
          $('.checked').on('click',function(){
              $(".checkedinput").prop('disabled', false);
          });

           $('#live_status1').on('click',function(){
            //  $('.c').val(1);
              $("#live_status12").prop('disabled', false);
              $("#live_status14").prop('disabled', true);
              $("#live_status14").val('');
              $("#live_status13").prop('disabled', true);
              $("#live_status13").val('');
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
              // $('.c').val(3);
              $("#live_status14").prop('disabled', false);
              $("#live_status13").prop('disabled', true);
              $("#live_status13").val('');
              $("#live_status12").prop('disabled', true);
              $("#live_status12").val('');
          });
          $('.live_status').on('click',function(){
             // $('.c').val('');
              $("#live_status14").prop('disabled', true);
              $("#live_status14").val('');
              $("#live_status13").prop('disabled', true);
              $("#live_status13").val('');
              $("#live_status12").prop('disabled', true);
              $("#live_status12").val('');
          });

//--------------------------------------------------------------------------------------------------------------

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
          $('#prefix2').on('click',function(){
              $("#prefix3").prop('disabled', false);
          });
          $('.prefix1').on('click',function(){
              $("#prefix3").val('');
              $("#prefix3").prop('disabled', true);
          });
          $('#live_cate2').on('click',function(){
              $("#live_cate3").prop('disabled', false);
          });
           $('.live_cate1').on('click',function(){
              $("#live_cate3").val('');
              $("#live_cate3").prop('disabled', true);
          });
           $('#live_status2').on('click',function(){
              //$('.b').val(1);
              $("#live_status22").prop('disabled', false);
              $("#live_status44").prop('disabled', true);
              $("#live_status44").val('');
              $("#live_status33").prop('disabled', true);
              $("#live_status33").val('');
          });
          $('#live_status3').on('click',function(){
              // $('.b').val(2);
              $("#live_status33").prop('disabled', false);
              $("#live_status22").prop('disabled', true);
              $("#live_status44").prop('disabled', true);
              $("#live_status44").val('');
              $("#live_status22").val('');
          });
           $('#live_status4').on('click',function(){
              // $('.b').val(3);
              $("#live_status44").prop('disabled', false);
              $("#live_status33").prop('disabled', true);
              $("#live_status33").val('');
              $("#live_status22").prop('disabled', true);
              $("#live_status22").val('');
          });
          $('.live_status1').on('click',function(){
              //alert(5);
              //$('.b').val('');
              $("#live_status44").prop('disabled', true);
              $("#live_status44").val('');
              $("#live_status33").prop('disabled', true);
              $("#live_status33").val('');
              $("#live_status22").prop('disabled', true);
              $("#live_status22").val('');
          });

//--------------------------------------------------------------------------------------------------------------

           $('#prefix4').on('click',function(){
              $("#prefix5").prop('disabled', false);
          });
          $('.prefix2').on('click',function(){
              $("#prefix5").val('');
              $("#prefix5").prop('disabled', true);
          });
          $('#live_cate4').on('click',function(){
              $("#live_cate5").prop('disabled', false);
          });
           $('.live_cate2').on('click',function(){
              $("#live_cate5").val('');
              $("#live_cate5").prop('disabled', true);
          });
           $('#live_status21').on('click',function(){
              //$('.a').val(1);
              $("#live_status221").prop('disabled', false);
              $("#live_status441").prop('disabled', true);
              $("#live_status441").val('');
              $("#live_status331").prop('disabled', true);
              $("#live_status331").val('');
          });
          $('#live_status31').on('click',function(){
              // $('.a').val(2);
              $("#live_status331").prop('disabled', false);
              $("#live_status221").prop('disabled', true);
              $("#live_status441").prop('disabled', true);
              $("#live_status441").val('');
              $("#live_status221").val('');
          });
           $('#live_status41').on('click',function(){
               //$('.a').val(3);
              $("#live_status441").prop('disabled', false);
              $("#live_status331").prop('disabled', true);
              $("#live_status331").val('');
              $("#live_status221").prop('disabled', true);
              $("#live_status221").val('');
          });
          $('.live_status2').on('click',function(){
              //alert(5);
              //$('.a').val('');
              $("#live_status441").prop('disabled', true);
              $("#live_status441").val('');
              $("#live_status331").prop('disabled', true);
              $("#live_status331").val('');
              $("#live_status221").prop('disabled', true);
              $("#live_status221").val('');
          });


         $('#add1').click(function () {

              $('#category').val(1);
               $('#class').val('borrow');
        });

       var val = '<?php echo $service->check_live ;?>';
        var val1 = '<?php echo $ser2->check_live ;?>';
         var val2 = '<?php echo $ser4->check_live ;?>';

       //$service->check_live=='ที่เดียวกับที่ปัจจุบัน'
        if(val =='ที่เดียวกับที่ปัจจุบัน'){
        $('#change').hide();
        }
        if(val1 =='ที่เดียวกับที่ปัจจุบัน'){
        $('#change1').hide();
        }
        if(val2 =='ที่เดียวกับที่ปัจจุบัน'){
        $('#change2').hide();
        }


        $('#check_live_0').on('click',function(){
           $('#change').hide();
         });

         $('.check_live').on('click',function(){
            $('#change').show();
        });

        $('#check_live_1').on('click',function(){
           $('#change1').hide();
         });

         $('.check_live1').on('click',function(){
            $('#change1').show();
        });

        $('#check_live_2').on('click',function(){
           $('#change2').hide();
         });

         $('.check_live2').on('click',function(){
            $('#change2').show();
        });

        $('#s_status').on('click',function(){
           $('#s').hide();
         });

         $('.ck_s').on('click',function(){
            $('#s').show();
        });


            $('.panel-body').find('input, textarea, button, select').attr('disabled','disabled');

    });

</script>
@stop
