
 
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

header("Content-type: application/vnd.ms-word");
header("Content-Disposition:attachment;Filename=หนังสือแจ้งยืนยันยอด( $ser2->name  $ser2->surename).doc  ");//
header("Pragma:no-cache");

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div width="185" align="center"  ><strong><img src="{{ URL::to('/') }}/images/g.jpg"  width="90" height="90"  /></strong></div>
<div width="185" align="left"  ><strong><pre>           ที่................</pre></strong></div><div width="185" align="right"  ><strong>
<pre>
สำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จัง           
หวัดอุบลราชธานี ศาลากลางจังหวัดอุบลราชธานี            
ถนนแจ้งสนิท อบ 34000            </pre>
</strong></div>
<div width="185" align="center"  ><strong><pre>                วันที่..............</pre> </strong></div>
<div width="185" align="left"  ><strong><pre>เรื่อง  แจ้งยืนยันยอดหนี้คงเหลือ </pre> </strong></div>
<div width="185" align="left"  ><strong><pre>เรียน {{ $ser2->name}} {{ $ser2->surename}}</pre></strong></div>
<div width="185" align="left"  ><strong><pre>สิ่งที่ส่งมาด้วย ใบเสร็จรับเงินกองทุนผู้สูงอายุ จำนวน 1 ฉบับ</pre> </strong></div>
<div width="185" align="left"  ><strong>
<pre>                         ตามที่ท่านได้กู้ยืมเงินกองทุนผู้สูงอายุ  จำนวนเงิน {{ $ser2->total}}.00.-บาท (...............)
ตามสัญญาเลขที่ {{ $ser2->contect_id}} และ ณ วันที่...................ท่านมียอดหนี้คงเหลือ จำนวน {{ $ser2->money_remain}}.-บาท (..........) นั้น 
                              สำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัดอุบลราชธานี
ขอความร่วมมือให้ท่านยืนยันยอดหนี้คงเหลือ ณ วันที่.................โดยจะเก็บข้อมูลดังกล่าวเป็นความลับ ซึ่งการดำเนินการดังกล่าว
เป็นประโยชน์ต่อท่าน และการตรวจสอบบัญชีของกองทุนผู้สูงอายุ หากจำนวนหนี้คงเหลือตามที่แจ้งข้างต้นไม่ถูกต้อง
หรือผิดพลาดประการใด โปรดได้แจ้งข้อมูลและยืนยันยอดตามเอกสารในส่วนที่ 2 จักขอบคุณยิ่ง ทั้งนี้
หากท่านไม่ยืนยันยอดหนี้คงเหลือภายใน 15 วัน นับจากวันที่ได้รับหนังสือฉบับนี้
จะถือว่าท่านรับรองยอดหนี้คงเหลือตามจำนวนดังกล่าว
                                          จึงเรียนมาเพื่อทราบ
                                                            ขอแสดงความนับถือ



                                                      พัฒนาสังคมและความมั่นคงของมนุษย์
                                                            จังหวัดอุบลราชธานี
       </pre> </strong></div>
       <hr>
<div width="185" align="left"  ><strong>
<pre>
<u>ส่วนที่2</u>
เรียน  พัฒนาสังคมและความมั่นคงของมนุษย์จังหวัดอุบลราชธานี                                                                                     
                            ตามที่ท่านได้แจ้งให้ทราบว่า ข้าพเจ้าได้กู้ยืมเงินกองทุนผู้สูงอายุ จำนวน {{ $ser2->money}} บาท 
(        ) ตามสัญญาเลขที่ {{ $ser2->contect_id}} และ ณ วันที่             ข้าพเจ้ามียอดหนี้คงเหลือ
จำนวน {{ $ser2->total}} บาท (         ) นั้น
                  ข้าพเจ้าขอเรียนว่า ณ วันที่  มียอดหนี้คงเหลือ
                  (.........) ถูกต้อง
                  (.........) ไม่ถูกต้อง
                   เนื่องจาก...................................................................................................................
............................................................................................................................................

                                                                                     ลงชื่อ..................................ผู้กู้
                                                                                     (.......................................)
                                                                                     ลงวันที่....................................
</pre> </strong></div>
<div width="185" align="left"  ><strong>
<pre>
กรุณาตอบกลับสำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัดอุบลราชธานี
โดยนำเอกสารใส่ซองจดหมายพร้อมทั้งติดแสตมป์ 3 บาท
หากมีข้อสงสัยกรุณาติดต่อ นางสาวสุดาภรณ์ ดีสี เบอร์โทรศัพท์ 045-344579 มือถือ 080-4759198
</pre> </strong></div>

<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>



 