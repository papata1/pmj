@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">แก้ไขข้อมูลโครงการขอรับการสนับสนุน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('Fund_enterpise.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info" data-toggle="tab">ข้อมูลบุคคล</a>
                        </li>
                        <li><a href="#discuss" data-toggle="tab">สถานะส่งเรื่อง</a>
                        </li>
                        <li><a href="#approve" data-toggle="tab">การอนุมัติ</a>
                        </li>
                    </ul>

               <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- hometap -->
                    <br>
                <div class="tab-pane fade in active" id="info">
                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                    
                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">
                                        {!! Form::model($service,array('route'=>['Fund_enterpise.update',$service->id_info],
                                        'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}

                                           <div class="form-group">
                                             <label>ปีงบประมาณ</label>
                                              {!! Form::select('year',['' => ''] + $year, null, ['class' => 'form-control']) !!}
                                           </div>

                                           <div >
                                               <label>วันที่</label>
                                               <input type="date" id="date" name="date" value="{{$service->date}}"/>
                                           </div>
                                            <br / >
                          <h4>ส่วนที่ 1 ข้อมูลทั่วไป</h4>
                          <hr />

                          <label class="col-lg-2 ">ชื่อโครงการ(ไทย)</label>
                          <input type="text" class="col-lg-4"  name="name_th" value="{{$service->name_th}}"/>
                          <label  class="col-lg-2">ชื่อโครงการ(En)</label>
                          <input type="text" class="col-lg-4" name="name_en" value="{{$service->name_en}}"/>
                          <div class="col-lg-12"> <br />  </div>

                          <label  class="col-lg-3">องค์กรณ์ที่เสนอโครงการ</label>
                          <input type="text" class="col-lg-9"  name="company" id="" value="{{$service->company}}"/>
                          <div class="col-lg-12"> <br />  </div>

                          <label  class="col-lg-12">องค์กรณ์ของท่านจัดอยู่ในประเภทองค์กรใด</label></label>
                          <input type="radio" name="category" class="col-lg-1 category" value="1" id="" @if($service->category=='1') checked="checked" @endif/><span class="col-lg-3" > องค์กรเอกชน มูลนิธิ&nbsp;&nbsp;</span>
                          <input type="radio" name="category" class="col-lg-1 category" value="2" id="" @if($service->category=='2') checked="checked" @endif/><span class="col-lg-3" > องค์กรปกครองส่วนท้องถิ่น&nbsp;&nbsp;</span>
                          <input type="radio" name="category" class="col-lg-1 category" value="3" id="" @if($service->category=='3') checked="checked" @endif/><span class="col-lg-3" > สถาบันการศึกษาหรือหน่วยราชการ&nbsp;&nbsp;</span>
                          <input type="radio" name="category" class="col-lg-1 category" value="4" id="" @if($service->category=='4') checked="checked" @endif/><span class="col-lg-3" > องค์กร/ชมรมของผู้สูงอายุ&nbsp;&nbsp;</span>
                          @if($service->category=='5')
                          <input type="radio" name="category" class="col-lg-1" id="cat" value="5" checked="checked"/><span class="col-lg-2" > อื่น ๆ ระบุ&nbsp;&nbsp;</span>
                          <input type="text" class="col-lg-4"name="category_other" id="cat1" value="{{$service->category_other}}"/>
                          @else
                          <input type="radio" name="category" class="col-lg-1" id="cat" value="5"/><span class="col-lg-2" > อื่น ๆ ระบุ&nbsp;&nbsp;</span>
                          <input type="text" class="col-lg-4"name="category_other" id="cat1"  disabled />
                          @endif
                          <div class="col-lg-12"> <br />  </div>

                          <label  class="col-lg-3">ที่ตั้่งสำนักงาน </label>
                          <textarea class="col-lg-9" rows="2" name="location" id="" >{{$service->location}}</textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1 ">โทรศัพท์</label>
                          <input type="text" class="col-lg-3" name="phone" id="" value="{{$service->phone}}"/>
                          <label class="col-lg-1 text-right">โทรสาร</label>
                          <input type="text" class="col-lg-3"  name="fax" id="" value="{{$service->fax}}"/>
                          <label class="col-lg-1 ">E - Mail</label>
                          <input type="text" class="col-lg-3"  name="email" id="" value="{{$service->email}}"/>
                          <div class="col-lg-12"> <br />  </div>
                          <label class="col-lg-4 ">ปีที่จดทะเบียนก่อตั้งองค์กรหรือปีที่เริ่มดำเนินการ</label>
                          <input type="text" class="col-lg-8"  name="year_start" id="" value="{{$service->year_start}}"/>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 "><h4>ผู้รับผิดชอบโครงการ</h4></label>
                          <label class="col-lg-1 ">ชื่อ</label>
                          <input type="text" class="col-lg-3" name="name_m" id="" value="{{$service->name_m}}"/>
                          <label class="col-lg-1">นามสกุล</label>
                          <input type="text" class="col-lg-3"  name="surename_m" id="" value="{{$service->surename_m}}"/>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1">ที่อยู่</label>
                          <textarea class="col-lg-7" rows="2"name="location_m" id="" >{{$service->location_m}}</textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1 ">โทรศัพท์</label>
                          <input type="text" class="col-lg-3" name="phone_m" id="" value="{{$service->phone_m}}"/>
                          <div class="col-lg-6"> <br />  </div>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 " style="color:red">กรณีติดต่อผู้รับผิดชอบโครงการไม่ได้ ขอให้ติดต่อ</label>

                          <label class="col-lg-1 ">ชื่อ</label>
                          <input type="text" class="col-lg-3" name="name_m1" id="" value="{{$ser->name_m}}"/>
                          <label class="col-lg-1 ">นามสกุล</label>
                          <input type="text" class="col-lg-3" name="surename_m1" id="" value="{{$ser->surename_m}}"/>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1">ที่อยู่</label>
                          <textarea class="col-lg-7" rows="2"name="location_m1" id="" >{{$ser->location_m}}</textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-1 ">โทรศัพท์</label>
                          <input type="text" class="col-lg-3" name="phone_m1" id="" value="{{$ser->phone_m}}"/>
                          <div class="col-lg-6"> <br />  </div>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-2">วัตถุประสงค์ขององค์กร</label>
                          <textarea class="col-lg-10" rows="3"name="objective_i" id="">{{$service->objective_i}}</textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <div class="col-lg-12">
                          <h4>ส่วนที่ 2 รายละเอียดข้อมูลโครงการขอรับการสนับสนุนเงินกองทุน</h4>
                          <hr />
                          </div>

                          <label class="col-lg-3 ">ชื่อโครงการ</label>
                          <input type="text" class="col-lg-9" name="name_d" id="" value="{{$service->name_d}}"/>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">ประเภทโครงการ</label>
                          <div class="col-lg-12"> <br />  </div>
                          <input type="radio" name="money_category" class="col-lg-1" value="1" id="" @if($service->money_category=='1') checked="checked" @endif/><span class="col-lg-5" > โครงการขนาดเล็ก วงเงินไม่เกิน 50,000 บาท</span>
                          <input type="radio" name="money_category" class="col-lg-1"  value="2" id=""@if($service->money_category=='2') checked="checked" @endif/><span class="col-lg-5" > โครงการขนาดกลาง วงเงิน 50,000 ถึง 300,000 บาท</span>
                          <div class="col-lg-12"> <br />  </div>
                          <input type="radio" name="money_category" class="col-lg-1"  value="3" id=""@if($service->money_category=='3') checked="checked" @endif/><span class="col-lg-5" > โครงการขนาดใหญ่ วงเงินเกิน 300,000 ขึ้นไป</span>
                          <div class="col-lg-6"> <br />  </div>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">วัตถุประสงค์ (คำอธิบาย : โครงการต้องการทำอะไร / มีกิจกรรมอะไรที่คิดจะทำ บอกให้ชัดเจนที่สุด)</label>
                          <textarea class="col-lg-12" rows="3" name="objective" id="">{{$service->objective}}</textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">กลุ่มเป้าหมาย (คำอธิบาย : ระบุว่าใครคือผู้ที่จะได้รับผลดีจากโครงการนี้ และมีจำนวนเท่าใด)</label>
                          <textarea class="col-lg-12" rows="3" name="target_group" id="" >{{$service->target_group}}</textarea>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-12 ">งบประมาณโครงการ</label>
                          <h5 class="col-lg-12 ">(คำอธิบาย : ควรแจกแจงงบประมาณในแต่ละรายการให้ชัดเจน และสอดคล้องกับกิจกรรม โดยคำนึงถึงหลักประหยัด และสมเหตุสมผล)</h5>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-4 ">&nbsp;&nbsp;&nbsp;&nbsp;งบประมาณ</label>
                          <label class="col-lg-2 "> </label>
                          <input type="text" class="col-lg-2"  name="budgets" id="" value="{{$service->budgets}}"/>
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-4 ">&nbsp;&nbsp;&nbsp;&nbsp;จำนวนงบที่ต้องสนับสนุนจากกองทุนผู้สูงอายุ</label>
                          <label class="col-lg-2 "> </label>
                          <input type="text" class="col-lg-2"   name="budgets_fund" id="" value="{{$service->budgets_fund}}"/>
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <label class="col-lg-4  ">&nbsp;&nbsp;&nbsp;&nbsp;งบประมาณสมทบจากองค์กรที่เสนอโครงการ</label>
                          <label class="col-lg-2 "> </label>
                          <input type="text" class="col-lg-2"   name="budgets_pre" id="" value="{{$service->budgets_pre}}"/>
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>

                          <div class="col-lg-12 "><label>รายการจ่าย</label> {!! Form::button('เพิ่มรายการจ่าย',['class'=>'btn btn-success','id'=>'cost']) !!}</div>

                          <div class="col-lg-12"> <br />  </div>


                          <?php $i = 1;?>
                           @foreach($ser1 as $ser)
                          <input type="hidden"  name="id{{$i}}" id="" value="{{$ser->id}}"/>
                          <label class="col-lg-1  ">&nbsp;&nbsp;&nbsp;&nbsp;{{$i}}.</label>
                          <input type="text" class="col-lg-4"  name="name_l{{$i}}" id="" value="{{$ser->name_l}}"/>
                          <label class="col-lg-1 "> </label>
                          <input type="text" class="col-lg-2"   name="cost_l{{$i}}" id="" value="{{$ser->cost_l}}"/>
                          <label class="col-lg-2 ">บาท</label>
                          <div class="col-lg-12"> <br />  </div>
                          <?php $i++;?>
                           @endforeach
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
                          @if($service->other_fund=='1')
                          <input type="radio" name="other_fund" class="col-lg-1"  id="fund1" value="1"  checked="checked"/><span class="col-lg-1" > ไม่</span>
                          <div class="col-lg-2"></div>
                          <input type="radio" name="other_fund" class="col-lg-1"  id="fund" value="2" /><span class="col-lg-3"> เสนอแหล่งทุนอื่นด้วย </span>
                                                    <div class="col-lg-12"> <br />  </div>

                          <span class="col-lg-1 text-right"> คือ</span>
                          <input type="text" class="col-lg-2 fund" name="fund_cate" id=""  disabled/>
                          <span class="col-lg-2 text-right">ชื่อแหล่งทุนอื่น</span>
                          <input type="text" class="col-lg-2 fund" name="name_d" id=""  disabled/>
                          <span class="col-lg-2 text-right ">จำนวนเงิน</span>
                          <input type="text" class="col-lg-2 fund" name="cost" id=""  disabled/>
                          <span class="col-lg-1 ">บาท</span>
                          <div class="col-lg-12"> <br />  </div>
                          @else

                          <input type="radio" name="other_fund" class="col-lg-1"  id="fund1" value="1" /><span class="col-lg-1" > ไม่</span>
                          <div class="col-lg-2"></div>
                          <input type="radio" name="other_fund" class="col-lg-1"  id="fund" value="2"  checked="checked" /><span class="col-lg-3"> เสนอแหล่งทุนอื่นด้วย </span>
                                                    <div class="col-lg-12"> <br />  </div>

                          <span class="col-lg-1 text-right"> คือ</span>
                          <input type="text" class="col-lg-2 fund" name="fund_cate" id="" value="{{$service->fund_cate}}" />
                          <span class="col-lg-2 text-right">ชื่อแหล่งทุนอื่น</span>
                          <input type="text" class="col-lg-2 fund" name="name_d" id=""  value="{{$service->name_d}}" />
                          <span class="col-lg-2 text-right ">จำนวนเงิน</span>
                          <input type="text" class="col-lg-2 fund" name="cost" id="" value="{{$service->cost}}" />
                          <span class="col-lg-1 ">บาท</span>
                          <div class="col-lg-12"> <br />  </div>

                          @endif
                                {!! Form::hidden('chk', null,['id' => 'chk']) !!}
                                {!! Form::hidden('chk1', null,['id' => 'chk1']) !!}
                                      <div class="form-group col-lg-12" >
                                        <button type="button" id="reset" class="btn btn-danger" >ค่าเริ่มต้น</button>
                                        {!! Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
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
          </div><!-- /#panel infotap-->



            <div class="tab-pane fade" id="discuss">
                {!! Form::model($service,array('route'=>['Fund_enterpise.update',$service->id_info],
                                        'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}


                      <div class="panel panel-default">
                          <div class="panel-heading">
<label>สถานะส่งเรื่อง</label>
                          </div>
                          <div class="panel-body">
                            <div class="form-group">
                                             <select name="status1">
                                             @if($service->status1 == 1)
                                             <option value="" ></option>
                                               <option value="1" selected>รอลงเยี่ยมบ้าน</option>
                                               <option value="2">ส่งเรื่องเข้าส่วนกลาง</option>
                                               <option value="3">ลงเยี่ยมบ้านแล้ว</option>
                                                @elseif($service->status1 == 2)
                                                <option value="" ></option>
                                               <option value="1">รอลงเยี่ยมบ้าน</option>
                                               <option value="2" selected>ส่งเรื่องเข้าส่วนกลาง</option>
                                               <option value="3">ลงเยี่ยมบ้านแล้ว</option>
                                               @elseif($service->status1 == 3)
                                               <option value="" ></option>
                                               <option value="1" >รอลงเยี่ยมบ้าน</option>
                                               <option value="2">ส่งเรื่องเข้าส่วนกลาง</option>
                                               <option value="3" selected>ลงเยี่ยมบ้านแล้ว</option>
                                               @else
                                               <option value="" selected></option>
                                               <option value="1" >รอลงเยี่ยมบ้าน</option>
                                               <option value="2">ส่งเรื่องเข้าส่วนกลาง</option>
                                               <option value="3" >ลงเยี่ยมบ้านแล้ว</option>
                                               @endif
                                             </select>
                            </div>

                           <div class="form-group">
                                            <label>ความคิดเห็นเพิ่มเติม</label>
                                            <textarea class="form-control" rows="3" name="remark1">{{$service->remark1}}</textarea>
                          </div>
                          <br  />


                          <div class="form-group col-lg-12" >
                                        {!! Form::button('ลงทะเบียนโครงการ',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                                      </div>
                          </div><!-- /#panel body-->

                      </div><!-- /#panel form-->

                </form>
            </div><!-- /#panel discusstap-->

            <div class="tab-pane fade" id="approve">

                              {!! Form::model($service,array('route'=>['Fund_enterpise.update',$service->id_info],
                                        'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}

                <label>คำร้องขอใหม่</label>
                    <div class="panel panel-default">
                        <div class="panel-heading">ความเห็นหัวหน้ากลุ่ม
                        </div>
                        <div class="panel-body">
                                           <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                <!--นำข้อมูลมาแสดงผลในฟิลล์ต่างๆ-->
                                                @if($service->st == 1)
                                                    <input type="radio" name="status" value="1" checked="" class="s">ยังไม่ทำการอนุมัติ
                                                    @else
                                                    <input type="radio" name="status" value="1"  class="s">ยังไม่ทำการอนุมัติ
                                                @endif
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                 @if($service->st == 2)
                                                    <input type="radio" name="status" value="2" class="s" checked="" >เห็นชอบตามวงเงินกู้ {{$service->budgets}} บาท
                                                    @else
                                                    <input type="radio" name="status" value="2" class="s" >เห็นชอบตามวงเงินกู้ {{$service->budgets}} บาท
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                 @if($service->st == 3)
                                                    <input type="radio" name="status" value="3" id="s" checked="" >เห็นชอบ ปรับยอดเงินกู้คงเหลือ <input type="text"name="money" id="sinput" value="{{$service->money}}"/> บาท
                                                @else
                                                    <input type="radio" name="status" value="3" id="s" >เห็นชอบ ปรับยอดเงินกู้คงเหลือ <input type="text"name="money" id="sinput" disabled/> บาท
                                                @endif
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                 @if($service->st == 4)
                                                    <input type="radio" name="status" value="4" class="s" checked="">ไม่เห็นชอบ
                                                    @else
                                                    <input type="radio" name="status" value="4" class="s" >ไม่เห็นชอบ
                                                    @endif
                                                </label>
                                            </div>
                         </div>

                         <div class="form-group">
                                          <label>ความคิดเห็นเพิ่มเติม</label>
                                          <textarea class="form-control" rows="3" name="remark">{{$service->remark}}</textarea>
                        </div>


                      <div class="form-group col-lg-12" >
                                        {!! Form::button('ลงทะเบียนโครงการ',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                                      </div>
                        </div><!-- /#panel body-->

                    </div><!-- /#panel form-->

              </form>
            </div><!-- /#panel discusstap-->
          </div><!-- /#panel tap-->
        </div><!-- /#panel body-->

      </div><!-- /#row -->
                   </div>
                   <!-- /#page-wrapper -->

               </div>
               <!-- /#wrapper -->
<script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {

                var phpVal = "<?php echo $i; ?>";
                var a  = phpVal;
                phpVal-- ;
               // alert($('#chk').val(););
                //alert(a);
                var i = 1 ;
          $('#cat').on('click',function(){
              $("#cat1").prop('disabled',false);
          });
          $('.category').on('click',function(){
              $("#cat1").val('');
              $("#cat1").prop('disabled',true);
          });

          $('#s').on('click',function(){
              $("#sinput").prop('disabled',false);
          });
          $('.s').on('click',function(){
              $("#sinput").val('');
              $("#sinput").prop('disabled',true);
          });


          $('#fund').on('click',function(){
              $(".fund").prop('disabled',false);
          });
          $('#fund1').on('click',function(){
              $(".fund").val('');
              $(".fund").prop('disabled',true);
          });

        $('#cost').on('click',function(){
            if(phpVal<10){
            i++;
            phpVal++;
        text = " <label class='col-lg-1'>&nbsp;&nbsp;&nbsp;&nbsp;" + phpVal + ".</label> <input type='text' class='col-lg-4'  name='name_l" + phpVal + "' id='' /> <label class='col-lg-1' > </label> <input type='text' class='col-lg-2'  name='cost_l" + phpVal + "' id=''/>  <label class='col-lg-2' >บาท</label> <div class='col-lg-12'> <br />  </div> <div class=cost2> </div> ";

        $('.cost' + phpVal +'').html(text);
            }
       //alert(phpVal);
                      $('#chk1').val(phpVal);

        });

         $('#add1').click(function () {
               $('#chk').val(a);
               $('#chk1').val(phpVal);

              // $('#class').val('id');
        });


    });

</script>
@stop
