
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition:attachment;Filename=รายการใช้ใบเสร็จรับเงินกองทุนผู้สูงอายุ.xls  ");//
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
                            
<div width="185" align="center" valign="middle" ><strong>รายการใช้ใบเสร็จรับเงินกองทุนผู้สูงอายุ 
@if($mounth == 1)  มกราคม   @elseif($mounth == 2)   กุมพาพันธ์   @elseif($mounth == 3) มีนาคม @elseif($mounth == 4) เมษายน@elseif($mounth == 5) พฤษภาคม @elseif($mounth == 6) มิถุนายน @elseif($mounth == 7) กรกฎาคม @elseif($mounth == 8) สิงหาคม @elseif($mounth == 9) กันยายน @elseif($mounth == 10) ตุลาคม@elseif($mounth == 11)พฤศจิกายน @elseif($mounth == 12) ธันวาคม @else ทังหมด @endif
@if($year){{$year + 543}}@endif</storng></div>
   <div width="185" align="center" valign="middle" ><strong>สำนักงานพัฒนาสังคมและคงามมั่นคงของมนุษย์จังหวัดอุบลราชธานี</strong></div>    

   <tr width="185" align="center" valign="middle"><td>ลำดับที่</td><td>สัญญา</td><td>ชื่อ-สกุล</td><td>ป.ด.ว.</td><td>เลขที่ใบเสร็จ</td><td>เงินกู้รายบุคคล</td><td>เงินกู้รายกลุ่ม</td><td>อื่นๆ</td><td>หมายเหตุ</td></tr>    

@foreach($ser as $row)
<tr><td>{{ $loop->iteration}}</td><td>{{ $row->contect_id}}</td><td>{{ $row->name}} {{ $row->surename}}</td><td>{{ $row->date_pay}}</td><td>{{ $row->bill_no}}</td><td>{{ $row->total}}</td><td></td><td></td><td>@if($row->life == "1" ) เสียชีวิต @elseif($row->money_remain < 0)จ่ายครบแล้ว@else {{ $row->remark}} @endif</td></tr>

@endforeach   
</table>        
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>

