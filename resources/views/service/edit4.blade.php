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
                                         <form role="form">

                                           <div class="form-group">
                                             <label>ปีงบประมาณ</label>
                                             <select >
                                               <option>2560</option>
                                               <option>2559</option>
                                               <option>2558</option>
                                             </select>
                                           </div>

                                           <div >
                                               <label>วันที่</label>
                                               <input type="date"  />
                                           </div>
                                           <br />
                                           <div class="col-lg-12"> <br />  </div>

                                      <h4 style="font-weight:bold;">ข้อมูลเรื่องที่ขอรับบริการ</h4>
                                      <hr />
                                      <div class="col-lg-12"> <br />  </div>

                                      <div class="form-group col-lg-6">
                                            <label>ประเภท/ลักษณะงานที่มาขอรับบริการ</label>
                                            <select id="CaseCtrl" name="ChooseCase" class="form-control">
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
                                           <input class="form-control" name="status" id="status" type="text" placeholder="">
                                    </div>









                                       <div class="col-lg-12">
                                       <h4 style="font-weight:bold;">ข้อมูลผู้ขอเข้ารับบริการ</h4>
                                       <hr />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div class="col-lg-6">
                                           <label>เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text"  />
                                           <input type="button" value="ตรวจสอบกับระบบ" />
                                       </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  />&nbsp;&nbsp;
                                           <input type="radio"  />
                                           <span>ตลอดชีวิต</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" name="gender"  /><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> นางสาว&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text"  />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ชื่อ</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"  />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ว/ด/ป เกิด</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">อายุ</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8" disabled="" value=""/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>


                                       <label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน</label>
                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน</label>
                                       <div class="col-lg-10">
                                       <input type="radio" name="gender"  /><span> ที่เดี่ยวกับบัตรประชาชน&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> ที่เดียวกับที่ปัจจุบัน&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> อื่นๆ&nbsp;&nbsp;</span>
                                       </div>

                                       <div class="col-lg-12"> <br />  </div>
                                       <label class="col-lg-2 ">บ้านเลขที่</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">เลขที่ห้อง</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">ชั้น</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">หมู่ที่</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">ซอย</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">ถนน</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">ตำบล/แขวง</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อำเภอ/เขต</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">จังหวัด</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">รหัสไปรษณีย์</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">โทรศัพท์</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">ประเภทที่อยู่</label>
                                       <div class="col-lg-10">
                                       <input type="radio" name="gender"  /><span> บ้าน&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> ทาวน์เฮาส์&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> คอนโดมิเนียม&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> อพาร์ทเม้นท์/หอพัก/แฟลต&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text"  />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">สถานะการอยู่อาศัย</label>
                                       <div class="col-lg-10">
                                       <input type="radio" name="gender"  /><span> เช่า&nbsp;</span><input type="text"  /> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" name="gender" /><span> ผ่อน&nbsp;</span><input type="text"  /> บาท/เดือน&nbsp;&nbsp;
                                       <input type="radio" name="gender" /><span> เป็นของตนเองปลอดภาระ&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>
                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-10">
                                         <input type="radio" name="gender" /><span> เป็นของบุคคลอื่น&nbsp;&nbsp;</span>
                                         <input type="radio" name="gender" /><span> อาศัยอยู่กับบุตรหลาน/ญาติ&nbsp;&nbsp;</span>
                                         <input type="radio" name="gender" /><span> บ้านพักสวัสดิการ&nbsp;&nbsp;</span>
                                         <input type="radio" name="gender" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text"  />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">สถานภาพ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" name="status"  /> <span> โสด&nbsp;&nbsp;</span>
                                       <input type="radio" name="status" /> <span> สมรส&nbsp;</span>
                                       <input type="radio" name="status" /><span> อยู่ด้วยกันโดยไม่จดทะเบียนสมรส&nbsp;&nbsp;</span>
                                       <input type="radio" name="status" /><span> หย่าร้าง&nbsp;&nbsp;</span>
                                       <input type="radio" name="status" /><span> หม้าย&nbsp;&nbsp;</span>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <div class="col-lg-6">
                                           <label>เลขบัตรประชาชนประจำตัว</label>
                                           <input type="text"  />
                                           <input type="button" value="ตรวจสอบกับระบบ" />
                                       </div>
                                       <div class="col-lg-6">
                                           <label>บัตรหมดอายุวันที่</label>
                                           <input type="date"  />&nbsp;&nbsp;
                                           <input type="radio"  />
                                           <span>ตลอดชีวิต</span>

                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2">คำนำหน้าชื่อ</label>
                                       <div class="col-lg-10">
                                       <input type="radio" name="gender"  /><span> นาย&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> นาง&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> นางสาว&nbsp;&nbsp;</span>
                                       <input type="radio" name="gender" /><span> อื่นๆ&nbsp;&nbsp;</span>    <input type="text"  />
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">สามีหรือภรรยาชื่อ</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">นามสกุล</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 ">อาชีพปัจจุบัน</label>
                                       <input type="text" class="col-lg-3"  />
                                       <label  class="col-lg-2 text-right">รายได้/เดือน</label>
                                       <div class="col-lg-5">
                                       <input type="text" class="col-lg-8"/>
                                       </div>
                                       <div class="col-lg-12"> <br />  </div>





                                      <div class="form-group col-lg-12" >
                                                     <input type="button" class="btn btn-danger" value="ค่าเริ่มต้น"/>
                                                     <input type="button" class="btn btn-primary" value="บันทึก"/>
                                      </div>

                                    </form>

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
@stop
