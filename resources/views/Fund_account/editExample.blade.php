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
                                            <select id="category" name="category" class="form-control" value="{{$service->category}}">
                                              <option value="">------เลือกงานที่ขอเข้ารับบริการ------</option>
                                              <option value="a">งานคนพิการ</option>
                                              <option value="b">งานผู้สูงอายุ</option>
                                              <option  value="c">งานอาสาสมัคร</option>
                                              <option value="d">งานเด็กและเยาวชน</option>
                                              <option value="e">งานการขอรับการสงเคราะห์</option>
                                              <option value="f">งานกองทุน</option>
                                              <option value="g">งานการให้คำปรึกษาแนะนำ</option>
                                              <option value="h">อื่นๆ</option>
                                            </select>
                            		   	 </div>

                                     <div class="form-group col-lg-6">
                                           <label>สถานะการดำเนินการ</label>
                                           <input class="form-control" name="status" id="status" value="{{$service->status}}" type="text" placeholder="">
                                    </div>
                                       <div class="col-lg-12">
                                       <h4 style="font-weight:bold;">ข้อมูลผู้ขอเข้ารับบริการ</h4>
                                       <hr />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div class="col-lg-6">
                                           <label>เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text" id="id_p" name="id_p" value="{{$service->id_p}}"/>
                                       </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp" name="id_exp" value="{{$service->id_exp}}"/>&nbsp;&nbsp;
                                           <input type="radio" id="id_exp" name="id_exp" value="ตลอดชีวิต" @if($service->id_exp=='ตลอดชีวิต')  checked="checked"@endif/>
                                           <span>ตลอดชีวิต</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นาย"  @if($service->prefix=='นาย')checked="checked"@endif/><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นาง" @if($service->prefix=='นาง')checked="checked"@endif/><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นางสาว" @if($service->prefix=='นางสาว')checked="checked"@endif/><span> นางสาว&nbsp;&nbsp;</span>
                                       @if($service->prefix!='นางสาว' && $service->prefix!='นาง' && $service->prefix!='นาย')
                                       <input type="radio" id="prefix1" name="prefix" checked="checked" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix11" name="prefix" value="{{$service->prefix}}"/>
                                       @else
                                       <input type="radio" id="prefix1" name="prefix"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix11" name="prefix" disabled/>
                                       @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>
                                       
                                       <label class="col-lg-2 ">ชื่อ</label>
                                       <input type="text" class="col-lg-3" id="name" name="name" value="{{$service->name}}" />
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="surename" name="surename" value="{{$service->surename}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ว/ด/ป เกิด</label>
                                       <input type="date" class="col-lg-3" id="dob" name="dob" value="{{$service->dob}}"/>
                                       <label  class="col-lg-2 text-right">อายุ</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="age" name="age" value="{{$service->age}}"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3" id="house_number" name="house_number" value="{{$service->house_number}}" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="village" name="village" value="{{$service->village}}"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3"  id="room_number" name="room_number" value="{{$service->room_number}}"/>
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="room_floor" name="room_floor" value="{{$service->room_floor}}"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3" id="bloc" name="bloc" value="{{$service->bloc}}"/>
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="allet" name="alley" value="{{$service->alley}}"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3" id="road" name="road" value="{{$service->road}}"/>
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="zone" name="zone" value="{{$service->zone}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3" id="district" name="district" value="{{$service->district}}"/>
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="province" name="province" value="{{$service->province}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3" id="zip_code" name="zip_code" value="{{$service->zip_code}}" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="phone" name="phone" value="{{$service->phone}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="check_live" name="check_live" value="ที่เดี่ยวกับบัตรประชาชน" @if($service->check_live=='ที่เดี่ยวกับบัตรประชาชน')checked="checked"@endif/><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" name="check_live" value="ที่เดียวกับที่ปัจจุบัน" @if($service->check_live=='ที่เดียวกับที่ปัจจุบัน')checked="checked"@endif/><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" name="check_live" value="อื่นๆ" /><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>

                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3" id="house_number1" name="house_number" value="{{$service->house_number}}" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="village1" name="village1" value="{{$service->village1}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3" id="room_number1" name="room_number1" value="{{$service->room_number1}}" />
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="room_floor1" name="room_floor1" value="{{$service->room_floor1}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3" id="bloc1" name="bloc1" value="{{$service->bloc1}}" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="alley1" name="alley1" value="{{$service->alley1}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3" id="road1" name="road1" value="{{$service->road1}}" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="zone1" name="zone1" value="{{$service->zone1}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3" id="district1" name="district1" value="{{$service->district1}}" />
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="province1" name="province1" value="{{$service->province1}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3" id="zip_code1" name="zip_code1" value="{{$service->zip_code1}}" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="phone1" name="phone1" value="{{$service->phone1}}" />
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
                                       <input type="radio"  class="c" id="live_status1" name="live_status"  checked="checked"/><span> เช่า&nbsp;</span><input type="text" id="live_status12" name="live_status" value="{{$service->live_status}}"/> บาท/เดือน&nbsp;&nbsp;
                                       @else
                                       <input type="radio"  class="c" id="live_status1" name="live_status"  /><span> เช่า&nbsp;</span><input type="text" id="live_status12" name="live_status" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       @endif
                                       @if($service->c_live_status== 2 )
                                       <input type="radio"  class="c" id="live_status11" name="live_status" checked="checked"/><span> ผ่อน&nbsp;</span><input type="text" id="live_status13" name="live_status"  value="{{$service->live_status}}"/> บาท/เดือน&nbsp;&nbsp;
                                       @else
                                       <input type="radio"  class="c" id="live_status11" name="live_status" /><span> ผ่อน&nbsp;</span><input type="text" id="live_status13" name="live_status" disabled/> บาท/เดือน&nbsp;&nbsp;
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
                                         <input type="radio"  class="c" id="live_status111" name="live_status" checked="checked"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status14" name="live_status" value="{{$service->live_status}}"/>
                                         @else
                                         <input type="radio"  class="c" id="live_status111" name="live_status" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status14" name="live_status" disabled/>
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
                                           <input type="text" id="id_p1" name="id_p1" value="{{$service->id_p1}}" />                                       </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp1" name="id_exp1" value="{{$service->id_exp1}}"/>&nbsp;&nbsp;
                                           <input type="radio" id="id_exp1" name="id_exp1" value="ตลอดชีวิต" @if($service->id_exp1=='ตลอดชีวิต')  checked="checked"@endif/>
                                           <span>ตลอดชีวิต</span>

                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio"  class='check' id="prefix1" name="prefix1" value="นาย" @if($service->prefix1=='นาย')checked="checked"@endif/><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio"  class='check' id="prefix1" name="prefix1" value="นาง" @if($service->prefix1=='นาง')checked="checked"@endif/><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio"  class='check' id="prefix1" name="prefix1" value="นางสาว" @if($service->prefix1=='นางสาว')checked="checked"@endif/><span> นางสาว&nbsp;&nbsp;</span>
                                       @if($service->prefix1!='นางสาว' && $service->prefix1!='นาง' && $service->prefix1!='นาย')
                                       <input type="radio"  class='checked' id="prefix12" name="prefix1" checked="checked" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text"  id="prefix123" name="prefix1"  class='checkedinput' value="{{$service->prefix1}}"  />
                                       @else
                                       <input type="radio"  class='checked' id="prefix12" name="prefix1"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text"  id="prefix123" name="prefix1"  class='checkedinput' disabled />
                                       @endif
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">สามีหรือภรรยาชื่อ</label>
                                       <input type="text" class="col-lg-3" id="name1" name="name1" value="{{$service->name1}}" />
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="surename1" name="surename1" value="{{$service->surename1}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อาชีพปัจจุบัน</label>
                                       <input type="text" class="col-lg-3" id="job" name="job" value="{{$service->job}}" />
                                       <label  class="col-lg-2 text-right">รายได้/เดือน</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="income" name="income" value="{{$service->income}}" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>


                                 {!! Form::hidden('c_live_status', null,['id' => 'c_live_status']) !!}



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
        });

    });

</script>
@stop
