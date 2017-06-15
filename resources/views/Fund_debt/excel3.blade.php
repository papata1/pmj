
 
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

header("Content-type: application/vnd.ms-word");
header("Content-Disposition:attachment;Filename=แจ้งผิดนัดค้างชำระ ผู้คำ้ประกัน( $s1->name  $s1->surename).doc ");//
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
<div width="185" align="center"  ><strong><pre>                 .........................</pre> </strong></div>
<div width="185" align="left"  ><strong><pre>เรื่อง  แจ้งให้นำเงินมาชำระหนี้แทนผู้กู้ </pre> </strong></div>
<div width="185" align="left"  ><strong><pre>เรียน  {{ $s1->prefix}} {{ $s1->name}} {{ $s1->surename}}</pre></strong></div>
<div width="185" align="left"  ><strong><pre>อ้างถึง สัญญากู้ค้ำประกันเลขที่ {{ $ser1->contect_id}} ลงวันที่.............................</pre> </strong></div>
<div width="185" align="left"  ><strong>
<pre>                       ตามหนังสือที่อ้างถึง ท่านได้ค้ำประกันการกู้ยืมเงินทุนประกอบอาชีพของ
{{ $s1->prefix}} {{ $s1->name}} {{ $s1->surename}} ตามสัญญากู้ค้ำประกันเลขที่ {{ $ser1->contect_id}} ลงวันที่............................
เป็นเงินจำนวน {{ $ser1->money}}  บาท (...............................)
                            จังหวัดอุบลราชธานี ขอแจ้งว่า ผู้กู้ยืมมียอดหนี้คงเหลือตามสัญญาทั้งสิ้นจำนวน
{{ $ser1->money_remain}}บาท (.......................) ดังนั้น
จึงขอแจ้งให้ท่านในฐานะผู้ค้ำประกันทราบและนำเงินมาชำระหนี้แทนผู้กู้ยืม ภายใน ๑๐ วัน
นับแต่วันที่ได้รับหนังสือฉบับนี้ หากพ้นกำหนดแล้ว จังหวัดอุบลราชธานี
มีความจำเป็นต้องดำเนินการตามขั้นตอนทางกฎหมายต่อไป หากมีข้อสงสัยประการใด
กรุณาติดต่อเจ้าหน้าที่กองทุนผู้สูงอายุ ในวันและเวลาราชการ ทั้งนี้ท่านสามารถชำระเงิน ได้ ๒ ช่องทาง ดังนี้
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



 