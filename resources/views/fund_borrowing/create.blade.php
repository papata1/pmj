@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">งานกู้ยืมเงินผู้สูงอายุ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('Fund_borrowing.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-primary">
                                   <div class="panel-heading">
                                       ลงทะเบียนผู้กู้ยืมเงินผู้สูงอายุ
                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">

                                        {!! Form::open(array('route'=>'Fund_borrowing.store','class' => 'form',
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

                                      <h4 style="font-weight:bold;">ผู้ยื่นกู้</h4>
                                      <hr />
                                      <div class="col-lg-12"> </div>
                                        <label class="col-lg-2 ">ประเภทกองทุน</label>
                                        <div class="col-md-3">
                                        <select name="debt_cat" class="form-control">
                                            <option value="รายบุคคล">รายบุคคล</option>
                                            <option value="รายกลุ่ม">รายกลุ่ม</option>
                                        </select>
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
                                       <input type="radio" class="prefix" id="prefix" name="prefix3" value="นาย" /><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix3" value="นาง" /><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix3" value="นางสาว" /><span> นางสาว&nbsp;&nbsp;</span>
                                       <input type="radio" id="prefix1" name="prefix3"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix11" name="prefix3" disabled />
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
                                       <div class="col-lg-5">
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3" id="house_number" name="house_number" />
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
                                       <input type="text" class="col-lg-8" id="zone" name="zone" />
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
                                       <input type="text" class="col-lg-3" id="house_number1" name="house_number" />
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
                                       <input type="text" class="col-lg-8" id="zone1" name="zone1" />
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


                                       <label class="col-lg-2 ">อาชีพปัจจุบัน</label>
                                       <input type="text" class="col-lg-3" id="job" name="job" />
                                       <label  class="col-lg-2 text-right">รายได้/เดือน</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="income" name="income"/>
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
                                          <input type="date"  id="id_exp2" name="id_exp1" />&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp3" name="id_exp1" value="ตลอดชีวิต" />
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


                                        <label class="col-lg-5" >ประสงค์จะขอกู้ยืมเงินกองทุนผู้สูงอายุเป็นจำนวนเงิน</label>
                                        <input type="text" class="col-lg-3" name="money"  />
                                        <label class="col-lg-4" >บาท</label>
                                        <div class="col-lg-12"> <br />  </div>

                                        <label class="col-lg-3" >เพื่อนำไปประกอบอาชีพ</label>
                                        <input type="text" class="col-lg-5" name="forwhat" />
                                        <label class="col-lg-4" > </label>
                                        <div class="col-lg-12"> <br />  </div>

                                        <label class="col-lg-3" >รูปผู้กู้ยืม</label>
                                        <input type="file" class="col-lg-9" name="pic"  >
                                        <div class="col-lg-12"> <br />  </div>
                                        <div class="col-lg-12"> <br />  </div>

<!-----------------------------------------------------------------------------------------------------------------------------------------------!--> 

                           <div class="col-lg-12">
                           <h4 style="font-weight:bold;">ข้อมูลผู้คํ้าประกัน</h4>
                           <hr />
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                             <div class="col-lg-6">
                                           <label>เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text" id="id_p" name="id_p2" />
                                       </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp5" name="id_exp2"/>&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp6" name="id_exp2" value="ตลอดชีวิต"  />
                                           <span>ตลอดชีวิต</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="prefix1" id="prefix" name="prefix2" value="นาย" /><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix1" id="prefix" name="prefix2" value="นาง" /><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix1" id="prefix" name="prefix2" value="นางสาว" /><span> นางสาว&nbsp;&nbsp;</span>
                                       <input type="radio" id="prefix2" name="prefix2"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix3" name="prefix" disabled />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ชื่อ</label>
                                       <input type="text" class="col-lg-3" id="name" name="name2"  />
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="surename" name="surename2" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ว/ด/ป เกิด</label>
                                       <input type="date" class="col-lg-3" id="dob" name="dob2" />
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3" id="address" name="address2" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="village" name="village2"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3"  id="room_number" name="room_number2" />
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="room_floor" name="room_floor2" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3" id="bloc" name="group_home2" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="allet" name="alley2" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3" id="road" name="road2" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="local" name="local2" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3" id="district" name="district2" />
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="province" name="province2" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3" id="zip_code" name="zip_code2" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="phone" name="phone2" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="check_live" name="check_live1" value="ที่เดี่ยวกับบัตรประชาชน" /><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" name="check_live1" value="ที่เดียวกับที่ปัจจุบัน" /><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" name="check_live1" value="อื่นๆ" /><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>

                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3" id="house_number1" name="address3" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="village1" name="village3" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3" id="room_number1" name="room_number3" />
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="room_floor1" name="room_floor3" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3" id="bloc1" name="group_home3" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="alley1" name="alley3" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3" id="road1" name="road3" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="local1" name="local3" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3" id="district1" name="district3" />
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="province1" name="province3" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3" id="zip_code1" name="zip_code3" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="phone1" name="phone3" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">ประเภทที่อยู่</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="live_cate1" id="live_cate" name="live_cate1" value="บ้าน" /><span> บ้าน&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate1" id="live_cate" name="live_cate1" value="ทาวน์เฮาส์" /><span> ทาวน์เฮาส์&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate1" id="live_cate" name="live_cate1" value="คอนโดมิเนียม" /><span> คอนโดมิเนียม&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate1" id="live_cate" name="live_cate1" value="อพาร์ทเม้นท์หอพักแฟลต" /><span> อพาร์ทเม้นท์/หอพัก/แฟลต&nbsp;&nbsp;</span>
                                       <input type="radio"  id="live_cate1" name="live_cate1"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_cate3" name="live_cate1" disabled/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">สถานะการอยู่อาศัย</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="b" id="live_status2" name="live_status1" value="" /><span> เช่า&nbsp;</span><input type="text" id="live_status22" name="live_status1" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" class="b" id="live_status3" name="live_status1" value="" /><span> ผ่อน&nbsp;</span><input type="text" id="live_status33" name="live_status1" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" class='live_status1' id="live_status" name="live_status1" value="เป็นของตนเองปลอดภาระ"/><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>
                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class='live_status1' id="live_status" name="live_status1" value="เป็นของบุคคลอื่น"/><span> เป็นของบุคคลอื่น&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status1' id="live_status" name="live_status1" value="อาศัยอยู่กับบุตรหลานญาติ"/><span> อาศัยอยู่กับบุตรหลาน/ญาติ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status1' id="live_status" name="live_status1" value="บ้านพักสวัสดิการ"/><span> บ้านพักสวัสดิการ&nbsp;&nbsp;</span>
                                         <input type="radio" class="b" id="live_status4" name="live_status1" value=""/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status44" name="live_status1" disabled/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2">ความสัมพันธ์กับผู้กู้</label>
                           <div class="col-lg-10">
                           <input type="radio" name="relation" value="บุตร" /><span> บุตร&nbsp;&nbsp;</span>
                           <input type="radio" name="relation" value="ญาติ"/><span> ญาติ&nbsp;&nbsp;</span>
                           <input type="radio" name="relation" value="คนรู้จัก/เพื่อนบ้าน"/><span> คนรู้จัก/เพื่อนบ้าน&nbsp;&nbsp;</span>
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">อาชีพปัจจุบัน</label>
                           <input type="text" class="col-lg-3"   name="job_borrow" />
                           <label  class="col-lg-7 text-right"></label>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">ตำแหน่ง</label>
                           <input type="text" class="col-lg-3"   name="role" />
                           <label  class="col-lg-2 text-right">รายได้/เดือน</label>
                           <div class="col-lg-5">
                           <input type="text" class="col-lg-8" name="income_borrow" />
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">ชื่อบริษัท/สำนักงาน</label>
                           <input type="text" class="col-lg-3"  name="bname" />
                           <label  class="col-lg-2 text-right">เลขที่</label>
                           <div class="col-lg-5">
                           <input type="text" class="col-lg-8" name="address4"/>
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">อาคาร</label>
                           <input type="text" class="col-lg-3" name="village4" />
                           <label  class="col-lg-2 text-right">เลขที่ห้อง</label>
                           <div class="col-lg-5">
                           <input type="text" class="col-lg-8" name="room_number4"/>
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">ชั้น</label>
                           <input type="text" class="col-lg-3" name="room_floor4" />
                           <label  class="col-lg-2 text-right">หมู่ที่</label>
                           <div class="col-lg-5">
                           <input type="text" class="col-lg-8" name="group_home4"/>
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">ตรอก/ซอย</label>
                           <input type="text" class="col-lg-3"  name="alley4"/>
                           <label  class="col-lg-2 text-right">ถนน</label>
                           <div class="col-lg-5">
                           <input type="text" class="col-lg-8" name="road4"/>
                           </div>
                           <div class="col-lg-12"> <br />  </div>


                           <label class="col-lg-2 ">ตำบล/แขวง</label>
                           <input type="text" class="col-lg-3"  name="local4"/>
                           <label  class="col-lg-2 text-right">อำเภอ/เขต</label>
                           <div class="col-lg-5">
                           <input type="text" class="col-lg-8" name="district4"/>
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">จังหวัด</label>
                           <input type="text" class="col-lg-3" name="province4"  />
                           <label  class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                           <div class="col-lg-5">
                           <input type="text" class="col-lg-8" name="zip_code4"/>
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">โทรศัพท์ที่ทำงาน</label>
                           <input type="text" class="col-lg-3" name="phone_job" />
                           <label  class="col-lg-2 text-right">โทรศัพท์มือถือ</label>
                           <div class="col-lg-5">
                           <input type="text" class="col-lg-8" name="phone4"/>
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <div class="col-lg-12"> <br />  </div>
                           <div class="col-lg-12">

 <!-----------------------------------------------------------------------------------------------------------------------------------------------!--> 

                           <h4 style="font-weight:bold;">ข้อมูลอื่นๆ</h4>
                           <hr />
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-12 " style="color:red;" >กรณีเปลี่ยนชื่อ</label>
                           <label class="col-lg-2 ">ชื่อใหม่</label>
                           <input type="text" class="col-lg-3" name="newname" />
                           <label  class="col-lg-2 text-right">นามสกุล</label>
                           <div class="col-lg-5">
                           <input type="text" class="col-lg-8"  name="newsname"/>
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-12 " style="color:red;" >กรณีเสียชีวิต</label>
                           <div class="col-lg-10">
                           <input type="radio" name="life" value="ยังมีชีวิตอยู่" checked /><span> ยังมีชีวิตอยู่&nbsp;&nbsp;</span>
                           <input type="radio" name="life" value="เสียชีวิต" /><span> เสียชีวิต&nbsp;&nbsp;</span>
                           </div>
                           <div class="col-lg-12"> <br />  </div><div class="col-lg-12"> <br />  </div>


                           <h4><label class="col-lg-12 "  >ข้อมูลทายาท</label></h4>

                         <div class="col-lg-6">
                                           <label>เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text" id="id_p" name="id_p5" />
                                       </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp7" name="id_exp5"/>&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp8" name="id_exp5" value="ตลอดชีวิต"  />
                                           <span>ตลอดชีวิต</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="prefix2" id="prefix" name="prefix5" value="นาย" /><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix2" id="prefix" name="prefix5" value="นาง" /><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix2" id="prefix" name="prefix5" value="นางสาว" /><span> นางสาว&nbsp;&nbsp;</span>
                                       <input type="radio" id="prefix4" name="prefix5"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix5" name="prefix5" disabled />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ชื่อ</label>
                                       <input type="text" class="col-lg-3" id="name" name="name5"  />
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="surename" name="surename5" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ว/ด/ป เกิด</label>
                                       <input type="date" class="col-lg-3" id="dob" name="dob5" />
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3" id="address" name="address5" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="village" name="village5"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3"  id="room_number" name="room_number5" />
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="room_floor" name="room_floor5" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3" id="bloc" name="group_home5" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="allet" name="alley5" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3" id="road" name="road5" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="local" name="local5" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3" id="district" name="district5" />
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="province" name="province5" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3" id="zip_code" name="zip_code5" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="phone" name="phone5" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="check_live" name="check_live5" value="ที่เดี่ยวกับบัตรประชาชน" /><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" name="check_live5" value="ที่เดียวกับที่ปัจจุบัน" /><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" name="check_live5" value="อื่นๆ" /><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>

                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3" id="house_number1" name="address6" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="village1" name="village6" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3" id="room_number1" name="room_number6" />
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="room_floor1" name="room_floor6" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3" id="bloc1" name="group_home6" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="alley1" name="alley6" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3" id="road1" name="road6" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="local1" name="local6" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3" id="district1" name="district6" />
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="province1" name="province6" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3" id="zip_code1" name="zip_code6" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="phone1" name="phone6" />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

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
                                       <input type="radio" class="a" id="live_status21" name="live_status5" value="" /><span> เช่า&nbsp;</span><input type="text" id="live_status221" name="live_status5" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" class="a" id="live_status31" name="live_status5" value="" /><span> ผ่อน&nbsp;</span><input type="text" id="live_status331" name="live_status5" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" class='live_status2' id="live_status" name="live_statuS5" value="เป็นของตนเองปลอดภาระ"/><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>
                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class='live_status2' id="live_status" name="live_status5" value="เป็นของบุคคลอื่น"/><span> เป็นของบุคคลอื่น&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status2' id="live_status" name="live_status5" value="อาศัยอยู่กับบุตรหลานญาติ"/><span> อาศัยอยู่กับบุตรหลาน/ญาติ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status2' id="live_status" name="live_status5" value="บ้านพักสวัสดิการ"/><span> บ้านพักสวัสดิการ&nbsp;&nbsp;</span>
                                         <input type="radio" class="a" id="live_status41" name="live_status5" value=""/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status441" name="live_status5" disabled/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>







                                 {!! Form::hidden('c_live_status', null,['id' => 'c_live_status']) !!}
                                 {!! Form::hidden('c_live_status1', null,['id' => 'c_live_status1']) !!}
                                 {!! Form::hidden('c_live_status2', null,['id' => 'c_live_status2']) !!}
                                 {!! Form::hidden('category', null,['id' => 'category']) !!}
                                 {!! Form::hidden('class', null,['id' => 'class']) !!}




                                      <div class="form-group col-lg-12" >
                                        {{ link_to_route('service.create','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}                                       
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
              $('.b').val(1);
              $("#live_status22").prop('disabled', false);
              $("#live_status44").prop('disabled', true);
              $("#live_status44").val('');
              $("#live_status33").prop('disabled', true);
              $("#live_status33").val('');
          });
          $('#live_status3').on('click',function(){
               $('.b').val(2);
              $("#live_status33").prop('disabled', false);
              $("#live_status22").prop('disabled', true);
              $("#live_status44").prop('disabled', true);
              $("#live_status44").val('');
              $("#live_status22").val('');
          });
           $('#live_status4').on('click',function(){
               $('.b').val(3);
              $("#live_status44").prop('disabled', false);
              $("#live_status33").prop('disabled', true);
              $("#live_status33").val('');
              $("#live_status22").prop('disabled', true);
              $("#live_status22").val('');
          });
          $('.live_status1').on('click',function(){
              //alert(5);
              $('.b').val('');
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
              $('.a').val(1);
              $("#live_status221").prop('disabled', false);
              $("#live_status441").prop('disabled', true);
              $("#live_status441").val('');
              $("#live_status331").prop('disabled', true);
              $("#live_status331").val('');
          });
          $('#live_status31').on('click',function(){
               $('.a').val(2);
              $("#live_status331").prop('disabled', false);
              $("#live_status221").prop('disabled', true);
              $("#live_status441").prop('disabled', true);
              $("#live_status441").val('');
              $("#live_status221").val('');
          });
           $('#live_status41').on('click',function(){
               $('.a').val(3);
              $("#live_status441").prop('disabled', false);
              $("#live_status331").prop('disabled', true);
              $("#live_status331").val('');
              $("#live_status221").prop('disabled', true);
              $("#live_status221").val('');
          });
          $('.live_status2').on('click',function(){
              //alert(5);
              $('.a').val('');
              $("#live_status441").prop('disabled', true);
              $("#live_status441").val('');
              $("#live_status331").prop('disabled', true);
              $("#live_status331").val('');
              $("#live_status221").prop('disabled', true);
              $("#live_status221").val('');
          });
          

         $('#add1').click(function () {
              $('#c_live_status').val($('.c').val());
             $('#c_live_status1').val($('.b').val());
             $('#c_live_status2').val($('.a').val());
              $('#category').val(1);
               $('#class').val('borrow');
        });

    });

</script>
@stop
