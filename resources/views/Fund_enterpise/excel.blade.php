
       <?php
//คำสั่ง connect db เขียนเพิ่มเองนะ
            
header("Content-type: application/vnd.ms-word");
header("Content-Disposition:attachment;Filename=ข้อมูลโครงการ({$service->name_th}).doc  ");//
header("Pragma:no-cache");

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<br><div width="185" align="center"  ><strong><u>ข้อมูลโครงการ</u></strong></div>

                                     <strong>  ปีงบประมาณ :</strong>
                                        {{$service->year}}

                                     <strong> วันที่ :</strong>
                                               {{$service->date}}
                          <h4>ส่วนที่ 1 ข้อมูลทั่วไป</h4>
                         <strong> <label class="col-lg-3 ">ชื่อโครงการ(ภาษาไทย) :</label></strong>
                          {{$service->name_th}}
<br / >

                         <strong> <label  class="col-lg-3">ชื่อโครงการ(ภาษาอังกฤษ) :</label></strong>
                          {{$service->name_en}}
<br / >

                         <strong> <label  class="col-lg-3">องค์กรณ์ที่เสนอโครงการ :</label></strong>
                          {{$service->company}}
<br / >
                          <strong>องค์กรณ์ของท่านจัดอยู่ในประเภทองค์กรใด : </strong>
                         @if($service->category=='1') องค์กรเอกชน มูลนิธิ&nbsp;&nbsp; @endif 
                           @if($service->category=='2') องค์กรปกครองส่วนท้องถิ่น&nbsp;&nbsp; @endif 
                     @if($service->category=='3')  สถาบันการศึกษาหรือหน่วยราชการ&nbsp;&nbsp; @endif
                          @if($service->category=='4') องค์กร/ชมรมของผู้สูงอายุ&nbsp;&nbsp;  @endif
                          @if($service->category=='5') 
                          อื่น ๆ 
                          {{$service->category_other}}
 @endif
<br />
                           <strong><label  class="col-lg-3">ที่ตั้่งสำนักงาน :</label> </strong>
                          {{$service->location}}

                          <strong> <label class="col-lg-3 ">โทรศัพท์/โทรศัพท์เคลื่อนที่ :</label> </strong>
                          {{$service->phone}}
                          <strong> <label class="col-lg-2 text-right">โทรสาร :</label> </strong>
                          {{$service->fax}}

                          <strong> <label class="col-lg-3 ">E - Mail :</label></strong>
                          {{$service->email}}
<br / >                         
                        <strong>  <label class="col-lg-4 ">ปีที่จดทะเบียนก่อตั้งองค์กรหรือปีที่เริ่มดำเนินการ :</label></strong>
                          {{$service->year_start}}
<br / >
                         <strong>  <label class="col-lg-12 "><h4>ผู้รับผิดชอบโครงการ :</h4></label></strong>
                         <strong>  <label class="col-lg-2 ">ชื่อ :</label></strong>
                          {{$service->name_m}}
                        <strong>   <label class="col-lg-2 ">นามสกุล :</label></strong>
                          {{$service->surename_m}}

                        <strong>   <label class="col-lg-2">ที่อยู่ :</label></strong>
                         {{$service->location_m}}
                        <strong>   <label class="col-lg-2 ">โทรศัพท์ :</label></strong>
                         {{$service->phone_m}}
<br / >

                         <strong>  <label class="col-lg-12 " style="color:red">กรณีติดต่อผู้รับผิดชอบโครงการไม่ได้ ขอให้ติดต่อ</label></strong>
<br / >
                         <strong>  <label class="col-lg-2 ">ชื่อ :</label></strong>
                          {{$ser->name_m}}
                         <strong>  <label class="col-lg-2 ">นามสกุล :</label></strong>
                          {{$ser->surename_m}}

                          <strong> <label class="col-lg-2">ที่อยู่ :</label></strong>
                          {{$ser->location_m}}
                         <strong>  <label class="col-lg-2 ">โทรศัพท์ :</label></strong>
                         {{$ser->phone_m}}
<br / >

                         <strong>  <label class="col-lg-2">วัตถุประสงค์ขององค์กร :</label></strong>
                         {{$service->objective_i}}
