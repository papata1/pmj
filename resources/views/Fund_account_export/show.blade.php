
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition:attachment;Filename=รายงานการรับชำระเงินทุนประกอบอาชีพรายบุคคลกองทุนผู้สูงอายุ.xls");//  
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

<div width="185" align="center" valign="middle" ><strong>รายงานการรับชำระเงินทุนประกอบอาชีพรายบุคคลกองทุนผู้สูงอายุ
@if($mounth == 1)  มกราคม   @elseif($mounth == 2)   กุมพาพันธ์   @elseif($mounth == 3) มีนาคม @elseif($mounth == 4) เมษายน@elseif($mounth == 5) พฤษภาคม @elseif($mounth == 6) มิถุนายน @elseif($mounth == 7) กรกฎาคม @elseif($mounth == 8) สิงหาคม @elseif($mounth == 9) กันยายน @elseif($mounth == 10) ตุลาคม@elseif($mounth == 11)พฤศจิกายน @elseif($mounth == 12) ธันวาคม @else ทังหมด @endif
@if($year){{$year + 543}}@endif</storng></div>
   <div width="185" align="center" valign="middle" ><strong>สำนักงานพัฒนาสังคมและคงามมั่นคงของมนุษย์จังหวัดอุบลราชธานี</strong></div>

   <tr width="185" align="center" valign="middle"><td>ลำดับที่</td><td>เลขที่สัญญา</td><td>ชื่อ-สกุล</td><td>รหัสผู้กู้</td><td>เลขประชาชน</td><td>วงเงินกู้(บาท)</td><td>งวดละ(บาท)</td><td>ยอดยกมา</td><td>ต.ค.</td><td>พ.ย.</td><td>ธ.ค.</td><td>ม.ค.</td><td>ก.พ.</td><td>มี.ค.</td><td>เม.ย.</td><td>พ.ค.</td><td>มิ.ย.</td><td>ก.ค.</td><td>ส.ค.</td><td>ก.ย.</td><td>รับชำระหนี้ปีนี้</td><td>รับชำระหนี้ทั้งหมด</td><td>ยอดคงเหลือ</td><td>จ่ายคืน</td><td>คงเหลือสุทธิ</td><td>อนุมัติครั้งที่</td><td>วันที่ทำสัญญา</td><td>งวดแรก</td><td>งวดสุดท้าย</td></tr>

@foreach($ser as $row)


<?php unset($month);$month = array("","","","","","","","","","","","","","","","","");?>
<tr><td>{{ $loop->iteration}}</td><td>{{ $row->contect_id}}</td><td>{{ $row->name}} {{ $row->surename}}</td><td>{{ $row->no}}</td><td>{{ $row->id_p}}</td><td>{{ $row->money}}</td><td>{{ $row->return_money}}</td><td></td>

@foreach($ser1 as $row1)
@if($row->id_b ==$row1->id_bo )
<?php
$m = date('m', strtotime($row1->date_pay));
for($i = 01;$i < 13; $i++){
if($i==$m ){
$month[$i] += $row1->total;
}
}
?>
@endif
@endforeach
@if($month[10] != '' )<td>{{$month[10]}}</td> @else <td></td> @endif
@if($month[11] != '' )<td>{{$month[11]}}</td>@else <td></td>@endif
@if($month[12] != '' )<td>{{$month[12]}}</td>@else <td></td>@endif
@if($month[01] !='')<td>{{$month[01]}}</td> @else <td></td>@endif
@if($month[02] !='')<td>{{$month[02]}}</td>@else <td></td>@endif
@if($month[03] != '' ) <td>{{$month[03]}}</td> @else <td></td>@endif
@if($month[04] != '' ) <td>{{$month[04]}}</td> @else <td></td>@endif
@if($month[05] != '' ) <td>{{$month[05]}}</td> @else <td></td>@endif
@if($month[06] !='') <td>{{$month[06]}}</td> @else <td></td>@endif
@if($month[07] != '') <td>{{$month[07]}}</td> @else <td></td>@endif
@if($month[08] != '') <td>{{$month[08]}}</td> @else <td></td>@endif
@if($month[09] != '') <td>{{$month[09]}}</td> @else <td></td>@endif
<td></td><td>{{ $row->money_payed}}</td><td>@if($row->money_remain < 0)จ่ายครบแล้ว@else{{ $row->money_remain}} @endif</td><td></td><td>{{ $row->money_remain}}</td><td></td><td></td><td>{{ $row->date_start}}</td><td>{{ $row->date_end}}</td></tr>

@endforeach


</table>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>
