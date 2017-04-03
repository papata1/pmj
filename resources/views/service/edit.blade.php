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
                                        {!! Form::model($service,array('route'=>['service.update',$service->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}
                                           <div class="form-group">
                                             <label>ปีงบประมาณ</label>
                                              {!! Form::select('year',array('2560' => '2560','2559' => '2559','2558' => '2558')) !!}
                                           </div>
                                           <div >
                                               <label>วันที่</label>
                                               <input type="date" id="date" name="date"value="{{$service->date}}" />
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
                                           <input class="form-control" name="process" id="process" value="{{$service->process}}" type="text" placeholder="">
                                    </div>
                                       <div class="col-lg-12">
                                       <h4 style="font-weight:bold;">ข้อมูลผู้ขอเข้ารับบริการ</h4>
                                       <hr />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div class="col-lg-6">
                                           <label>เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text" id="id_p" name="id_p" value="{{$ser->id_p}}"/>
                                       </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp" name="id_exp" value="{{$ser->id_exp}}"  @if($ser->id_exp=='ตลอดชีวิต')  disabled="disabled"@endif/>&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp1" name="id_exp"  value="ตลอดชีวิต" @if($ser->id_exp=='ตลอดชีวิต')  checked="checked"@endif/>
                                           <span>ตลอดชีวิต</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นาย"  @if($ser->prefix=='นาย')checked="checked"@endif/><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นาง" @if($ser->prefix=='นาง')checked="checked"@endif/><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นางสาว" @if($ser->prefix=='นางสาว')checked="checked"@endif/><span> นางสาว&nbsp;&nbsp;</span>
                                       @if($ser->prefix!='นางสาว' && $ser->prefix!='นาง' && $ser->prefix!='นาย')
                                       <input type="radio" id="prefix1" name="prefix" checked="checked" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix11" name="prefix" value="{{$service->prefix}}"/>
                                       @else
                                       <input type="radio" id="prefix1" name="prefix"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix11" name="prefix" disabled/>
                                       @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>
                                       
                                       <label class="col-lg-2 ">ชื่อ</label>
                                       <input type="text" class="col-lg-3" id="name" name="name" value="{{$ser->name}}" />
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="surename" name="surename" value="{{$ser->surename}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ว/ด/ป เกิด</label>
                                       <input type="date" class="col-lg-3" id="dob" name="dob" value="{{$ser->dob}}"/>
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3" id="house_number" name="address" value="{{$ser->address}}" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="village" name="village" value="{{$ser->village}}"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3"  id="room_number" name="room_number" value="{{$ser->room_number}}"/>
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="room_floor" name="room_floor" value="{{$ser->room_floor}}"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3" id="bloc" name="group_home" value="{{$ser->group_home}}"/>
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="allet" name="alley" value="{{$ser->alley}}"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3" id="road" name="road" value="{{$ser->road}}"/>
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="local" name="local" value="{{$ser->local}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3" id="district" name="district" value="{{$ser->district}}"/>
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="province" name="province" value="{{$ser->province}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3" id="zip_code" name="zip_code" value="{{$ser->zip_code}}" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="phone" name="phone" value="{{$ser->phone}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="check_live" name="check_live" value="ที่เดี่ยวกับบัตรประชาชน" @if($service->check_live=='ที่เดี่ยวกับบัตรประชาชน')checked="checked"@endif/><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" name="check_live" value="ที่เดียวกับที่ปัจจุบัน" @if($service->check_live=='ที่เดียวกับที่ปัจจุบัน')checked="checked"@endif/><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" name="check_live" value="อื่นๆ" @if($service->check_live=='อื่นๆ')checked="checked"@endif/><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>

                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3" id="house_number1" name="address1" value="{{$ser1->address}}" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="village1" name="village1" value="{{$ser1->village}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3" id="room_number1" name="room_number1" value="{{$ser1->room_number}}" />
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="room_floor1" name="room_floor1" value="{{$ser1->room_floor}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3" id="bloc1" name="group_home1" value="{{$ser1->group_home}}" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="alley1" name="alley1" value="{{$ser1->alley}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3" id="road1" name="road1" value="{{$ser1->road}}" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="local" name="local1" value="{{$ser1->local}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3" id="district1" name="district1" value="{{$ser1->district}}" />
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="province1" name="province1" value="{{$ser1->province}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3" id="zip_code1" name="zip_code1" value="{{$ser1->zip_code}}" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="phone1" name="phone1" value="{{$ser1->phone}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">ประเภทที่อยู่</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="live_cate" id="live_cate" name="live_cate" value="บ้าน" @if($service->live_cate=='บ้าน')checked="checked"@endif/><span> บ้าน&nbsp;&nbsp;</span>
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
                                        @if($service->c_live_status== 1 )
                                       <input type="radio"  class="c" id="live_status1" name="live_status" value="1" checked="checked"/><span> เช่า&nbsp;</span><input type="text" id="live_status12" name="c_live_status" value="{{$service->c_live_status}}"/> บาท/เดือน&nbsp;&nbsp;
                                       @else
                                       <input type="radio"  class="c" id="live_status1" name="live_status"  value="1"/><span> เช่า&nbsp;</span><input type="text" id="live_status12" name="c_live_status" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       @endif
                                       @if($service->c_live_status== 2 )
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
                                         @if($service->c_live_status== 3 )
                                         <input type="radio"  class="c" id="live_status111" name="live_status" checked="checked" value="3"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status14" name="c_live_status" value="{{$service->c_live_status}}"/>
                                         @else
                                         <input type="radio"  class="c" id="live_status111" name="live_status" value="3"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status14" name="c_live_status" disabled/>
                                         @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">สถานภาพ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="m_status" name="m_status"  value="โสด" @if($service->m_status=='โสด')checked="checked"@endif/> <span> โสด&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status"  value="สมรส" @if($service->m_status=='สมรส')checked="checked"@endif/> <span> สมรส&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status"  value="อยู่ด้วยกันโดยไม่จดทะเบียนสมรส" @if($service->m_status=='อยู่ด้วยกันโดยไม่จดทะเบียนสมรส')checked="checked"@endif/><span> อยู่ด้วยกันโดยไม่จดทะเบียนสมรส&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status"  value="หย่าร้าง" @if($service->m_status=='หย่าร้าง')checked="checked"@endif/><span> หย่าร้าง&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" name="m_status"  value="หม้าย" @if($service->m_status=='หม้าย')checked="checked"@endif/><span> หม้าย&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div class="col-lg-6">
                                           <label>เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text" id="id_p1" name="id_p1" value="{{$ser1->id_p}}" />                                       </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp3" name="id_exp1" value="{{$ser1->id_exp}}"@if($ser1->id_exp=='ตลอดชีวิต')  disabled="disabled"@endif/>&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp2" name="id_exp1"  value="ตลอดชีวิต" @if($ser1->id_exp=='ตลอดชีวิต')  checked="checked"@endif/>
                                           <span>ตลอดชีวิต</span>

                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio"  class='check' id="prefix1" name="prefix1" value="นาย" @if($ser1->prefix=='นาย')checked="checked"@endif/><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio"  class='check' id="prefix1" name="prefix1" value="นาง" @if($ser1->prefix=='นาง')checked="checked"@endif/><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio"  class='check' id="prefix1" name="prefix1" value="นางสาว" @if($ser1->prefix=='นางสาว')checked="checked"@endif/><span> นางสาว&nbsp;&nbsp;</span>
                                       @if($ser1->prefix!='นางสาว' && $ser1->prefix!='นาง' && $ser1->prefix!='นาย')
                                       <input type="radio"  class='checked' id="prefix12" name="prefix1" checked="checked" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text"  id="prefix123" name="prefix1"  class='checkedinput' value="{{$service->prefix1}}"  />
                                       @else
                                       <input type="radio"  class='checked' id="prefix12" name="prefix1"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text"  id="prefix123" name="prefix1"  class='checkedinput' disabled />
                                       @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">สามีหรือภรรยาชื่อ</label>
                                       <input type="text" class="col-lg-3" id="name1" name="name1" value="{{$ser1->name}}" />
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="surename1" name="surename1" value="{{$ser1->surename}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อาชีพปัจจุบัน</label>
                                       <input type="text" class="col-lg-3" id="job" name="job" value="{{$ser1->job}}" />
                                       <label  class="col-lg-2 text-right">รายได้/เดือน</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="income" name="income" value="{{$ser1->income}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>


                                 {!! Form::hidden('category', null,['id' => 'category']) !!}



                                      <div class="form-group col-lg-12" >
                                        <button type="button" id="reset" class="btn btn-danger" >ค่าเริ่มต้น</button>                                    
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
        //alert('aa');
                 $('.check').on('click',function(){
              $(".checkedinput").val('');
              $(".checkedinput").prop('disabled', true);
          });
          $('.checked').on('click',function(){
              $(".checkedinput").prop('disabled', false);
          });
        $('#id_exp1').on('click',function(){
             if ($("#id_exp").prop("disabled")){
              $("#id_exp").prop('disabled', false);
              }else{
              $("#id_exp").val('');
              $("#id_exp").prop('disabled', true);
              }
          });
           $('#id_exp2').on('click',function(){
             if ($("#id_exp2").prop("disabled")){
              $("#id_exp3").prop('disabled', false);
              }else{
              $("#id_exp3").val('');
              $("#id_exp3").prop('disabled', true);
              }
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
             // $('.c').val($(this).val());
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
        });

    });

</script>
@stop
