@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')

    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ลงทะเบียนผู้กู้ยืมเงินผู้สูงอายุ</h1>
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

                                        {!! Form::open(array('route'=>'Fund_borrowing.store','class' => 'form',
                                        'novalidate' => 'novalidate',
                                        'files' => true)) !!}

                                           <div class="form-group">
                                            @if($errors->any())
                                    <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    @endif
                                             <label class="col-lg-2">ปีงบประมาณ<label  style="color:red">*</label></label>
                                             <div class="col-lg-3">
                                              {!! Form::select('year',['' => ''] + $year, null, ['class' => 'form-control']) !!}
                                            </div>
                                           </div>

                                               <label class="col-lg-1">วันที่<label  style="color:red">*</label></label>
                                               <input type="date" id="date" name="date" class="col-lg-3" />
                                           <br />
                                           <div class="col-lg-12"> <br />  </div>

                                      <div class="col-lg-12"><h4 style="font-weight:bold;">ผู้ยื่นกู้</h4><hr /></div>
                                      <div class="col-lg-12"> </div>
                                        <label class="col-lg-2 ">ประเภทกองทุน</label>
                                        <div class="col-md-3">
                                        <select name="debt_cat" class="form-control">
                                            <option value="รายบุคคล">รายบุคคล</option>
                                            <option value="รายกลุ่ม">รายกลุ่ม</option>
                                        </select>
                                        </div>
                                        <div class="col-lg-7"> <br />  </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div class="col-lg-6">
                                          <label >เลขบัตรประชาชนประจำตัว<label  style="color:red">*</label></label>
                                          <input type="text"  id="id_p_b" name="id_p"   />
                                            <button  value="ตรวจสอบ" id="ck_id" type="button" ><i >ตรวจสอบ</i></button>
                                          </div>
                                          <div class="col-lg-6" >
                                           <label >บัตรหมดอายุวันที่<label  style="color:red">*</label></label>
                                           <input type="date"  id="id_exp" name="id_exp"  />&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp1" name="id_exp" value="ตลอดชีวิต"  />
                                           <span>ตลอดชีวิต</span>
                                         </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ<label  style="color:red">*</label></label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นาย" /><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นาง" /><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix" id="prefix" name="prefix" value="นางสาว" /><span> นางสาว&nbsp;&nbsp;</span>
                                       <input type="radio" id="prefix1" name="prefix"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix11" name="prefix" disabled />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-1 ">ชื่อ<label  style="color:red">*</label></label>
                                       <input type="text" class="col-lg-2" id="name" name="name"  />
                                       <div class="col-lg-1"></div>
                                       <label  class="col-lg-1 text-right">นามสกุล</label>
                                       <input type="text" class="col-lg-2" id="surename" name="surename" />
                                       <div class="col-lg-1"></div>
                                       <label class="col-lg-1 ">วันเกิด</label>
                                       <input type="date" class="col-lg-3" id="dob" name="dob" />
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
                                       <input type="text" class="col-lg-2" id="zone" name="local" />
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
                                       <input type="radio" id="check_live_0"  name="check_live" value="ที่เดียวกับที่ปัจจุบัน" checked/><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" class="check_live" name="check_live" value="อื่นๆ" /><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                        <div id="change">

                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-2" id="address1" name="address1" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village1" name="village1" />
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2" id="room_number1" name="room_number1" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor1" name="room_floor1" />
                                       <label class="col-lg-2 text-right ">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc1" name="group_home1" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="alley1" name="alley1" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road1" name="road1" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone1" name="local1" />
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2" id="district1" name="district1" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province1" name="province1" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code1" name="zip_code1" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone1" name="phone1" />
                                       <div class="col-lg-12"> <br />  </div>

                                       </div>

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
                                       </div>

                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="เป็นของตนเองปลอดภาระ"/><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="เป็นของบุคคลอื่น"/><span> เป็นของบุคคลอื่น&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="อาศัยอยู่กับบุตรหลานญาติ"/><span> อาศัยอยู่กับบุตรหลาน/ญาติ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status' id="live_status" name="live_status" value="บ้านพักสวัสดิการ"/><span> บ้านพักสวัสดิการ&nbsp;&nbsp;</span>
                                      </div>

                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                       <input type="radio" class="c" id="live_status111" name="live_status" value="3"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status14" name="c_live_status" disabled/>
                                      </div>

                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 ">อาชีพปัจจุบัน</label>
                                       <input type="text" class="col-lg-3" id="job" name="job_borrow" />
                                       <label  class="col-lg-2 text-right">รายได้/เดือน</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" id="income" name="income_borrow"/>
                                       </div>
                                        <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 " style="color:blue">สถานภาพ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="s_status" name="m_status" checked value="โสด"/> <span> โสด&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" class="ck_s" name="m_status"  value="สมรส"/> <span> สมรส&nbsp;</span>
                                       <input type="radio" id="m_status" class="ck_s" name="m_status"  value="อยู่ด้วยกันโดยไม่จดทะเบียนสมรส"/><span> อยู่ด้วยกันโดยไม่จดทะเบียนสมรส&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" class="ck_s" name="m_status"  value="หย่าร้าง"/><span> หย่าร้าง&nbsp;&nbsp;</span>
                                       <input type="radio" id="m_status" class="ck_s" name="m_status"  value="หม้าย"/><span> หม้าย&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div id="s">


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
                                       </div>

                                        <div class="col-lg-12"> <br />  </div>


                                        <label class="col-lg-5" style="color:blue">ประสงค์จะขอกู้ยืมเงินกองทุนผู้สูงอายุเป็นจำนวนเงิน<label  style="color:red">*</label></label>
                                        <input type="text" class="col-lg-3" name="money"  />
                                        <label class="col-lg-4" >บาท</label>
                                        <div class="col-lg-12"> <br />  </div>

                                        <label class="col-lg-3" style="color:blue">เพื่อนำไปประกอบอาชีพ<label  style="color:red">*</label></label>
                                        <input list="browsers" name="forwhat"class="col-lg-3" />
                                            <datalist id="browsers">
                                            <option value="ปศุสัตว์">
                                            <option value="เกษตรกรรม">
                                            <option value="ค้าขาย">
                                            <option value="หัตถกรรม">
                                            <option value="รับจ้าง/บริการ ">
                                            </datalist>
                                         <label  class="col-lg-2 text-right">รายละเอียดอาชีพ</label>
                                       <input type="text" class="col-lg-3"  name="job_remark" />
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

                                      <div class="col-lg-6" >
                                           <label >เลขบัตรประชาชนประจำตัว<label  style="color:red">*</label></label>
                                           <input type="text" id="id_p_b1" name="id_p2" />

                                            <button  value="ตรวจสอบ" id="ck_id1" type="button" ><i >ตรวจสอบ</i></button>
                                          </div>

                                       <div class="col-lg-6">
                                           <label >บัตรหมดอายุวันที่</label>
                                           <input type="date"  id="id_exp5" name="id_exp2"/>&nbsp;&nbsp;
                                           <input type="checkbox" id="id_exp6" name="id_exp2" value="ตลอดชีวิต"  />
                                           <span>ตลอดชีวิต</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ<label  style="color:red">*</label></label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="prefix1" id="prefix" name="prefix2" value="นาย" /><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix1" id="prefix" name="prefix2" value="นาง" /><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" class="prefix1" id="prefix" name="prefix2" value="นางสาว" /><span> นางสาว&nbsp;&nbsp;</span>
                                       <input type="radio" id="prefix2" name="prefix2"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="prefix3" name="prefix" disabled />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-1 ">ชื่อ<label  style="color:red">*</label></label>
                                       <input type="text" class="col-lg-2" id="name" name="name2"  />
                                       <div class="col-lg-1"></div>
                                       <label  class="col-lg-1 text-right">นามสกุล</label>
                                       <input type="text" class="col-lg-2" id="surename" name="surename2" />
                                       <div class="col-lg-1"></div>
                                       <label class="col-lg-1 ">วันเกิด</label>
                                       <input type="date" class="col-lg-3" id="dob" name="dob2" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-2" id="address" name="address2" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village" name="village2"/>
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2"  id="room_number" name="room_number2" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor" name="room_floor2" />
                                       <label class="col-lg-2 text-right">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc" name="group_home2" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="allet" name="alley2" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road" name="road2" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone" name="local2" />
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2 " id="district" name="district2" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province" name="province2" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code" name="zip_code2" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone" name="phone2" />
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="check_live" class="check_live1" name="check_live1" value="ที่เดี่ยวกับบัตรประชาชน" /><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live_1"  name="check_live1" value="ที่เดียวกับที่ปัจจุบัน" checked/><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" class="check_live1" name="check_live1" value="อื่นๆ" /><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>


                                      <div id="change1">

                                        <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-2" id="address1" name="address3" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village1" name="village3" />
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2" id="room_number1" name="room_number3" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor1" name="room_floor3" />
                                       <label class="col-lg-2 text-right ">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc1" name="group_home3" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="alley1" name="alley3" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road1" name="road3" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone1" name="local3" />
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2" id="district1" name="district3" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province1" name="province3" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code1" name="zip_code3" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone1" name="phone3" />
                                       <div class="col-lg-12"> <br />  </div>





                                       </div>



                                       <label class="col-lg-2">ประเภทที่อยู่</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="live_cate7" id="live_cate" name="live_cate1" value="บ้าน" /><span> บ้าน&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate7" id="live_cate" name="live_cate1" value="ทาวน์เฮาส์" /><span> ทาวน์เฮาส์&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate7" id="live_cate" name="live_cate1" value="คอนโดมิเนียม" /><span> คอนโดมิเนียม&nbsp;&nbsp;</span>
                                       <input type="radio" class="live_cate7" id="live_cate" name="live_cate1" value="อพาร์ทเม้นท์หอพักแฟลต" /><span> อพาร์ทเม้นท์/หอพัก/แฟลต&nbsp;&nbsp;</span>
                                       <input type="radio"  id="live_cate6" name="live_cate1"  /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_cate66" name="live_cate1" disabled/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">สถานะการอยู่อาศัย</label>
                                       <div class="col-lg-10">
                                       <input type="radio" class="b" id="live_status2" name="live_status1" value="1" /><span> เช่า&nbsp;</span><input type="text" id="live_status22" name="c_live_status1" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" class="b" id="live_status3" name="live_status1" value="2" /><span> ผ่อน&nbsp;</span><input type="text" id="live_status33" name="c_live_status1" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       </div>

                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class='live_status1' id="live_status" name="live_status1" value="เป็นของตนเองปลอดภาระ"/><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status1' id="live_status" name="live_status1" value="เป็นของบุคคลอื่น"/><span> เป็นของบุคคลอื่น&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status1' id="live_status" name="live_status1" value="อาศัยอยู่กับบุตรหลานญาติ"/><span> อาศัยอยู่กับบุตรหลาน/ญาติ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status1' id="live_status" name="live_status1" value="บ้านพักสวัสดิการ"/><span> บ้านพักสวัสดิการ&nbsp;&nbsp;</span>
                                       </div>

                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class="b" id="live_status4" name="live_status1" value="3"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status44" name="c_live_status1" disabled/>
                                      </div>
                                       <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2">สัมพันธ์กับผู้กู้</label>
                           <div class="col-lg-10">
                           <input type="radio" name="relation" value="บุตร" /><span> บุตร&nbsp;&nbsp;</span>
                           <input type="radio" name="relation" value="ญาติ"/><span> ญาติ&nbsp;&nbsp;</span>
                           <input type="radio" name="relation" value="คนรู้จัก/เพื่อนบ้าน"/><span> คนรู้จัก/เพื่อนบ้าน&nbsp;&nbsp;</span>
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">อาชีพปัจจุบัน</label>
                           <input type="text" class="col-lg-2"   name="job1" />
                           <label class="col-lg-2 text-right">ตำแหน่ง</label>
                           <input type="text" class="col-lg-2"   name="role" />
                           <label  class="col-lg-2 text-right">รายได้/เดือน</label>
                           <input type="text" class="col-lg-2" name="income1" />
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">ชื่อสำนักงาน</label>
                           <input type="text" class="col-lg-2"  name="bname" />
                           <label  class="col-lg-2 text-right">เลขที่</label>
                           <input type="text" class="col-lg-2" name="address4"/>
                           <label class="col-lg-2 text-right">อาคาร</label>
                           <input type="text" class="col-lg-2" name="village4" />
                           <div class="col-lg-12"> <br />  </div>

                           <label  class="col-lg-2 ">เลขที่ห้อง</label>
                           <input type="text" class="col-lg-2" name="room_number4"/>
                           <label class="col-lg-2 text-right">ชั้น</label>
                           <input type="text" class="col-lg-2" name="room_floor4" />
                           <label  class="col-lg-2 text-right">หมู่ที่</label>
                           <input type="text" class="col-lg-2" name="group_home4"/>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">ตรอก/ซอย</label>
                           <input type="text" class="col-lg-2"  name="alley4"/>
                           <label  class="col-lg-2 text-right">ถนน</label>
                           <input type="text" class="col-lg-2" name="road4"/>
                           <label class="col-lg-2 text-right">ตำบล/แขวง</label>
                           <input type="text" class="col-lg-2"  name="local4"/>
                           <div class="col-lg-12"> <br />  </div>

                           <label  class="col-lg-2 ">อำเภอ/เขต</label>
                           <input type="text" class="col-lg-2" name="district4"/>
                           <label class="col-lg-2 text-right">จังหวัด</label>
                           <input type="text" class="col-lg-2" name="province4"  />
                           <label  class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                           <input type="text" class="col-lg-2" name="zip_code4"/>
                           <div class="col-lg-12"> <br />  </div>

                           <label class="col-lg-2 ">โทรศัพท์ที่ทำงาน</label>
                           <input type="text" class="col-lg-2" name="phone_job" />
                           <label  class="col-lg-2 text-right">โทรศัพท์มือถือ</label>
                           <input type="text" class="col-lg-2" name="phone4"/>
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

                                       <label class="col-lg-1 ">ชื่อ</label>
                                       <input type="text" class="col-lg-2" id="name" name="name5"  />
                                       <div class="col-lg-1"></div>
                                       <label  class="col-lg-1 text-right">นามสกุล</label>
                                       <input type="text" class="col-lg-2" id="surename" name="surename5" />
                                       <div class="col-lg-1"></div>
                                       <label class="col-lg-1 ">วันเกิด</label>
                                       <input type="date" class="col-lg-3" id="dob" name="dob5" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-2" id="house_number" name="address5" />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <input type="text" class="col-lg-2" id="village" name="village5"/>
                                       <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-2"  id="room_number" name="room_number5" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2 ">ชั้น</label>
                                       <input type="text" class="col-lg-2" id="room_floor" name="room_floor5" />
                                       <label class="col-lg-2 text-right">หมู่ที่</label>
                                       <input type="text" class="col-lg-2" id="bloc" name="group_home5" />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <input type="text" class="col-lg-2" id="allet" name="alley5" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-2" id="road" name="road5" />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <input type="text" class="col-lg-2" id="zone" name="zone5" />
                                       <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-2 " id="district" name="district5" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label  class="col-lg-2">จังหวัด</label>
                                       <input type="text" class="col-lg-2" id="province" name="province5" />
                                       <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-2" id="zip_code" name="zip_code5" />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <input type="text" class="col-lg-2" id="phone" name="phone5" />
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" id="check_live" class="check_live2" name="check_live5" value="ที่เดี่ยวกับบัตรประชาชน" /><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live_2" name="check_live5" value="ที่เดียวกับที่ปัจจุบัน" checked /><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" id="check_live" class="check_live2" name="check_live5" value="อื่นๆ" /><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>



                                       <div id="change2">


                                         <label class="col-lg-2 ">บ้านเลขที่</label>
                                         <input type="text" class="col-lg-2" id="house_number" name="address6" />
                                         <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                         <input type="text" class="col-lg-2" id="village" name="village6"/>
                                         <label class="col-lg-2 text-right">เลขที่ห้อง</label>
                                         <input type="text" class="col-lg-2"  id="room_number" name="room_number6" />
                                         <div class="col-lg-12"> <br />  </div>

                                         <label  class="col-lg-2 ">ชั้น</label>
                                         <input type="text" class="col-lg-2" id="room_floor" name="room_floor6" />
                                         <label class="col-lg-2 text-right">หมู่ที่</label>
                                         <input type="text" class="col-lg-2" id="bloc" name="group_home6" />
                                         <label  class="col-lg-2 text-right">ซอย</label>
                                         <input type="text" class="col-lg-2" id="allet" name="alley6" />
                                         <div class="col-lg-12"> <br />  </div>

                                         <label class="col-lg-2 ">ถนน</label>
                                         <input type="text" class="col-lg-2" id="road" name="road6" />
                                         <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                         <input type="text" class="col-lg-2" id="zone" name="zone6" />
                                         <label class="col-lg-2 text-right">อำเภอ/เขต</label>
                                         <input type="text" class="col-lg-2 " id="district" name="district6" />
                                         <div class="col-lg-12"> <br />  </div>

                                         <label  class="col-lg-2">จังหวัด</label>
                                         <input type="text" class="col-lg-2" id="province" name="province6" />
                                         <label class="col-lg-2 text-right">รหัสไปรษณีย์</label>
                                         <input type="text" class="col-lg-2" id="zip_code" name="zip_code6" />
                                         <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                         <input type="text" class="col-lg-2" id="phone" name="phone6" />
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
                                       <input type="radio" class="a" id="live_status21" name="live_status5" value="1" /><span> เช่า&nbsp;</span><input type="text" id="live_status221" name="c_live_status2" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" class="a" id="live_status31" name="live_status5" value="2" /><span> ผ่อน&nbsp;</span><input type="text" id="live_status331" name="c_live_status2" disabled/> บาท/เดือน&nbsp;&nbsp;
                                       </div>

                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class='live_status2' id="live_status" name="live_statuS5" value="เป็นของตนเองปลอดภาระ"/><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status2' id="live_status" name="live_status5" value="เป็นของบุคคลอื่น"/><span> เป็นของบุคคลอื่น&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status2' id="live_status" name="live_status5" value="อาศัยอยู่กับบุตรหลานญาติ"/><span> อาศัยอยู่กับบุตรหลาน/ญาติ&nbsp;&nbsp;</span>
                                         <input type="radio" class='live_status2' id="live_status" name="live_status5" value="บ้านพักสวัสดิการ"/><span> บ้านพักสวัสดิการ&nbsp;&nbsp;</span>
                                       </div>

                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" class="a" id="live_status41" name="live_status5" value="3"/><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text" id="live_status441" name="c_live_status2" disabled/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>





                                 {!! Form::hidden('category', null,['id' => 'category']) !!}
                                 {!! Form::hidden('class', null,['id' => 'class']) !!}




                                      <div class="form-group col-lg-12" >
                                        {!! Form::button('ลงทะเบียนผู้กู้ยืม',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                                      </div>


                                    {!! Form::close() !!}

                                   </div>
                                   <!-- /.panel-body -->

                                  </div>
                           </div>
                       <!-- /.row -->

                        </div>
                       </div>
                       <!-- /.row -->

                   </div>
                   <!-- /#page-wrapper -->


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
             // $('.c').val(1);
              $("#live_status12").prop('disabled', false);
              $("#live_status14").prop('disabled', true);
              $("#live_status14").val('');
              $("#live_status13").prop('disabled', true);
              $("#live_status13").val('');
          });
          $('#live_status11').on('click',function(){
              // $('.c').val(2);
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
            //  $('.c').val('');
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

           $('#live_cate6').on('click',function(){
              $("#live_cate66").prop('disabled', false);
          });
           $('.live_cate7').on('click',function(){
              $("#live_cate66").val('');
              $("#live_cate66").prop('disabled', true);
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
            //   $('.b').val(2);
              $("#live_status33").prop('disabled', false);
              $("#live_status22").prop('disabled', true);
              $("#live_status44").prop('disabled', true);
              $("#live_status44").val('');
              $("#live_status22").val('');
          });
           $('#live_status4').on('click',function(){
             //  $('.b').val(3);
              $("#live_status44").prop('disabled', false);
              $("#live_status33").prop('disabled', true);
              $("#live_status33").val('');
              $("#live_status22").prop('disabled', true);
              $("#live_status22").val('');
          });
          $('.live_status1').on('click',function(){
              //alert(5);
            //  $('.b').val('');
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
             // $('.a').val(1);
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
             // $('.a').val('');
              $("#live_status441").prop('disabled', true);
              $("#live_status441").val('');
              $("#live_status331").prop('disabled', true);
              $("#live_status331").val('');
              $("#live_status221").prop('disabled', true);
              $("#live_status221").val('');
          });


         $('#add1').click(function () {
              //$('#c_live_status').val($('.c').val());

              $('#category').val(1);
               $('#class').val('borrow');
        });

//-----------------------------------------------------------------------------------------------

        $('#change').hide();
        $('#change1').hide();
        $('#change2').hide();

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

//-------------------------------------------------------------------------
$('#s').hide();
    $('#s_status').on('click',function(){
           $('#s').hide();
         });

         $('.ck_s').on('click',function(){
            $('#s').show();
        });


function isNumber(obj) { return !isNaN(parseFloat(obj)) };

        var val = <?php echo json_encode($ser1 ); ?>;
        var c = val.length;
        $('#ck_id').on('click',function(){
            var a = $('#id_p_b').val();
            var c1 = 0;
            if(a.length == 13){
            for (i = 0; i < val.length; i++) {
              if(val[i] == $('#id_p_b').val()){
                    $('#id_p_b').val('');
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

          var val1 = <?php echo json_encode($ser1 ); ?>;
        var c1 = val1.length;
        $('#ck_id1').on('click',function(){
            var a1 = $('#id_p_b1').val();
            var c11 = 0;
            if(a1.length == 13){
            for (i = 0; i < val.length; i++) {
              if(val1[i] == $('#id_p_b1').val()){
                    $('#id_p_b1').val('');
                    alert('หมายเลขบัตรประชาชนนี้ถูกใช้งานไปแล้ว');
                   // c1++;
              }else{
                  c11++;
                  if(c11 == c1){
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
