
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

header("Content-type: application/vnd.ms-word");
header("Content-Disposition:attachment;Filename=ข้อมูลส่วนบุคคลผู้กู้({$service->name} {$service->surename}).doc  ");//
header("Pragma:no-cache");

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<br><div width="185" align="center"  ><strong><u>ข้อมูลส่วนบุคคลผู้กู้</u></strong></div>

                                       <strong> <label>ปีงบประมาณ  :</label></strong>
                                            {{$service->year}}   
                                             <strong>  วันที่  : </strong>
                                               {{$service->date}}
<br>
                                      <h4 style="font-weight:bold;"><u>1.ผู้ยื่นกู้</u></h4>
                                      <div class="col-lg-12"> </div>
                                       <strong> <label class="col-lg-2 ">ประเภทกองทุน :</label></strong>
                                        {{$service->debt_cat}}
                                           <strong>เลขบัตรประชาชนประจำตัว</strong>
                                           {{$service->id_p}}
                                       <strong>    บัตรหมดอายุวันที่ :</strong>
                                           {{$service->id_exp}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2">คำนำหน้าชื่อ  :</label></strong>
                                     
                                        {{$ser->prefix}}
                                       
                                       <strong><label class="col-lg-2 ">ชื่อ  :</label></strong>
                                      {{$service->name}}
                                       <strong><label  class="col-lg-2 text-right">นามสกุล  :</label></strong>
                                     {{$service->surename}}"

                                       <strong><label class="col-lg-2 ">ว/ด/ป เกิด  :</label></strong>
                                       {{$service->dob}}
                                       <div class="col-lg-12"> <br />  </div>


                                       <strong><u><label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน  :</label></u></strong>
                                       <div class="col-lg-12"> <br />  </div>
                                      <strong> <label class="col-lg-2 ">บ้านเลขที่  :</label></strong>
                                       {{$service->address}}
                                       <strong><label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร  :</label></strong>
                                      {{$service->village}}

                                     <strong><label class="col-lg-2 ">เลขที่ห้อง  :</label></strong>
                                       {{$service->room_number}}
                                       <strong><label  class="col-lg-2 text-right">ชั้น  :</label></strong>
                                       {{$service->room_floor}}

                                      <strong> <label class="col-lg-2 ">หมู่ที่  :</label></strong>
                                      {{$service->group_home}}
                                       <strong><label  class="col-lg-2 text-right">ซอย  :</label></strong>
                                      {{$service->alley}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2 ">ถนน  :</label></strong>
                                      {{$service->road}}
                                       <strong><label  class="col-lg-2 text-right">ตำบล/แขวง  :</label></strong>
                                      {{$service->local}}

                                       <strong><label class="col-lg-2 ">อำเภอ/เขต  :</label></strong>
                                       {{$service->district}}
                                       <strong><label  class="col-lg-2 text-right">จังหวัด  :</label></strong>
                                       {{$service->province}}

                                       <strong><label class="col-lg-2 ">รหัสไปรษณีย์  :</label></strong>
                                       {{$service->zip_code}}
                                       <strong><label  class="col-lg-2 text-right">โทรศัพท์  :</label></strong>
                                       {{$service->phone}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน  :</label></strong>
                                       {{$service->check_live}}<br />

                                       <div class="col-lg-12"> <br />  </div>
                                       <strong> <label class="col-lg-2 ">บ้านเลขที่  :</label></strong>
                                       {{$ser->address}}
                                       <strong><label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร  :</label></strong>
                                      {{$ser->village}}

                                      <strong> <label class="col-lg-2 ">เลขที่ห้อง  :</label></strong>
                                       {{$ser->room_number}}
                                       <strong><label  class="col-lg-2 text-right">ชั้น  :</label></strong>
                                       {{$ser->room_floor}}

                                       <strong><label class="col-lg-2 ">หมู่ที่  :</label></strong>
                                      {{$ser->group_home}}
                                      <strong> <label  class="col-lg-2 text-right">ซอย  :</label></strong>
                                      {{$ser->alley}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2 ">ถนน  :</label></strong>
                                      {{$ser->road}}
                                       <strong><label  class="col-lg-2 text-right">ตำบล/แขวง  :</label></strong>
                                      {{$ser->local}}

                                     <strong><label class="col-lg-2 ">อำเภอ/เขต  :</label></strong>
                                       {{$ser->district}}
                                       <strong><label  class="col-lg-2 text-right">จังหวัด  :</label></strong>
                                       {{$ser->province}}

                                      <strong><label class="col-lg-2 ">รหัสไปรษณีย์  :</label></strong>
                                       {{$ser->zip_code}}
                                       <div class="col-lg-12"> <br />  </div>

                                      <strong><label class="col-lg-2">ประเภทที่อยู่ :</label></strong>
                                      {{$service->live_cate}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2">สถานะการอยู่อาศัย :</label></strong>
                                      @if($service->live_status== 1 )
                                       เช่า :{{$service->c_live_status}}บาท/เดือน
 เช่า                                       @endif
                                       @if($service->live_status== 2 )
                                      ผ่อน :{{$service->c_live_status}}เดือน&nbsp;&nbsp;
                                      ผ่อน
                                       @endif                                      
                                       {{$service->live_status}}
                                          @if($service->live_status== 3)
                                        อื่นๆ :{{$service->c_live_status}}
                                         @endif
                  
                                       <div class="col-lg-12"> <br />  </div>


                                       <strong><label class="col-lg-2 ">อาชีพปัจจุบัน  :</label></strong>
                                      {{$ser->job_borrow}}
                                      <strong><label  class="col-lg-2 text-right">รายได้/เดือน :</label></strong>
                                       {{$ser->income_borrow}}"
                                        <div class="col-lg-12"> <br />  </div>


                                      <strong> <label class="col-lg-2">สถานภาพ :</label></strong>
                                       {{$service->m_status}}
                                        <h4 style="font-weight:bold;"><u>2.คู่สมรส</u></h4>
                                       <div class="col-lg-6">
                                           <strong>เลขบัตรประชาชนประจำตัว</strong>
                                           {{$ser->id_p}}
                                       <strong>    บัตรหมดอายุวันที่ :</strong>
                                           {{$ser->id_exp}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2">คำนำหน้าชื่อ  :</label></strong>
                                     
                                        {{$ser->prefix}}
                                       
                                       <strong><label class="col-lg-2 ">ชื่อ  :</label></strong>
                                      {{$ser->name}}
                                       <strong><label  class="col-lg-2 text-right">นามสกุล  :</label></strong>
                                     {{$ser->surename}}"

                                       <strong><label class="col-lg-2 ">ว/ด/ป เกิด  :</label></strong>
                                       {{$ser->dob}}
                                       <div class="col-lg-12"> <br />  </div>


                                        <strong><label class="col-lg-2 ">อาชีพปัจจุบัน :</label>
                                      {{$ser->job}}<br /> 
                                      <strong> <label  class="col-lg-2 text-right">รายได้/เดือน :</label>
                                       {{$ser->income}}

                                      <h4 style="font-weight:bold;"><u>3.ข้อมูลการกู้</u></h4>

                                        <strong><label class="col-lg-5" >ประสงค์จะขอกู้ยืมเงินกองทุนผู้สูงอายุเป็นจำนวนเงิน :</label></strong>
                                       {{$ser->money}}
                                        <strong><label class="col-lg-4" >บาท</label></strong>
                                        <div class="col-lg-12"> <br />  </div>

                                        <strong><label class="col-lg-3" >เพื่อนำไปประกอบอาชีพ :</label></strong>
                                        {{$ser->forwhat}}
                                        <div class="col-lg-12"> <br />  </div>

                                        <strong><label class="col-lg-3" >รูปผู้กู้ยืม :</label></strong>
                                        @if ($ser->pic)
                                       <p><img src="{{ URL::to('/') }}/images/{{ $ser->pic }}" class="col-lg-3"  width="200" height="200" /></p>
                                        @else
                                        ไม่มีรูปภาพ
                                        @endif

<!-----------------------------------------------------------------------------------------------------------------------------------------------!--> 

                                             <h4 style="font-weight:bold;"><u>4.ข้อมูลผู้คํ้าประกัน </u></h4>
                                          <strong>เลขบัตรประชาชนประจำตัว</strong>
                                           {{$ser2->id_p}}
                                       <strong>    บัตรหมดอายุวันที่ :</strong>
                                           {{$ser2->id_exp}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2">คำนำหน้าชื่อ  :</label></strong>
                                     
                                        {{$ser2->prefix}}
                                       
                                       <strong><label class="col-lg-2 ">ชื่อ  :</label></strong>
                                      {{$ser2->name}}
                                       <strong><label  class="col-lg-2 text-right">นามสกุล  :</label></strong>
                                     {{$ser2->surename}}"

                                       <strong><label class="col-lg-2 ">ว/ด/ป เกิด  :</label></strong>
                                       {{$ser2->dob}}
                                       <div class="col-lg-12"> <br />  </div>

                                    <strong><u><label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน  :</label></u></strong>
                                       <div class="col-lg-12"> <br />  </div>
                                      <strong> <label class="col-lg-2 ">บ้านเลขที่  :</label></strong>
                                       {{$ser2->address}}
                                       <strong><label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร  :</label></strong>
                                      {{$ser2->village}}

                                     <strong><label class="col-lg-2 ">เลขที่ห้อง  :</label></strong>
                                       {{$ser2->room_number}}
                                       <strong><label  class="col-lg-2 text-right">ชั้น  :</label></strong>
                                       {{$ser2->room_floor}}

                                      <strong> <label class="col-lg-2 ">หมู่ที่  :</label></strong>
                                      {{$ser2->group_home}}
                                       <strong><label  class="col-lg-2 text-right">ซอย  :</label></strong>
                                      {{$ser2->alley}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2 ">ถนน  :</label></strong>
                                      {{$ser2->road}}
                                       <strong><label  class="col-lg-2 text-right">ตำบล/แขวง  :</label></strong>
                                      {{$ser2->local}}

                                       <strong><label class="col-lg-2 ">อำเภอ/เขต  :</label></strong>
                                       {{$ser2->district}}
                                       <strong><label  class="col-lg-2 text-right">จังหวัด  :</label></strong>
                                       {{$ser2->province}}

                                       <strong><label class="col-lg-2 ">รหัสไปรษณีย์  :</label></strong>
                                       {{$ser2->zip_code}}
                                       <strong><label  class="col-lg-2 text-right">โทรศัพท์  :</label></strong>
                                       {{$ser2->phone}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน  :</label></strong>
                                       {{$ser2->check_live}}<br />

                                        <strong> <label class="col-lg-2 ">บ้านเลขที่  :</label></strong>
                                       {{$ser3->address}}
                                       <strong><label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร  :</label></strong>
                                      {{$ser3->village}}

                                     <strong><label class="col-lg-2 ">เลขที่ห้อง  :</label></strong>
                                       {{$ser3->room_number}}
                                       <strong><label  class="col-lg-2 text-right">ชั้น  :</label></strong>
                                       {{$ser3->room_floor}}

                                      <strong> <label class="col-lg-2 ">หมู่ที่  :</label></strong>
                                      {{$ser3->group_home}}
                                       <strong><label  class="col-lg-2 text-right">ซอย  :</label></strong>
                                      {{$ser3->alley}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2 ">ถนน  :</label></strong>
                                      {{$ser3->road}}
                                       <strong><label  class="col-lg-2 text-right">ตำบล/แขวง  :</label></strong>
                                      {{$ser3->local}}

                                       <strong><label class="col-lg-2 ">อำเภอ/เขต  :</label></strong>
                                       {{$ser3->district}}
                                       <strong><label  class="col-lg-2 text-right">จังหวัด  :</label></strong>
                                       {{$ser3->province}}

                                       <strong><label class="col-lg-2 ">รหัสไปรษณีย์  :</label></strong>
                                       {{$ser3->zip_code}}

                                     <strong><label class="col-lg-2">ประเภทที่อยู่ :</label></strong>
                                      {{$ser2->live_cate}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2">สถานะการอยู่อาศัย :</label></strong>
                                      @if($ser2->live_status== 1 )
                                       เช่า :{{$ser2->c_live_status}}บาท/เดือน
 เช่า                                       @endif
                                       @if($ser2->live_status== 2 )
                                      ผ่อน :{{$ser2->c_live_status}}เดือน&nbsp;&nbsp;
                                      ผ่อน
                                       @endif                                      
                                       {{$ser2->live_status}}
                                          @if($ser2->live_status== 3)
                                        อื่นๆ :{{$ser2->c_live_status}}
                                         @endif
                  
                                       <div class="col-lg-12"> <br />  </div>


                         <strong>  <label class="col-lg-2">ความสัมพันธ์กับผู้กู้ :</label></strong>
                          {{$service->relation}}
                           <div class="col-lg-12"> <br />  </div>

                           <strong><label class="col-lg-2 ">อาชีพปัจจุบัน :</label></strong>
                           {{$ser35->job}}
                           <div class="col-lg-12"> <br />  </div>

                          <strong> <label class="col-lg-2 ">ตำแหน่ง :</label></strong>
                          {{$ser35->role}}
                          <strong> <label  class="col-lg-2 text-right">รายได้/เดือน :</label></strong>
                           {{$ser35->income}}
                           <div class="col-lg-12"> <br />  </div>

                            <strong><label class="col-lg-2 ">ชื่อบริษัท/สำนักงาน :</label></strong>
                           {{$ser35->bname}}
                            <strong><label  class="col-lg-2 text-right">เลขที่ :</label></strong>
                           {{$ser35->address}}

                            <strong><label class="col-lg-2 ">อาคาร :</label></strong>
                           {{$ser35->village}}
                            <strong><label  class="col-lg-2 text-right">เลขที่ห้อง :</label></strong>
                           {{$ser35->room_number}}

                            <strong><label  class="col-lg-2 text-right">ชั้น  :</label></strong>
                                       {{$ser35->room_floor}}

                                       <strong> <label class="col-lg-2 ">หมู่ที่  :</label></strong>
                                      {{$ser35->group_home}}
                                       <strong> <label  class="col-lg-2 text-right">ซอย  :</label></strong>
                                      {{$ser35->alley}}

                                        <strong><label class="col-lg-2 ">ถนน  :</label></strong>
                                      {{$ser35->road}}<br />


                                      
                                       <strong><label  class="col-lg-2 text-right">ตำบล/แขวง  :</label></strong>
                                      {{$ser35->local}}

                                       <strong><label class="col-lg-2 ">อำเภอ/เขต  :</label></strong>
                                       {{$ser35->district}}
                                       <strong><label  class="col-lg-2 text-right">จังหวัด  :</label></strong>
                                       {{$ser35->province}}

                                       <strong><label class="col-lg-2 ">รหัสไปรษณีย์  :</label></strong>
                                       {{$ser35->zip_code}}


                            <strong><label class="col-lg-2 ">โทรศัพท์ที่ทำงาน :</label> </strong>
                           {{$ser35->phone_job}} 
                            <strong><label  class="col-lg-2 text-right">โทรศัพท์มือถือ :</label> </strong>
                          {{$ser35->phone}}
                           <div class="col-lg-12"> <br />  </div>

 <!-----------------------------------------------------------------------------------------------------------------------------------------------!--> 

                           ข้อมูลอื่นๆ
                           </div>
                           <div class="col-lg-12"> <br />  </div>

                          <strong> <label class="col-lg-12 " style="color:red;" >กรณีเปลี่ยนชื่อ - </label></strong>
                           <strong><label class="col-lg-2 ">ชื่อใหม่ :</label></strong>
                           {{$ser35->newname}}
                          <strong> <label  class="col-lg-2 text-right">นามสกุล :</label></strong>
                           {{$ser35->newsname}}
                           <div class="col-lg-12"> <br />  </div>

                           <strong><label class="col-lg-12 " style="color:red;" >กรณีเสียชีวิต :</label></strong>
                           {{$service->life}}

<h4 style="font-weight:bold;"><u>5.ข้อมูลทายาท </u></h4>
                          <strong>เลขบัตรประชาชนประจำตัว</strong>
                                           {{$ser4->id_p}}
                                       <strong>    บัตรหมดอายุวันที่ :</strong>
                                           {{$ser4->id_exp}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2">คำนำหน้าชื่อ  :</label></strong>
                                     
                                        {{$ser4->prefix}}
                                       
                                       <strong><label class="col-lg-2 ">ชื่อ  :</label></strong>
                                      {{$ser4->name}}
                                       <strong><label  class="col-lg-2 text-right">นามสกุล  :</label></strong>
                                     {{$ser4->surename}}"

                                       <strong><label class="col-lg-2 ">ว/ด/ป เกิด  :</label></strong>
                                       {{$ser4->dob}}
                                       <div class="col-lg-12"> <br />  </div>

                                    <strong><u><label class="col-lg-12 " style="color:blue">ที่อยู่ปัจจุบัน  :</label></u></strong>
                                       <div class="col-lg-12"> <br />  </div>
                                      <strong> <label class="col-lg-2 ">บ้านเลขที่  :</label></strong>
                                       {{$ser4->address}}
                                       <strong><label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร  :</label></strong>
                                      {{$ser4->village}}

                                     <strong><label class="col-lg-2 ">เลขที่ห้อง  :</label></strong>
                                       {{$ser4->room_number}}
                                       <strong><label  class="col-lg-2 text-right">ชั้น  :</label></strong>
                                       {{$ser4->room_floor}}

                                      <strong> <label class="col-lg-2 ">หมู่ที่  :</label></strong>
                                      {{$ser4->group_home}}
                                       <strong><label  class="col-lg-2 text-right">ซอย  :</label></strong>
                                      {{$ser4->alley}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2 ">ถนน  :</label></strong>
                                      {{$ser4->road}}
                                       <strong><label  class="col-lg-2 text-right">ตำบล/แขวง  :</label></strong>
                                      {{$ser4->local}}

                                       <strong><label class="col-lg-2 ">อำเภอ/เขต  :</label></strong>
                                       {{$ser4->district}}
                                       <strong><label  class="col-lg-2 text-right">จังหวัด  :</label></strong>
                                       {{$ser4->province}}

                                       <strong><label class="col-lg-2 ">รหัสไปรษณีย์  :</label></strong>
                                       {{$ser4->zip_code}}
                                       <strong><label  class="col-lg-2 text-right">โทรศัพท์  :</label></strong>
                                       {{$ser4->phone}}
                                       <div class="col-lg-12"> <br />  </div>
                                       <strong><label class="col-lg-2 " style="color:blue">ที่อยู่ตามทะเบียนบ้าน  :</label></strong>
                                       {{$ser4->check_live}}<br />




                                       <strong> <label class="col-lg-2 ">บ้านเลขที่  :</label></strong>
                                       {{$ser5->address}}
                                       <strong><label  class="col-lg-2 text-right">หมู่บ้าน/อาคาร  :</label></strong>
                                      {{$ser5->village}}

                                     <strong><label class="col-lg-2 ">เลขที่ห้อง  :</label></strong>
                                       {{$ser5->room_number}}
                                       <strong><label  class="col-lg-2 text-right">ชั้น  :</label></strong>
                                       {{$ser5->room_floor}}

                                      <strong> <label class="col-lg-2 ">หมู่ที่  :</label></strong>
                                      {{$ser5->group_home}}
                                       <strong><label  class="col-lg-2 text-right">ซอย  :</label></strong>
                                      {{$ser5->alley}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2 ">ถนน  :</label></strong>
                                      {{$ser5->road}}
                                       <strong><label  class="col-lg-2 text-right">ตำบล/แขวง  :</label></strong>
                                      {{$ser5->local}}

                                       <strong><label class="col-lg-2 ">อำเภอ/เขต  :</label></strong>
                                       {{$ser5->district}}
                                       <strong><label  class="col-lg-2 text-right">จังหวัด  :</label></strong>
                                       {{$ser5->province}}

                                       <strong><label class="col-lg-2 ">รหัสไปรษณีย์  :</label></strong>
                                       {{$ser5->zip_code}}

                                     <strong><label class="col-lg-2">ประเภทที่อยู่ :</label></strong>
                                      {{$ser5->live_cate}}
                                       <div class="col-lg-12"> <br />  </div>

                                       <strong><label class="col-lg-2">สถานะการอยู่อาศัย :</label></strong>
                                      @if($ser5->live_status== 1 )
                                       เช่า :{{$ser5->c_live_status}}บาท/เดือน
 เช่า                                       @endif
                                       @if($ser5->live_status== 2 )
                                      ผ่อน :{{$ser5->c_live_status}}เดือน&nbsp;&nbsp;
                                      ผ่อน
                                       @endif                                      
                                       {{$ser5->live_status}}
                                          @if($ser5->live_status== 3)
                                        อื่นๆ :{{$ser5->c_live_status}}
                                         @endif
                  
                                       <div class="col-lg-12"> <br />  </div>

<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>

