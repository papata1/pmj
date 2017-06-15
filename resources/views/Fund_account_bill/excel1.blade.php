
 
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

header("Content-type: application/vnd.ms-word");
header("Content-Disposition:attachment;Filename=หนังสือส่งใบเสร็จ( $ser2->name  $ser2->surename ).doc  ");//
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
<div width="185" align="left"  ><strong><pre>           ที่.............</pre></strong></div><div width="185" align="right"  ><strong>
<pre>
สำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จัง           
หวัดอุบลราชธานี ศาลากลางจังหวัดอุบลราชธานี            
ถนนแจ้งสนิท อบ 34000            </pre>
</strong></div>
<div width="185" align="center"  ><strong><pre>                 วันที่................</pre> </strong></div>
<div width="185" align="left"  ><strong><pre>เรื่อง  ส่งใบเสร็จรับเงินกองทุนผู้สูงอายุ </pre> </strong></div>
<div width="185" align="left"  ><strong><pre>เรียน {{ $ser2->name}} {{ $ser2->surename}}</pre></strong></div>
<div width="185" align="left"  ><strong><pre>สิ่งที่ส่งมาด้วย ใบเสร็จรับเงินกองทุนผู้สูงอายุ จำนวน 1 ฉบับ</pre> </strong></div>
<div width="185" align="left"  ><strong>
<pre>                       ตามที่ท่านได้ส่งไปรษณีย์ธนาณัติ เลขที่ธนาณัติ {{ $ser2->order_no}} ลงวันที่.....................
จำนวนเงิน {{ $ser2->total}}.00.-บาท (..............)
นำส่งสำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัดอุบลราชธานี (งานกองทุนผู้สูงอายุ)
เพื่อชำระค่างวดเงินกู้ยืมทุนประกอบอาชีพกองทุนผู้สูงอายุ นั้น
                            สำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัดอุบลราชธานี
ได้รับธนาณัติฉบับดังกล่าวข้างต้นและได้ออกใบเสร็จรับเงินเรียบร้อยแล้ว
จึงขอส่งใบเสร็จรับเงินมาเพื่อให้ท่านเก็บไว้เป็นหลักฐานต่อไป
                                        จึงเรียนมาเพื่อทราบ
                                                              ขอแสดงความนับถือ



                                                       พัฒนาสังคมและความมั่นคงของมนุษย์
                                                              จังหวัดอุบลราชธานี
       </pre> </strong></div>
<div width="185" align="left"  ><strong>
<pre>
สำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัด
ฝ่ายบริหารงานทั่วไป
โทร./โทรสาร 0-4534-4579, 0-4534-4641
</pre> </strong></div>




                                                       
                                                       


<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>



 


 