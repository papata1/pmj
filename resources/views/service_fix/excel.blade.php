
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

$strExcelFileName="Member-All.xls";
header("Content-Type: application/vnd.ms-word");
header("Content-disposition: ");//attachment; filename=ข้อมูลผู้เข้ารับบริการ({$ser->name} {$ser->surename}).doc
header("Pragma:no-cache");

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<br><div width="185" align="center"  ><strong><u>ข้อมูลผู้เข้ารับบริการ</u></strong></div>

                                             <strong>ปีงบประมาณ :</strong>
                                             {{$ser->year}}
              
                                        <strong>วันที่ :</strong>
                                              {{$service->date}}

                                       <div class="col-lg-12">
                                       <h4 style="font-weight:bold;">ข้อมูลผู้ขอเข้ารับบริการ</h4></strong>
                                       </div>
                                           <strong> <label>เลขบัตรประชาชนประจำตัว :</label></strong>
                                          {{$ser->id_p}}
                                           <strong> <label>บัตรหมดอายุวันที่ :</label></strong>
                                           {{$ser->id_exp}}
                                       <div class="col-lg-12"> <br />  </div>

                                        <strong><label class="col-lg-2">คำนำหน้าชื่อ :</label></strong>
                                       {{$ser->prefix}}
                                        
                                        <strong><label class="col-lg-2 ">ชื่อ :</label></strong>
                                       {{$ser->name}}
                                        <strong><label  class="col-lg-2 text-right">นามสกุล :</label></strong>
                                       {{$ser->surename}}

                                        <strong><label class="col-lg-2 ">ว/ด/ป เกิด :</label></strong>
                                     {{$ser->dob}}
                                       <div class="col-lg-12"> <br />  </div>


                                        <strong><label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน :</label></strong><br />
                                       <div class="col-lg-12"> <br />  </div>
                                        <strong><label class="col-lg-2 ">บ้านเลขที่ :</label></strong>
                                      {{$ser->address}}
                                       <label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร :</label></strong>
                                       {{$ser->village}}

                                        <strong><label class="col-lg-2 ">เลขที่ห้อง :</label></strong>
                                      {{$ser->room_number}}
                                       <strong> <label  class="col-lg-2 text-right">ชั้น :</label></strong>
                                       {{$ser->room_floor}}

                                        <strong><label class="col-lg-2 ">หมู่ที่ :</label></strong>
                                       {{$ser->group_home}}
                                       <strong> <label  class="col-lg-2 text-right">ซอย :</label></strong>
                                      {{$ser->alley}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong> <label class="col-lg-2 ">ถนน :</label></strong>
                                      {{$ser->road}}
                                        <strong><label  class="col-lg-2 text-right">ตำบล/แขวง :</label></strong>
                                      {{$ser->local}}

                                        <strong><label class="col-lg-2 ">อำเภอ/เขต :</label></strong>
                                      {{$ser->district}}
                                       <strong> <label  class="col-lg-2 text-right">จังหวัด :</label></strong>
                                      {{$ser->province}}

                                       <strong> <label class="col-lg-2 ">รหัสไปรษณีย์ :</label></strong>
                                     {{$ser->zip_code}}
                                       <strong> <label  class="col-lg-2 text-right">โทรศัพท์ :</label></strong>
                                       {{$ser->phone}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน :</label><br />
                                       {{$service->check_live}}

                                       <div class="col-lg-12"> <br />  </div>
                                       <strong> <label class="col-lg-2 ">บ้านเลขที่ :</label></strong>
                                       {{$ser1->address}}
                                        <strong><label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร :</label></strong>
                                       {{$ser1->village}}

                                        <strong><label class="col-lg-2 ">เลขที่ห้อง :</label></strong>
                                       {{$ser1->room_number}}
                                       <strong> <label  class="col-lg-2 text-right">ชั้น :</label></strong>
                                       {{$ser1->room_floor}}

                                        <strong><label class="col-lg-2 ">หมู่ที่ :</label></strong>
                                      {{$ser1->group_home}}
                                        <strong><label  class="col-lg-2 text-right">ซอย :</strong>
                                      {{$ser1->alley}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong> <label class="col-lg-2 ">ถนน :</label></strong>
                                     {{$ser1->road}}
                                       <strong> <label  class="col-lg-2 text-right">ตำบล/แขวง :</label></strong>
                                      {{$ser1->local}}

                                        <strong><label class="col-lg-2 ">อำเภอ/เขต :</label></strong>
                                      {{$ser1->district}}
                                       <strong> <label  class="col-lg-2 text-right">จังหวัด :</label></strong>
                                       {{$ser1->province}}

                                       <strong> <label class="col-lg-2 ">รหัสไปรษณีย์ :</label></strong>
                                      {{$ser1->zip_code}}
                                       <strong> <label  class="col-lg-2 text-right">โทรศัพท์ :</label></strong>
                                       {{$ser1->phone}}
                                       <div class="col-lg-12"> <br />  </div>

                                        <strong><label class="col-lg-2">ประเภทที่อยู่ :</label></strong>
                                       {{$service->live_cate}}
                                       <div class="col-lg-12"> <br />  </div>

                                        <strong><label class="col-lg-2">สถานะการอยู่อาศัย :</label></strong>
                                       
                                        @if($service->c_live_status== 1 )
                                        เช่า&nbsp; {{$service->c_live_status}} บาท/เดือน&nbsp;&nbsp;
                                      @endif
                                       @if($service->c_live_status== 2 )
                                        ผ่อน&nbsp; {{$service->c_live_status}}บาท/เดือน&nbsp;&nbsp;
                                
                                       @endif                                      
                                       {{$service->live_status}}
                                       
                                          @if($service->c_live_status== 3 )
                                        อื่นๆ&nbsp;&nbsp; {{$service->c_live_status}}
                                         @else
                                         @endif
                                       
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong> <label class="col-lg-2">สถานภาพ :</label></strong>
                                       {{$service->m_status}}
                                       <div class="col-lg-12"> <br />  </div>

                                       
                                          <strong>  <label>เลขบัตรประชาชนประจำตัว :</label></strong>
                                          {{$ser1->id_p}}
                                       <strong>   <label>บัตรหมดอายุวันที่ :</label></strong>
                                          {{$ser1->id_exp}}
                                       <div class="col-lg-12"> <br />  </div>

                                      <strong>  <label class="col-lg-2">คำนำหน้าชื่อ :</label></strong>
                                       {{$ser1->prefix}}

                                        <strong><label class="col-lg-2 ">สามีหรือภรรยาชื่อ :</label></strong>
                                      {{$ser1->name}}
                                        <strong><label  class="col-lg-2 text-right">นามสกุล :</label></strong>
                                      {{$ser1->surename}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong> <label class="col-lg-2 ">อาชีพปัจจุบัน :</label></strong>
                                       {{$ser1->job}}
                                       <strong> <label  class="col-lg-2 text-right">รายได้/เดือน :</label> </strong>
                                       {{$ser1->income}}
                                       <div class="col-lg-12"> <br />  </div>

<?php


?>

</div>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>
