
 
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

header("Content-type: application/vnd.ms-word");
header("Content-Disposition:attachment;Filename=ใบเสร็จรับเงิน.doc  ");//
header("Pragma:no-cache");

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<br>
<br><div width="185" align="center"  ><strong><u>ข้อมูลใบเสร็จชำระเงินงวด</u></strong></div><br>

                               <strong> ชื่อ : {{ $ser2->name}} {{ $ser2->surename}} <strong>เลขที่สัญญา : {{ $ser2->contect_id}} <br>
                             <strong> วันที่ชำระ :</strong> {{ $ser2->date_pay}} 
                               <strong>ช่องการการชำระ :</strong>{{ $ser2->place_pay}} <br>                     
                               <strong> ยอดชำระ :</strong>     {{ $ser2->total}}  
                              <strong>  ยอดคงเหลือ :</strong>{{ $ser2->money_remain}}<br>
                              <strong>  เล่มที่ใบเสร็จ :</strong> {{ $ser2->bill_book}} 
                              <strong>  เลขที่ใบเสร็จ :</strong> {{ $ser2->bill_no}}  <br>
                               <strong>  หมายเหตุ :</strong>{{ $ser2->remark}}  <br>
                                <strong>  เลขที่ธนาณัติ :</strong> {{ $ser2->order_no}}  
                                <strong>  วันที่ส่งธนาณัติ :</strong> {{ $ser2->order_no}}  
                                                        
                                                        
                                                        
                                                       
                                                       
                                                       


<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>



 