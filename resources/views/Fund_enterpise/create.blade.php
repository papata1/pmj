@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">งานโครงการขอรับการสนับสนุน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('Fund_enterpise.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-primary">
                                   <div class="panel-heading">
                                       ลงทะเบียนโครงการ
                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">

                                        {!! Form::open(array('route'=>'service.store','class' => 'form',
                                        'novalidate' => 'novalidate',
                                        'files' => true)) !!}
                                           <div class="form-group">
                                             <label>ปีงบประมาณ</label>
                                             <select id="year" name="year">
                                               <option value="2560">2560</option>
                                               <option value="2559">2559</option>
                                               <option value="2558">2558</option>
                                             </select>
                                           </div>

                                           <div >
                                               <label>วันที่</label>
                                               <input type="date" id="date" name="date" />
                                           </div>
                                            <br / >
                          <h4>ส่วนที่ 1 ข้อมูลทั่วไป</h4>
                          <hr />

                          <label class="col-lg-3 ">ชื่อโครงการ(ภาษาไทย)</label>
                          <input type="text" class="col-lg-9"  />
                          <div class="col-lg-12"> <br />  </div>

                          <label  class="col-lg-3">ชื่อโครงการ(ภาษาอังกฤษ)</label>
                          <input type="text" class="col-lg-9"  />
                          <div class="col-lg-12"> <br />  </div>

                          <label  class="col-lg-3">องค์กรณ์ที่เสนอโครงการ</label>
                          <input type="text" class="col-lg-9"  />
                          <div class="col-lg-12"> <br />  </div>

                          <label  class="col-lg-12">องค์กรณ์ของท่านจัดอยู่ในประเภทองค์กรใด</label></label>
                          <input type="radio" name="gender" class="col-lg-1"  /><span class="col-lg-5"> องค์กรเอกชน มูลนิธิ&nbsp;&nbsp;</span>
                          <input type="radio" name="gender" class="col-lg-1"  /><span class="col-lg-5"> องค์กรปกครองส่วนท้องถิ่น&nbsp;&nbsp;</span>
                          <div class="col-lg-12"> <br />  </div>
                          <input type="radio" name="gender" class="col-lg-1"  /><span class="col-lg-5"> สถาบันการศึกษาหรือหน่วยราชการ&nbsp;&nbsp;</span>
                          <input type="radio" name="gender" class="col-lg-1"  /><span class="col-lg-5"> องค์กร/ชมรมของผู้สูงอายุ&nbsp;&nbsp;</span>
                          <div class="col-lg-12"> <br />  </div>
                          <input type="radio" name="gender" class="col-lg-1"  /><span class="col-lg-2"> อื่น ๆ ระบุ&nbsp;&nbsp;</span>
                          <input type="text" class="col-lg-9"/>
                          <div class="col-lg-12"> <br />  </div>

                          <label  class="col-lg-3">ที่ตั้่งสำนักงาน (พร้อมแผนที่)</label>
                          <textarea class="col-lg-9" rows="2"></textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label  class="col-lg-12 ">แผนที่</label>
                          <img src="../img/map.png" class="center-block"/>
                          <div class="col-lg-12"> <br />  </div>
                          <label class="col-lg-2 text-right">ลองติจูด</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 text-right">ละติจูด</label>
                          <input type="text" class="col-lg-4"  />
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-3 ">โทรศัพท์/โทรศัพท์เคลื่อนที่</label>
                          <input type="text" class="col-lg-3"  />
                          <label class="col-lg-2 text-right">โทรสาร</label>
                          <input type="text" class="col-lg-4"  />
                          <div class="col-lg-12"> <br />  </div>
                          <label class="col-lg-3 ">E - Mail</label>
                          <input type="text" class="col-lg-9"  />
                          <div class="col-lg-12"> <br />  </div>
                          <label class="col-lg-4 ">ปีที่จดทะเบียนก่อตั้งองค์กรหรือปีที่เริ่มดำเนินการ</label>
                          <input type="text" class="col-lg-8"  />
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 "><h4>ผู้รับผิดชอบโครงการ</h4></label>
                          <label class="col-lg-2 ">ชื่อ</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">นามสกุล</label>
                          <input type="text" class="col-lg-4"  />
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-2">ที่อยู่</label>
                          <textarea class="col-lg-10" rows="2"></textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-2 ">โทรศัพท์</label>
                          <input type="text" class="col-lg-4"  />
                          <div class="col-lg-6"> <br />  </div>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 " style="color:red">กรณีติดต่อผู้รับผิดชอบโครงการไม่ได้ ขอให้ติดต่อ</label>

                          <label class="col-lg-2 ">ชื่อ</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">นามสกุล</label>
                          <input type="text" class="col-lg-4"  />
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-2">ที่อยู่</label>
                          <textarea class="col-lg-10" rows="2"></textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-2 ">โทรศัพท์</label>
                          <input type="text" class="col-lg-4"  />
                          <div class="col-lg-6"> <br />  </div>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-2">วัตถุประสงค์ขององค์กร</label>
                          <textarea class="col-lg-10" rows="3"></textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <div class="col-lg-12">
                          <h4>ส่วนที่ 2 รายละเอียดข้อมูลโครงการขอรับการสนับสนุนเงินกองทุน</h4>
                          <hr />
                          </div>

                          <label class="col-lg-3 ">ชื่อโครงการ</label>
                          <input type="text" class="col-lg-9"  />
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">ประเภทโครงการ</label>
                          <div class="col-lg-12"> <br />  </div>
                          <input type="radio" name="gender" class="col-lg-1"  /><span class="col-lg-5"> โครงการขนาดเล็ก วงเงินไม่เกิน 50,000 บาท</span>
                          <input type="radio" name="gender" class="col-lg-1"  /><span class="col-lg-5"> โครงการขนาดกลาง วงเงิน 50,000 ถึง 300,000 บาท</span>
                          <div class="col-lg-12"> <br />  </div>
                          <input type="radio" name="gender" class="col-lg-1"  /><span class="col-lg-5"> โครงการขนาดใหญ่ วงเงินเกิน 300,000 ขึ้นไป</span>
                          <div class="col-lg-6"> <br />  </div>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">วัตถุประสงค์ (คำอธิบาย : โครงการต้องการทำอะไร / มีกิจกรรมอะไรที่คิดจะทำ บอกให้ชัดเจนที่สุด)</label>
                          <textarea class="col-lg-12" rows="3"></textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">กลุ่มเป้าหมาย (คำอธิบาย : ระบุว่าใครคือผู้ที่จะได้รับผลดีจากโครงการนี้ และมีจำนวนเท่าใด)</label>
                          <textarea class="col-lg-12" rows="3"></textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">งบประมาณโครงการ</label>
                          <h5 class="col-lg-12 ">(คำอธิบาย : ควรแจกแจงงบประมาณในแต่ละรายการให้ชัดเจน และสอดคล้องกับกิจกรรม โดยคำนึงถึงหลักประหยัด และสมเหตุสมผล)</h5>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-4 ">&nbsp;&nbsp;&nbsp;&nbsp;งบประมาณ</label>
                          <label class="col-lg-2 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-4 ">&nbsp;&nbsp;&nbsp;&nbsp;จำนวนงบที่ต้องสนับสนุนจากกองทุนผู้สูงอายุ</label>
                          <label class="col-lg-2 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-4  ">&nbsp;&nbsp;&nbsp;&nbsp;งบประมาณสมทบจากองค์กรที่เสนอโครงการ</label>
                          <label class="col-lg-2 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">รายการจ่าย</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;1.</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-1 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;2.</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-1 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;3.</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-1 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;4.</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-1 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;5.</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-1 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;6.</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-1 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;7.</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-1 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;8.</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-1 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;9.</label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-1 "> </label>
                          <input type="text" class="col-lg-4"  />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">ได้เสนอโครงการเดียวกันนี้เพื่อรับการสนับสนุนจากแหล่งทุนอื่นหรือไม่</label>
                          <div class="col-lg-12"> <br />  </div>
                          <input type="radio" name="gender" class="col-lg-1"  /><span class="col-lg-2"> ไม่</span>
                          <input type="radio" name="gender" class="col-lg-1"  /><span class="col-lg-3"> เสนอแหล่งทุนอื่นด้วย </span>
                          <span class="col-lg-1"> คือ</span>
                          <input type="text" class="col-lg-4"/>
                          <div class="col-lg-12"> <br />  </div>

                          <span class="col-lg-2 ">ชื่อแหล่งทุนอื่น</span>
                          <input type="text" class="col-lg-4"/>
                          <span class="col-lg-2 text-right ">จำนวนเงิน</span>
                          <input type="text" class="col-lg-3"/>
                          <span class="col-lg-1 ">บาท</span>
                          <div class="col-lg-12"> <br />  </div>


                                      <div class="form-group col-lg-12" >
                                        {{ link_to_route('service.create','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}                                       
                                        {!! Form::button('ลงทะเบียนผู้กู้ยืม',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                                      </div>


                                    {!! Form::close() !!}


                                   </div>
                                   <!-- /.panel-body -->
                                    @if($errors->any())
                                    <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    @endif
                               </div>
                               <!-- /.panel -->
                           </div>
                           <!-- /.col-lg-12 -->
                       </div>
                       <!-- /.row -->

                   </div>
                   <!-- /#page-wrapper -->

               </div>
               <!-- /#wrapper -->
<script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {

                //              alert(5);


          $('.check').on('click',function(){
              $(".checkedinput").val('');
              $(".checkedinput").prop('disabled', true);
          });
          $('.checked').on('click',function(){
              $(".checkedinput").prop('disabled', false);
          });

           $('#live_status1').on('click',function(){
              $('.c').val(1);
              $("#live_status12").prop('disabled', false);
              $("#live_status14").prop('disabled', true);
              $("#live_status14").val('');
              $("#live_status13").prop('disabled', true);
              $("#live_status13").val('');
          });
          $('#live_status11').on('click',function(){
               $('.c').val(2);
              $("#live_status13").prop('disabled', false);
              $("#live_status12").prop('disabled', true);
              $("#live_status14").prop('disabled', true);
              $("#live_status14").val('');
              $("#live_status12").val('');
          });
           $('#live_status111').on('click',function(){
               $('.c').val(3);
              $("#live_status14").prop('disabled', false);
              $("#live_status13").prop('disabled', true);
              $("#live_status13").val('');
              $("#live_status12").prop('disabled', true);
              $("#live_status12").val('');
          });
          $('.live_status').on('click',function(){
              $('.c').val('');
              $("#live_status14").prop('disabled', true);
              $("#live_status14").val('');
              $("#live_status13").prop('disabled', true);
              $("#live_status13").val('');
              $("#live_status12").prop('disabled', true);
              $("#live_status12").val('');
          });

           $('#live_cate1').on('click',function(){
              $("#live_cate11").prop('disabled', false);
          });
           $('.live_cate').on('click',function(){
              $("#live_cate11").val('');
              $("#live_cate11").prop('disabled', true);
          });
          
          $('#prefix1').on('click',function(){
              $("#prefix11").prop('disabled', false);
          });
          $('.prefix').on('click',function(){
              $("#prefix11").val('');
              $("#prefix11").prop('disabled', true);
          });

         $('#add1').click(function () {
              $('#c_live_status').val($('.c').val());
        });

    });

</script>
@stop
