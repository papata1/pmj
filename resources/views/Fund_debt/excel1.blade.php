
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition:attachment;Filename=บันทึกการติดตามถามทวงหนี้({$ser2->name} {$ser2->surename}).xls  ");//
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
                            <div width="185" align="right" valign="middle" ><strong>เลขที่สัญญา {{$ser2->contect_id}} </strong></div>

<div width="185" align="center" valign="middle" ><strong><u>บันทึกการติดตามทวงหนี้ค้างชำระของกองทุนผู้สูงอายุ</u></strong></div>
<div width="185" align="center" valign="middle" ><strong>ชื่อ-สกุล {{$ser2->name}} {{$ser2->surename}}  ผู้กู้  เบอร์โทร {{$ser2->phone}}</strong></div>
<div width="185" align="center" valign="middle" ><strong>ชื่อ-สกุล {{$ser3->name}} {{$ser3->surename}}  ผู้ค้ำ  เบอร์โทร {{$ser3->phone}}</strong></div>
 <div width="185" align="center" valign="middle" ><strong>วันที่เริ่มกู้  {{$ser2->date_start}}   ชำระเสร็จสิ้นวันที่  {{$ser2->date_end}}</strong></div>
  <tr width="185" align="center" valign="middle"><td>วิธีการติดตาม</td><td>ผลการติดตาม</td></tr> 
@foreach($ser as $row)
@if($row->method <= 4 )
<tr >
<td width="185" align="center" valign="middle">
<div>ทำหนังสือแจ้งครั้งที่{{$row->method}}</div>
<div>วันที่ {{$row->date_loan}} ผู้กู้</div>
<div>วันที่ {{$row->date_garun}} ผู้ค้ำ</div>
</td>
<td  align="center" valign="middle">       <br>         <label class="col-lg-2 ">ติดต่อชำระ จำนวน :</label>
                    {{$row->pay}}
                    <label  class="col-lg-1">บาท</label>
                    <label  class="col-lg-2 text-right">เมื่อวันที่ :</label>
                    {{$row->date}}
                    <label  class="col-lg-1"></label>
                   <br />  
                     @if($row->letter)
                    จดหมายตีกลับ  เนื่องจาก :
                   @if($row->letter=='1')   จ่าหน้าซองไม่ชัดเจน  @endif
                    @if($row->letter=='2')  ไม่มีเลขที่บ้านตามจ่าหน้า   @endif
                     @if($row->letter=='3') ไม่ยอมรับ @endif
                      @if($row->letter=='4')  ไม่มีผู้รับตามจ่าหน้า   @endif
                       @if($row->letter=='5')  ไม่มารับภายในกำหนด   @endif
                        @if($row->letter=='6')  เลิกกิจการ   @endif
                         @if($row->letter=='7')  ย้ายไม่ทราบที่อยู่ใหม่   @endif
                          @if($row->letter=='8') อื่นๆ  {{$row->letter1}}    @endif
                                      <br />  

                    @endif
                    @if($row->so)
                    <label class="col-lg-2 ">ไม่ติดต่อชำระ เพราะ :</label>
                    {{$row->so}}
                    <br>
                     @endif


                    @if($row->book)
                    <label class="col-lg-2">ทำหนังสือรับสภาพหนี้ :</label>
                    <div class="col-lg-10">
                     @if($row->book=='1')
                    ผู้กู้ยืม
                     @endif
                     @if($row->book=='2')
                    ผู้ค้ำประกัน 
                    @endif
                    <span>เมื่อวันที่</span> {{$row->date_con}}&nbsp;&nbsp;
                    <span>อายุความสัญญา</span> {{$row->exp}}&nbsp;&nbsp;
                    </div>
                    <div class="col-lg-12"> <br />  </div>
                    @endif

                    

                   
</tr> 



@else
<tr>
<td width="185" align="center" valign="middle">
@if($row->method == 5 )
<div>เยี่ยมบ้านผู้กู้</div>
@else
<div>เยี่ยมบ้านผู้ค้ำ</div>
@endif
<div>วันที่ {{$row->date_loan}} ผู้กู้</div>
<div>วันที่ {{$row->date_garun}} ผู้ค้ำ</div>
</td>
<td  align="center" valign="middle">    <br>             @if($row->book=='3')
                    พบผู้กู้ยืม สาเหตุที่ไม่ชำระ เพราะ :
                    {{$row->so}}<br>
                    ทำหนังสือรับสภาพหนี้ 
                    เมื่อวันที่
                    {{$row->date_con}}
                    <label class="col-lg-2 ">อายุความสัญญา</label>
                    {{$row->exp}}<div class="col-lg-12"> <br />  </div>
                    @endif


                   @if($row->book=='4')
                    
                     ไม่พบผู้กู้ เพราะ  :
                   {{$row->so}}
                   
                      @endif

                  

</td>
</tr>

@endif
@endforeach           
</table>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>

