
 
       <?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition:attachment;Filename=ประวัติการชำระเงิน.xls  ");//
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
            <div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse"> 
<br><div width="185" align="center"  ><strong><u>ข้อมูลใบเสร็จรับเงิน</u></strong></div><br>

 <tr>
                                <th>ครั้งที่</th>
                                <th>ชื่อ</th>
                                <th>วันที่ชำระ</th>
                                <th>ช่องการการชำระ</th>
                                <th>เลขที่ธนาณัติ</th>
                                <th>ยอดชำระ</th>
                                <th>เล่มที่ใบเสร็จ</th>
                                <th>เลขที่ใบเสร็จ</th>
                               

                            </tr>
                        </thead>
                        <tbody>
                                             @foreach($ser2 as $user)
                                                    <tr>
                                                        <td>{{ $loop->iteration}}  </td>
                                                        <td>{{ $user->name}} {{ $user->surename}} </td>
                                                       <td>{{ $user->date_pay}}  </td>
                                                        <td>{{ $user->place_pay}} </td>
                                                        <td>{{ $user->order_no}}  </td>
                                                        <td>{{ $user->total}}  </td>
                                                        <td>{{ $user->bill_book}} </td>
                                                        <td>{{ $user->bill_no}}  </td>
                                                       
                 
                                                    </tr>
                                                    @endforeach            
</table>
</div>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>



 