<br / >
                          <div class="col-lg-12">
                     <h4>ส่วนที่ 2 รายละเอียดข้อมูลโครงการขอรับการสนับสนุนเงินกองทุน :</h4>
                          </div>

                         <strong>  <label class="col-lg-3 ">ชื่อโครงการ :</label></strong>
                          {{$service->name_d}}
                          <br / >

                         <strong>  <label class="col-lg-12 ">ประเภทโครงการ :</label></strong>
                          @if($service->money_category=='1') โครงการขนาดเล็ก วงเงินไม่เกิน 50,000 บาท @endif
                         @if($service->money_category=='2') โครงการขนาดกลาง วงเงิน 50,000 ถึง 300,000 บาท @endif
                   @if($service->money_category=='3') โครงการขนาดใหญ่ วงเงินเกิน 300,000 ขึ้นไป @endif
                          <br / >

                        <strong>   <label class="col-lg-12 ">วัตถุประสงค์ (คำอธิบาย : โครงการต้องการทำอะไร / มีกิจกรรมอะไรที่คิดจะทำ บอกให้ชัดเจนที่สุด) :</label></strong>
                         {{$service->objective}}
                          <br / >

                        <strong>   <label class="col-lg-12 ">กลุ่มเป้าหมาย (คำอธิบาย : ระบุว่าใครคือผู้ที่จะได้รับผลดีจากโครงการนี้ และมีจำนวนเท่าใด) :</label></strong>
                          {{$service->target_group}}
<br / > 
                       <strong>    <label class="col-lg-12 ">งบประมาณโครงการ :</label></strong>
                          <div class="col-lg-12 ">(คำอธิบาย : ควรแจกแจงงบประมาณในแต่ละรายการให้ชัดเจน และสอดคล้องกับกิจกรรม โดยคำนึงถึงหลักประหยัด และสมเหตุสมผล) :</div>
                         <strong>  <label class="col-lg-4 ">&nbsp;&nbsp;&nbsp;&nbsp;งบประมาณ :</label></strong>
                          {{$service->budgets}}
                        <strong>   <label class="col-lg-2 ">บาท</label></strong>
                          <br / >

                        <strong>   <label class="col-lg-4 ">&nbsp;&nbsp;&nbsp;&nbsp;จำนวนงบที่ต้องสนับสนุนจากกองทุนผู้สูงอายุ :</label></strong>
                          {{$service->budgets_fund}}
                         <strong>  <label class="col-lg-2 ">บาท</label></strong><br / >
                    

                        <strong>   <label class="col-lg-4  ">&nbsp;&nbsp;&nbsp;&nbsp;งบประมาณสมทบจากองค์กรที่เสนอโครงการ :</label></strong>
                       <strong>    {{$service->budgets_pre}}
                        <strong>  <label class="col-lg-2 ">บาท</label></strong>
<br / >
                         <strong>  <div class="col-lg-12 "><label>รายการจ่าย :</label> </div></strong>



                          <?php $i = 1;?>
                           @foreach($ser1 as $ser)
                          <input type="hidden"  name="id{{$i}}" id="" value="{{$ser->id}}"/>
                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;{{$i}}.</label>
                          {{$ser->name_l}}
                          <label class="col-lg-2 "> </label>
                          {{$ser->cost_l}}
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>
                          <?php $i++;?>
                           @endforeach




                        <strong>   <label class="col-lg-12 ">ได้เสนอโครงการเดียวกันนี้เพื่อรับการสนับสนุนจากแหล่งทุนอื่นหรือไม่ :</label></strong>
                         @if($service->other_fund=='1') 
                           ไม่
               
                          @else

                         <strong> เสนอแหล่งทุนอื่นด้วย </strong>
                           คือ :
                          {{$service->fund_cate}}

                       <strong>    <span class="col-lg-2 "> ชื่อแหล่งทุนอื่น :</span></strong>
                          {{$service->name_d}}
                       <strong>    <span class="col-lg-2 text-right ">จำนวนเงิน :</span></strong>
                          {{$service->cost}}"
                        <strong>   <span class="col-lg-1 ">บาท</span></strong> <br / >
                          @endif
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>
