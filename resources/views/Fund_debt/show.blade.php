@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">แสดงบันทึกการติดตามทวงถามหนี้</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('Fund_debt.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">

                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">



                                            <form action="update_follow" method = "post" >

                                      <br / >
                    <h4 style="font-weight:bold;">บันทึกการติดตามทวงถามหนี้ค้างชำระของกองทุนผู้สูงอายุ</h4>
                    <hr />

                     <label class="col-lg-2 ">เลขที่สัญญา</label>
                    <input type="text" class="col-lg-3" disabled value="{{$ser2->contect_id}}"/>
                    <label  class="col-lg-1"></label>
                    <label  class="col-lg-5 text-right"></label>
                    <div class="col-lg-12"> <br />  </div>

                    <label class="col-lg-2 ">ชื่อ-สกุล ผู้กู้</label>
                    <input type="text" class="col-lg-3" disabled  value="{{$ser2->name}} {{$ser2->surename}}"/>
                    <label  class="col-lg-1"></label>
                    <label  class="col-lg-2 text-right">เบอร์โทรผู้กู้</label>
                    <input type="text" class="col-lg-3" disabled="" value="{{$ser2->phone}}"/>
                    <div class="col-lg-12"> <br />  </div>

                    <label class="col-lg-2 ">ชื่อ-สกุล ผู้คํ้า</label>
                    <input type="text" class="col-lg-3"  disabled value="{{$ser3->name}} {{$ser3->surename}}"/>
                    <label  class="col-lg-1"></label>
                    <label  class="col-lg-2 text-right">เบอร์โทรผู้คํ้า</label>
                    <input type="text" class="col-lg-3" disabled="" value="{{$ser3->phone}}"/>
                    <div class="col-lg-12"> <br />  </div>

                    <label class="col-lg-2 ">วันเริ่มสัญญา</label>
                    <input type="date" class="col-lg-3"  disabled value="{{$ser2->date_start}}"/>
                    <label  class="col-lg-1"></label>
                    <label  class="col-lg-2 text-right">วันครบกำหนดสัญญา</label>
                    <input type="date" class="col-lg-3" disabled value="{{$ser2->date_end}}"/>
                    <label  class="col-lg-1"></label>
                    <div class="col-lg-12"> <br />  </div>

                    <div class="col-lg-12"> <hr  /> </div>
                    <div class="col-lg-12"> <br />  </div>

                    <h4 class="col-md-12">วิธีติดตาม</h4>
                    <div class="col-md-12">
                      <div class="col-md-6">
                       <div class="form-group">
                               <select class="form-control" name="method">
                                   @if($ser->method==0)
                                 <option value="0" selected>เลิอกวิธีติดตาม</option>
                                 <option value="1">ทำหนังสือแจ้งครั้งที่ 1</option>
                                 <option value="2">ทำหนังสือแจ้งครั้งที่ 2</option>
                                 <option value="3">ทำหนังสือแจ้งครั้งที่ 3</option>
                                 <option value="4">ทำหนังสือแจ้งครั้งที่ 4</option>
                                 <option value="5">เยี่ยมบ้านผู้กู้</option>
                                 <option value="6">เยี่ยมบ้านผู้คํ้า</option>
                                  @elseif($ser->method==1)
                                 <option value="0">เลิอกวิธีติดตาม</option>
                                 <option value="1" selected>ทำหนังสือแจ้งครั้งที่ 1</option>
                                 <option value="2">ทำหนังสือแจ้งครั้งที่ 2</option>
                                 <option value="3">ทำหนังสือแจ้งครั้งที่ 3</option>
                                 <option value="4">ทำหนังสือแจ้งครั้งที่ 4</option>
                                 <option value="5">เยี่ยมบ้านผู้กู้</option>
                                 <option value="6">เยี่ยมบ้านผู้คํ้า</option>
                                  @elseif($ser->method==2)
                                 <option value="0">เลิอกวิธีติดตาม</option>
                                 <option value="1">ทำหนังสือแจ้งครั้งที่ 1</option>
                                 <option value="2" selected>ทำหนังสือแจ้งครั้งที่ 2</option>
                                 <option value="3">ทำหนังสือแจ้งครั้งที่ 3</option>
                                 <option value="4">ทำหนังสือแจ้งครั้งที่ 4</option>
                                 <option value="5">เยี่ยมบ้านผู้กู้</option>
                                 <option value="6">เยี่ยมบ้านผู้คํ้า</option>
                                  @elseif($ser->method==3)
                                 <option value="0">เลิอกวิธีติดตาม</option>
                                 <option value="1">ทำหนังสือแจ้งครั้งที่ 1</option>
                                 <option value="2">ทำหนังสือแจ้งครั้งที่ 2</option>
                                 <option value="3" selected>ทำหนังสือแจ้งครั้งที่ 3</option>
                                 <option value="4">ทำหนังสือแจ้งครั้งที่ 4</option>
                                 <option value="5">เยี่ยมบ้านผู้กู้</option>
                                 <option value="6">เยี่ยมบ้านผู้คํ้า</option>
                                  @elseif($ser->method==4)
                                 <option value="0">เลิอกวิธีติดตาม</option>
                                 <option value="1">ทำหนังสือแจ้งครั้งที่ 1</option>
                                 <option value="2">ทำหนังสือแจ้งครั้งที่ 2</option>
                                 <option value="3">ทำหนังสือแจ้งครั้งที่ 3</option>
                                 <option value="4" selected>ทำหนังสือแจ้งครั้งที่ 4</option>
                                 <option value="5">เยี่ยมบ้านผู้กู้</option>
                                 <option value="6">เยี่ยมบ้านผู้คํ้า</option>
                                  @elseif($ser->method==5)
                                 <option value="0">เลิอกวิธีติดตาม</option>
                                 <option value="1">ทำหนังสือแจ้งครั้งที่ 1</option>
                                 <option value="2">ทำหนังสือแจ้งครั้งที่ 2</option>
                                 <option value="3">ทำหนังสือแจ้งครั้งที่ 3</option>
                                 <option value="4">ทำหนังสือแจ้งครั้งที่ 4</option>
                                 <option value="5" selected>เยี่ยมบ้านผู้กู้</option>
                                 <option value="6">เยี่ยมบ้านผู้คํ้า</option>
                                  @else
                                 <option value="0">เลิอกวิธีติดตาม</option>
                                 <option value="1">ทำหนังสือแจ้งครั้งที่ 1</option>
                                 <option value="2">ทำหนังสือแจ้งครั้งที่ 2</option>
                                 <option value="3">ทำหนังสือแจ้งครั้งที่ 3</option>
                                 <option value="4">ทำหนังสือแจ้งครั้งที่ 4</option>
                                 <option value="5">เยี่ยมบ้านผู้กู้</option>
                                 <option value="6" selected>เยี่ยมบ้านผู้คํ้า</option>
                                 @endif
                              </select>
                       </div>
                     </div>
                    </div>



                    <label class="col-lg-2 ">ค้างชำระ</label>
                    <input type="text" class="col-lg-3"  name="remain" value="{{$ser->remain}}"/>
                    <label  class="col-lg-1">งวด</label>
                    <label  class="col-lg-2 text-right">เป็นเงิน</label>
                    <input type="text" class="col-lg-3" name="cost" value="{{$ser->cost}}"/>
                    <label  class="col-lg-1">บาท</label>
                    <div class="col-lg-12"> <br />  </div>

                    <label class="col-lg-2 ">วันที่ผู้กู้</label>
                    <input type="text" class="col-lg-3"  name="date_loan" value="{{$ser->date_loan}}"/>
                    <label  class="col-lg-1"></label>
                    <label  class="col-lg-2 text-right">วันที่ผู้คํ้า</label>
                    <input type="text" class="col-lg-3" name="date_garun" value="{{$ser->date_garun}}"/>
                    <label  class="col-lg-1"></label>
                    <div class="col-lg-12"> <br />  </div>

                    <div class="col-lg-12"> <hr  /> </div>
                    <div class="col-lg-12"> <br />  </div>
                    <h4 class="col-md-12">ผลติดตาม</h4>
                    <div class="col-lg-12"> <br />  </div>
