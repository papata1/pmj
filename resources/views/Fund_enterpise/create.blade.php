@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ลงทะเบียนโครงการขอรับการสนับสนุน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('Fund_enterpise.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                    
                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">

                                        {!! Form::open(array('route'=>'Fund_enterpise.store','class' => 'form',
                                        'novalidate' => 'novalidate',
                                        'files' => true)) !!}
                                           <div class="form-group">
                                             <label>ปีงบประมาณ</label>
                                             {!! Form::select('year',['' => ''] + $year, null, ['class' => 'form-control']) !!}
                                           </div>

                                           <div >
                                               <label>วันที่</label>
                                               <input type="date" id="date" name="date" />
                                           </div>
                                            <br / >
                          <h4>ส่วนที่ 1 ข้อมูลทั่วไป</h4>
                          <hr />

                          <label class="col-lg-2 ">ชื่อโครงการ(ไทย)</label>
                          <input type="text" class="col-lg-4"  name="name_th"/>
                          <label  class="col-lg-2 text-right">ชื่อโครงการ(En)</label>
                          <input type="text" class="col-lg-4" name="name_en" />
                          <div class="col-lg-12"> <br />  </div>

                          <label  class="col-lg-3">องค์กรณ์ที่เสนอโครงการ</label>
                          <input type="text" class="col-lg-9"  name="company" id="" />
                          <div class="col-lg-12"> <br />  </div>

                          <label  class="col-lg-12">องค์กรณ์ของท่านจัดอยู่ในประเภทองค์กรใด</label></label>
                          <input type="radio" name="category" class="col-lg-1 category" value="1" id=""/><span class="col-lg-3"> องค์กรเอกชน มูลนิธิ&nbsp;&nbsp;</span>
                          <input type="radio" name="category" class="col-lg-1 category" value="2" id=""/><span class="col-lg-3"> องค์กรปกครองส่วนท้องถิ่น&nbsp;&nbsp;</span>
                          <input type="radio" name="category" class="col-lg-1 category" value="3" id=""/><span class="col-lg-3"> สถาบันการศึกษาหรือหน่วยราชการ&nbsp;&nbsp;</span>
                          <input type="radio" name="category" class="col-lg-1 category" value="4" id=""/><span class="col-lg-3"> องค์กร/ชมรมของผู้สูงอายุ&nbsp;&nbsp;</span>
                          <input type="radio" name="category" class="col-lg-1" id="cat" value="5" /><span class="col-lg-2"> อื่น ๆ ระบุ&nbsp;&nbsp;</span>
                          <input type="text" class="col-lg-4" name="category_other" id="cat1" disabled/>
                          <div class="col-lg-12"> <br />  </div>

                          <label  class="col-lg-3">ที่ตั้่งสำนักงาน </label>
                          <textarea class="col-lg-9" rows="2" name="location" id=""></textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1 ">โทรศัพท์</label>
                          <input type="text" class="col-lg-3" name="phone" id="" />
                          <label class="col-lg-1 text-right">โทรสาร</label>
                          <input type="text" class="col-lg-3"  name="fax" id=""/>
                          <label class="col-lg-1 ">อีเมล์</label>
                          <input type="text" class="col-lg-3"  name="email" id=""/>
                          <div class="col-lg-12"> <br />  </div>
                          <label class="col-lg-5 ">ปีที่จดทะเบียนก่อตั้งองค์กรหรือปีที่เริ่มดำเนินการ</label>
                          <input type="text" class="col-lg-7"  name="year_start" id=""/>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 "><h4>ผู้รับผิดชอบโครงการ</h4></label>
                          <label class="col-lg-1 ">ชื่อ</label>
                          <input type="text" class="col-lg-3" name="name_m" id="" />
                          <label class="col-lg-1 text-right ">นามสกุล</label>
                          <input type="text" class="col-lg-3"  name="surename_m" id=""/>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1">ที่อยู่</label>
                          <textarea class="col-lg-7" rows="2"name="location_m" id=""></textarea>
                          <div class="col-lg-12"> <br />  </div>
                          <label class="col-lg-1 ">โทรศัพท์</label>
                          <input type="text" class="col-lg-3" name="phone_m" id="" />
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 " style="color:red">กรณีติดต่อผู้รับผิดชอบโครงการไม่ได้ ขอให้ติดต่อ</label>

                          <label class="col-lg-1 ">ชื่อ</label>
                          <input type="text" class="col-lg-3" name="name_m1" id="" />
                          <label class="col-lg-1 ">นามสกุล</label>
                          <input type="text" class="col-lg-3" name="surename_m1" id="" />
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1">ที่อยู่</label>
                          <textarea class="col-lg-7" rows="2"name="location_m1" id=""></textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1 ">โทรศัพท์</label>
                          <input type="text" class="col-lg-3" name="phone_m1" id="" />
                          <div class="col-lg-6"> <br />  </div>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-2">วัตถุประสงค์ขององค์กร</label>
                          <textarea class="col-lg-10" rows="3"name="objective_i" id=""></textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <div class="col-lg-12">
                          <h4>ส่วนที่ 2 รายละเอียดข้อมูลโครงการขอรับการสนับสนุนเงินกองทุน</h4>
                          <hr />
                          </div>

                          <label class="col-lg-3 ">ชื่อโครงการ</label>
                          <input type="text" class="col-lg-9" name="name_d" id="" />
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">ประเภทโครงการ</label>
                          <div class="col-lg-12"> <br />  </div>
                          <input type="radio" name="money_category" class="col-lg-1" value="1" id="" /><span class="col-lg-5" > โครงการขนาดเล็ก วงเงินไม่เกิน 50,000 บาท</span>
                          <input type="radio" name="money_category" class="col-lg-1"  value="2" id=""/><span class="col-lg-5" > โครงการขนาดกลาง วงเงิน 50,000 ถึง 300,000 บาท</span>
                          <div class="col-lg-12"> <br />  </div>
                          <input type="radio" name="money_category" class="col-lg-1"  value="3" id=""/><span class="col-lg-5" > โครงการขนาดใหญ่ วงเงินเกิน 300,000 ขึ้นไป</span>
                          <div class="col-lg-6"> <br />  </div>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">วัตถุประสงค์ (คำอธิบาย : โครงการต้องการทำอะไร / มีกิจกรรมอะไรที่คิดจะทำ บอกให้ชัดเจนที่สุด)</label>
                          <textarea class="col-lg-12" rows="2" name="objective" id=""></textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">กลุ่มเป้าหมาย (คำอธิบาย : ระบุว่าใครคือผู้ที่จะได้รับผลดีจากโครงการนี้ และมีจำนวนเท่าใด)</label>
                          <textarea class="col-lg-12" rows="2" name="target_group" id=""></textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">งบประมาณโครงการ</label>
                          <h5 class="col-lg-12 ">(คำอธิบาย : ควรแจกแจงงบประมาณในแต่ละรายการให้ชัดเจน และสอดคล้องกับกิจกรรม โดยคำนึงถึงหลักประหยัด และสมเหตุสมผล)</h5>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-4 ">&nbsp;&nbsp;&nbsp;&nbsp;งบประมาณ</label>
                          <label class="col-lg-2 "> </label>
                          <input type="text" class="col-lg-2"  name="budgets" id="" />
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-4 ">&nbsp;&nbsp;&nbsp;&nbsp;จำนวนงบที่ต้องสนับสนุนจากกองทุนผู้สูงอายุ</label>
                          <label class="col-lg-2 "> </label>
                          <input type="text" class="col-lg-2"   name="budgets_fund" id=""/>
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-4  ">&nbsp;&nbsp;&nbsp;&nbsp;งบประมาณสมทบจากองค์กรที่เสนอโครงการ</label>
                          <label class="col-lg-2 "> </label>
                          <input type="text" class="col-lg-2"   name="budgets_pre" id=""/>
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <div class="col-lg-12 "><label>รายการจ่าย</label> {!! Form::button('เพิ่มรายการจ่าย',['class'=>'btn btn-success','id'=>'cost']) !!}</div>

                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;1.</label>
                          <input type="text" class="col-lg-4"  name="name_l" id="" />
                          <label class="col-lg-1 "> </label>
                          <input type="text" class="col-lg-2"   name="cost_l" id=""/>
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>
                          <div class=cost1> </div>
                          <div class=cost2> </div>
                          <div class=cost3> </div>
                          <div class=cost4> </div>
                          <div class=cost5> </div>
                          <div class=cost6> </div>
                          <div class=cost7> </div>
                          <div class=cost8> </div>
                          <div class=cost9> </div>



                          <label class="col-lg-12 ">ได้เสนอโครงการเดียวกันนี้เพื่อรับการสนับสนุนจากแหล่งทุนอื่นหรือไม่</label>
                          <div class="col-lg-12"> <br />  </div>
                          <input type="radio" name="other_fund" class="col-lg-1"  id="fund1" value="1"/><span class="col-lg-1"> ไม่</span>
                          <div class="col-lg-2"></div>
                          <input type="radio" name="other_fund" class="col-lg-1"  id="fund" value="2"/><span class="col-lg-3"> เสนอแหล่งทุนอื่นด้วย </span>

                          <div class="col-lg-12"> <br />  </div>

                          <span class="col-lg-1 text-right"> คือ</span>
                          <input type="text" class="col-lg-2 fund" name="fund_cate" id="" disabled/>
                          <span class="col-lg-2 text-right">ชื่อแหล่งทุนอื่น</span>
                          <input type="text" class="col-lg-2 fund" name="name_d" id="" disabled/>
                          <span class="col-lg-2 text-right ">จำนวนเงิน</span>
                          <input type="text" class="col-lg-2 fund" name="cost" id="" disabled/>
                          <span class="col-lg-1 ">บาท</span>
                          <div class="col-lg-12"> <br />  </div>


                                      <div class="form-group col-lg-12" >
                                        {!! Form::button('ลงทะเบียนโครงการ',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
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

                //          alert(5);
                var i = 1 ;
          $('#cat').on('click',function(){
              $("#cat1").prop('disabled',false);
          });
          $('.category').on('click',function(){
              $("#cat1").val('');
              $("#cat1").prop('disabled',true);
          });


          $('#fund').on('click',function(){
              $(".fund").prop('disabled',false);
          });
          $('#fund1').on('click',function(){
              $(".fund").val('');
              $(".fund").prop('disabled',true);
          });

        $('#cost').on('click',function(){
            i++;
            if(i<10){
        text = " <label class='col-lg-1'>&nbsp;&nbsp;&nbsp;&nbsp;" + i + ".</label> <input type='text' class='col-lg-4'  name='name_l" + i + "' id='' /> <label class='col-lg-1' > </label> <input type='text' class='col-lg-2'  name='cost_l" + i + "' id=''/>  <label class='col-lg-2' >บาท</label> <div class='col-lg-12'> <br />  </div> <div class=cost2> </div> ";

        $('.cost' + i +'').html(text);
            }
       // alert(5);

        });

    });

</script>
@stop
