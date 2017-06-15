
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

header("Content-type: application/vnd.ms-word");
header("Content-Disposition:attachment;Filename=ข้อมูลกู้ยืมบุคคล({$s->n} {$s->m}).doc ");//
header("Pragma:no-cache");

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<br><div width="185" align="center"  ><strong><u>ข้อมูลกู้ยืมบุคคล</u></strong></div>

                                      <strong><label class="col-lg-2 ">เลขที่สัญญา :</label></strong>
                                      {{$ser1->contect_id}} 
                                      <strong><label class="col-lg-2 ">ชื่อผู้กู้ :</label></strong>
                                      {{$s->n}} {{$s->m}} <br /> 
                                      <strong><label  class="col-lg-2 text-right">รหัสผู้กู้ :</label></strong>
                                      {{$ser1->no}}
 <br /> 
                                      <strong><label class="col-lg-2 "> จ่ายให้กู้ :</label></strong>
                                      {{$ser1->money}}
 <br /> 
                                      <strong><label  class="col-lg-2 text-right">กำหนดเวลาผ่อนชำระ :</label></strong>
                                      {{$ser1->time_total}}
                                      <strong><label  class="col-lg-1"> เดือน</label> <br /> </strong>
                                      <div class="col-lg-12"> <br />  </div>

                                      <strong><label class="col-lg-2 ">วันเริ่มสัญญา :</label></strong>
                                      {{$ser1->date_start}} <br /> 
                                      <strong><label  class="col-lg-2 text-right">วันครบกำหนดสัญญา :</label></strong>
                                      {{$ser1->date_end}}
                                       <br /> 


                                      <strong><label class="col-lg-2 ">ชำระงวดละ :</label></strong>
                                     {{$ser1->return_money}}
                                      <strong><label  class="col-lg-1"> บาท</label> <br /></strong>
                                      <strong><label  class="col-lg-2 text-right">ทั้งสิ้น :</label></strong>
                                      {{$ser1->return_money_total}}
                                     <strong> <label  class="col-lg-1">งวด</label></strong>
                                       <br /> 

                                     <strong> <label class="col-lg-2 ">งวดสุดท้าย :</label></strong>
                                      {{$ser1->return_money_last}}
                                     <strong> <label  class="col-lg-7 ">บาท</label></strong>
 <br /> 

                              <div class="col-lg-12">
                              <h4 style="font-weight:bold;">ข้อมูลเงินกู้ :</h4>
                                </div>

                              <label class="col-lg-2 ">วงเงินที่กู้ยืม :</label>
                             {{$ser3->other}}
                              <label  class="col-lg-1">บาท</label> <br /> 
                              <label  class="col-lg-2 text-right">ยอดชำระแล้ว :</label>
                              {{$ser3->money_payed}}
                              <label  class="col-lg-1">บาท</label>
                              <br /> 



                              <label class="col-lg-2 ">งวดค้างชำระ จำนวน :</label>
                             {{$ser3->mounth_remain}}
                              <label  class="col-lg-1">งวด</label> <br /> 
                              <label  class="col-lg-2 text-right">ยอดคงเหลือ :</label>
                              {{$ser3->money_remain}}
                              <label  class="col-lg-1">บาท</label>
 <br /> 


                              <label class="col-lg-2 ">ชำระล่าสุด :</label>
                             {{$ser3->total}} <br /> 
                              <label  class="col-lg-2 text-right">วันที่ชำระครั้งล่าสุด :</label>
                              {{$ser3->date_pay}} <br /> 

                              <label class="col-lg-2 ">วัตถุประสงค์กู้ :</label>
                              {{$ser3->forwhat}} <br /> 
                              <label  class="col-lg-2 text-right">อาชีพประสงค์กู้</label>
                             {{$ser3->job_borrow}} <br /> 
                                  

                                   

<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>

