
 
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

header("Content-type: application/vnd.ms-word");
header("Content-Disposition:attachment;Filename=แจ้งผิดนัดค้างชำระ ผู้กู้( $s->n  $s->m).doc ");//
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
<div width="185" align="left"  ><strong><pre>           ที่</pre></strong></div><div width="185" align="right"  ><strong>
<pre>
ศาลากลางจังหวัดอุบลราชธานี            
ถนนแจ้งสนิท อบ 34000            </pre>
</strong></div>
<div width="185" align="center"  ><strong><pre>                ..........................</pre> </strong></div>
<div width="185" align="left"  ><strong><pre>เรื่อง  แจ้งการผิดนัดค้างชำระหนี้กองทุนผู้สูงอายุ </pre> </strong></div>
<div width="185" align="left"  ><strong><pre>เรียน  {{ $s->prefix}} {{ $s->n}} {{ $s->m}}</pre></strong></div>
<div width="185" align="left"  ><strong><pre>อ้างถึง สัญญากู้ยืมเลขที่ {{ $ser1->contect_id}} ลงวันที่.............................</pre> </strong></div>
<div width="185" align="left"  ><strong>
<pre>                       ตามสัญญากู้ยืมที่อ้างถึง ท่านได้กู้ยืมเงินทุนประกอบอาชีพจากกองทุนผู้สูงอายุ เป็นเงินจำนวน
{{ $ser1->money}}  บาท (...............................)
โดยมี {{ $s1->prefix}} {{ $s1->name}} {{ $s1->surename}}เป็นผู้ค้ำประกัน การกู้ยืมเงินดังกล่าว นั้น 
                            จังหวัดอุบลราชธานี ขอเรียนว่า ท่านมียอดหนี้คงเหลือตามสัญญากู้ยืมเป็นจำนวนทั้งสิ้น
{{ $ser1->money_remain}}บาท (.......................) โดยข้อมูล ณ วันที่ ..........................
ท่านมีเงินงวดผิดนัดค้างชำระรายเดือนจำนวน {{ $ser1->return_money}} บาท (.................................)
ดังนั้น จึงขอให้ท่านนำเงินงวดผิดนัดค้างชำระรายเดือนจำนวนดังกล่าว มาชำระคืน ภายใน ๑๐ วัน
นับแต่วันที่ได้รับหนังสือฉบับนี้ หากพ้นกำหนดแล้ว จังหวัดอุบลราชธานีมีความจำเป็นต้องดำเนินการตามขั้นตอน
ทางกฎหมายต่อไป หากมีข้อสงสัยประการใด กรุณาติดต่อเจ้าหน้าที่กองทุนผู้สูงอายุในวันและเวลาราชการ
ทั้งนี้ท่านสามารถชำระเงินคืนได้ ๒ ช่องทาง ดังนี้
                            ๑. ติดต่อชำระด้วยตนเองที่สำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัดอุบลราชธานี
                            ๒.ชำระทางไปรษณีย์ธนาณัติส่งมายังสำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัดอุบลราชธานี เขียนชื่อ-สกุล ผู้กู้ยืมให้ชัดเจน
                                จึงเรียนมาเพื่อดำเนินการ และขออภัยหากท่านได้ชำระเงินก่อนได้รับหนังสือฉบับนี้

                                                                         ขอแสดงความนับถือ



                                                          พัฒนาสังคมและความมั่นคงของมนุษย์จังหวัด ปฏิบัติราชการแทน
                                                                       ผู้ว่าราชการจังหวัดอุบลราชธานี
       </pre> </strong></div><br><br>
<div width="185" align="left"  ><strong>
<pre>
สำนักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัดอุบลราชธานี
กลุ่มการพัฒนาสังคมและสวัสดิการ
โทร./โทรสาร ๐ ๔๕๓๔ ๔๕๗๙,๐ ๔๕๓๔ ๔๖๔๑
(ผู้ประสาน: นางสาวปิยธิดา หงษากุล โทร. ๐๘๓-๐๓๕๕๑๗๐)
</pre> </strong></div>




                                                       
                                                       


<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>



 