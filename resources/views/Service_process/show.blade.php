
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

$strExcelFileName="Member-All.xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition:attachment; filename=ประมาลผล.xls ");//
header("Pragma:no-cache");

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">

<td width="200" align="center" valign="middle" ><strong>เงื่อนไข ปีงบประมาน : {{$year}} </strong></td>
<td width="200" align="center" valign="middle" ><strong>เดือน : {{$mounth}}</strong></td>

<td width="200" align="center" valign="middle" ><strong>ประเภท : {{$cat}}</strong></td>

<td width="200" align="center" valign="middle" ><strong>ข้อมูล : ช้อมูลผู้เข้ารับบริการ</strong></td>


<tr>
<td width="200" align="center" valign="middle" ><strong>{{$cat}}</strong></td>
<td width="181" align="center" valign="middle" ><strong>จำนวนคน</strong></td>
</tr>
@foreach ($data2 as $key => $value) 
              <tr>
<td width="200" align="center" valign="middle" ><strong>{{$key}}</strong></td>
<td width="181" align="center" valign="middle" ><strong>{{$value}}</strong></td>
</tr>
@endforeach

<?php


?>
</table>

</div>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>