@if($ser->method <= 4 )

                    <label class="col-lg-2 ">ติดต่อชำระ จำนวน</label>
                    <input type="text" class="col-lg-3" name="pay" value="{{$ser1->pay}}" />
                    <label  class="col-lg-1">บาท</label>
                    <label  class="col-lg-2 text-right">เมื่อวันที่</label>
                    <input type="text" class="col-lg-3" name="date" value="{{$ser1->date}}"/>
                    <label  class="col-lg-1"></label>
                    <div class="col-lg-12"> <hr />  </div>

                    <label class="col-lg-2">จดหมายตีกลับ</label>
                    <div class="col-lg-10">
                    <input type="radio" name="letter"  value="1" class="check" @if($ser1->letter=='1')checked="checked"@endif/><span> จ่าหน้าซองไม่ชัดเจน&nbsp;</span> &nbsp;&nbsp;
                    <input type="radio" name="letter"  value="2"class="check"@if($ser1->letter=='2')checked="checked"@endif/><span> ไม่มีเลขที่บ้านตามจ่าหน้า&nbsp;</span> &nbsp;&nbsp;
                    <input type="radio" name="letter" value="3" class="check"@if($ser1->letter=='3')checked="checked"@endif/><span> ไม่ยอมรับ &nbsp;&nbsp;</span>
                    <input type="radio" name="letter"  value="4" class="check"@if($ser1->letter=='4')checked="checked"@endif/><span> ไม่มีผู้รับตามจ่าหน้า &nbsp;&nbsp;</span>

                    </div>
                    <div class="col-lg-12"> <br />  </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                      <input type="radio" name="letter"  value="5" class="check"@if($ser1->letter=='5')checked="checked"@endif/><span> ไม่มารับภายในกำหนด  &nbsp;&nbsp;</span>
                      <input type="radio" name="letter"  value="6" class="check"@if($ser1->letter=='6')checked="checked"@endif/><span> เลิกกิจการ  &nbsp;&nbsp;</span>
                      <input type="radio" name="letter"  value="7" class="check"@if($ser1->letter=='7')checked="checked"@endif/><span> ย้ายไม่ทราบที่อยู่ใหม่   &nbsp;&nbsp;</span>
                      @if($ser1->letter=='8')
                    <input type="radio" name="letter" value="8" id="checked" checked="checked" /><span> อื่นๆ <input type="text" name="letter1"  id="checkedinput" value="{{$ser1->letter1}}"/> &nbsp;&nbsp;</span>
                    @else
                    <input type="radio" name="letter" value="8" id="checked"/><span> อื่นๆ <input type="text" name="letter1"  value="" id="checkedinput" disabled/> &nbsp;&nbsp;</span>
                    @endif
                    </div>
                    <div class="col-lg-12"> <hr />  </div>

                    <label class="col-lg-2 ">ไม่ติดต่อชำระ เพราะ</label>
                    <textarea class="col-lg-9" name="so" value="">{{$ser1->so}}</textarea>
                    <label class="col-lg-1"> </label>
                    <div class="col-lg-12"> <hr />  </div>

                    <label class="col-lg-2">ทำหนังสือรับสภาพหนี้ </label>
                    <div class="col-lg-10">
                     @if($ser1->book=='1')
                    <input type="radio" name="book" value="1" checked/><span> ผู้กู้ยืม&nbsp;</span> &nbsp;&nbsp;
                     @else
                      <input type="radio" name="book" value="1" /><span> ผู้กู้ยืม&nbsp;</span> &nbsp;&nbsp;
                     @endif
                     @if($ser1->book=='2')
                    <input type="radio" name="book" value="2" checked/><span> ผู้ค้ำประกัน &nbsp;</span> &nbsp;&nbsp;
                    @else
                     <input type="radio" name="book" value="2"/><span> ผู้ค้ำประกัน &nbsp;</span> &nbsp;&nbsp;
                    @endif
                    <span>เมื่อวันที่</span> <input type="text" name="date_con" value="{{$ser1->date_con}}"/>&nbsp;&nbsp;
                    <span>อายุความสัญญา</span> <input type="text"  name="exp" value="{{$ser1->exp}}"/>&nbsp;&nbsp;
                    </div>
                    <div class="col-lg-12"> <hr />  </div>



          <!--           <label class="col-lg-2 ">จากการติดตามทวงหนี้ปรากฏว่า</label>
                    <textarea type="text" class="col-lg-3" name="result" >{{$ser1->result}}</textarea>
                    <label  class="col-lg-1 text-right">ดังนั้น</label>
                    <label  class="col-lg-2 text-right">เห็นควรนำเสนอต่อ</label>
                    <textarea type="text" class="col-lg-3" name="than"  >{{$ser1->than}}</textarea>
                    <label  class="col-lg-1"></label>
                    <div class="col-lg-12"> <hr />  </div>

                   <label class="col-lg-2 ">ลงชื่อเจ้าหน้าที่</label>
                    <input type="text" class="col-lg-3"  name="name" value="{{$ser1->name}}"/>
                    <label  class="col-lg-1">บาท</label>
                    <label  class="col-lg-2 text-right">ตำแหน่ง</label>
                    <input type="text" class="col-lg-3" name="position" value="{{$ser1->position}}"/>
                    <label  class="col-lg-1"></label>
                    <div class="col-lg-12"> <br />  </div> -->

                    <input type="hidden" value="{{$ser->id}}" name="id">
                    <input type="hidden" value="{{$ser1->id}}" name="id1">

                    @else
                     @if($ser1->book=='3')
                    <label class="col-lg-2 "> <input type="radio" name="book" id='yes' value="3" checked/>พบผู้กู้ไม่ชำระ เพราะ</label>
                    <textarea class="col-lg-6 yes" name="so" value="" >{{$ser1->so}}</textarea><div class="col-lg-6">  </div>
                    <div class="col-lg-12"> <br />  </div>
                     <div class="col-lg-2"></div>
                    <label class="col-lg-2">ทำหนังสือรับสภาพหนี้ </label>
                    <label  class="text-right">เมื่อวันที่</label>
                    <input type="date" class="col-lg-2 yes" name="date_con" value="{{$ser1->date_con}}" />
                    <label class="col-lg-2 ">อายุความสัญญา</label>
                    <input type="text" class="col-lg-3 yes" name="exp" value="{{$ser1->exp}}" /><div class="col-lg-12"> <br />  </div>
                    @else
                    <label class="col-lg-2 "> <input type="radio" name="book" id='yes' value="3"/>พบผู้กู้ไม่ชำระ เพราะ</label>
                    <textarea class="col-lg-6 yes" name="so" value="" disabled></textarea><div class="col-lg-6">  </div>
                    <div class="col-lg-12"> <br />  </div>
                     <div class="col-lg-2"></div>
                    <label class="col-lg-2">ทำหนังสือรับสภาพหนี้ </label>
                    <label  class="text-right">วันที่</label>
                    <input type="text" class="col-lg-2 yes" name="date_con"  disabled/>
                    <label class="col-lg-2 ">อายุความสัญญา</label>
                    <input type="text" class="col-lg-3 yes" name="exp"  disabled/><div class="col-lg-12"> <br />  </div>
                    @endif


                   @if($ser1->book=='4')

                     <label class="col-lg-2"> <input type="radio" name="book" id='no' value="4" checked/>ไม่พบผู้กู้ เพราะ</label>
                   <textarea class="col-lg-6 no" name="so" value="" ></textarea>{{$ser1->so}}<div class="col-lg-6">  </div>
                    <div class="col-lg-12"> <br />  </div>
                     @else
                     <label class="col-lg-2"> <input type="radio" name="book" id='no' value="4"/>ไม่พบผู้กู้ เพราะ</label>
                   <textarea class="col-lg-6 no" name="so" value="" disabled></textarea><div class="col-lg-6">  </div>
                    <div class="col-lg-12"> <br />  </div>
                      @endif

                    @endif

                    <input type="hidden" value="{{$ser->id}}" name="id">
                    <input type="hidden" value="{{$ser1->id}}" name="id1">


                                                           <div class="form-group col-lg-12" >
            <input type="hidden" name="_token" value="{{csrf_token()}}" >

                                      </div>


</form>                          </div>
                          <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->
                      <div class="form-group col-lg-12" align="center">

            </div>
            <br /><br /><br />
                  <!-- /.col-lg-12 -->
                </div><!-- /row -->



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

        $('.check').on('click',function(){
              $("#checkedinput").val('');
              $("#checkedinput").prop('disabled', true);

          });
          $('#checked').on('click',function(){
              $("#checkedinput").prop('disabled', false);
          });
                     $('.panel-body').find('input, textarea, button, select').attr('disabled','disabled');

    });

</script>
@stop
