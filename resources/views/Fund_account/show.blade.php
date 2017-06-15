@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">การชำระหนี้</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('Fund_account.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                       ชำระหนี้
                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">


                                {!! Form::open(array('route'=>'Fund_account.store','class' => 'form',
                                        'novalidate' => 'novalidate',
                                        'files' => true)) !!}

                                <h4>ชำระเงิน</h4>
                                <hr />

                                <label class="col-lg-2 ">ชื่อ</label>
                                <input type="text" class="col-lg-3" name="" value="{{$service->name}}  {{$service->surename}}" disabled=""/>
                                <label  class="col-lg-2 text-right">เลขที่สัญญา</label>
                                <div class="col-lg-5">
                                <input type="text" class="col-lg-8" name="" value="{{$service->contect_id}}" disabled=""/>
                                </div>
                                <div class="col-lg-12"> <br />  </div>

                                <label class="col-lg-2 ">วันที่ชำระ</label>
                                <input type="date" class="col-lg-3" name="date_pay" />
                                <label  class="col-lg-2 text-right">ช่องทางการชำระ</label>
                                <div class="col-lg-4">
                     <input list="a" name="place_pay"  id="b"class="col-lg-10" >

                                        <datalist id="a">
                                        <option value="เค้าเตอร์เซอร์วิส">
                                        <option value="ธนาณัติ">
                                        <option value="จ่ายเงินสด">
                                        </datalist>

                                           
                                </div>
                                <div class="col-lg-12"> <br />  </div>


                                <label class="col-lg-2 ">ยอดชำระ</label>
                                <input type="text" class="col-lg-3" name="total"   />
                                <label  class="col-lg-2 text-right" >ยอดคงเหลือ</label>
                                <div class="col-lg-5">
                                <input type="text" class="col-lg-8" disabled="" name="" value="{{$ser->money_remain}}"/>
                                </div>
                                <div class="col-lg-12"> <br />  </div>

                                <label class="col-lg-2 ">เล่มที่ใบเสร็จ</label>
                                <input type="text" class="col-lg-3"   name="bill_book" />
                                <label  class="col-lg-2 text-right">เลขที่ใบเสร็จ</label>
                                <div class="col-lg-5">
                                <input type="text" class="col-lg-8" name="bill_no" />
                                </div>
                                <div class="col-lg-12"> <br />  </div>

                                <label  class="col-lg-2">หมายเหตุ</label>
                                <textarea class="col-lg-3" name="remark" ></textarea>
                                <label  class="col-lg-7"></label>

                                
                                <div class="col-lg-12"> <br />  </div>

                                <div id="change">
                                <div class="col-lg-12">
                                  <h4>กรณีธนาณัติ</h4>
                                  <hr />
                                </div>
                                <label class="col-lg-2 ">เลขที่ธนาณัติ</label>
                                <input type="text" class="col-lg-3"  name="order_no"  />
                                <label  class="col-lg-2 text-right">วันที่ส่งธนานัติ</label>
                                <div class="col-lg-5">
                                <input type="date" class="col-lg-8" name="order_date" />
                                </div>
                                <div class="col-lg-12"> <br />  </div>
                                </div>


                                <input type="hidden"  name="id_borrower" value="{{$id}}"/>

                                      <div class="form-group col-lg-12" >
                                        {!! Form::button('ชำระหนี้',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}

                                      </div>


                                    {!! Form::close() !!}
                            </form>



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

<script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {
         $('#change').hide();
        $('#b').on('change',function(){
              if($('#b').val() =='ธนาณัติ'){
               $('#change').show();
          }else{
               $('#change').hide();
          }
          });

         

          
           
          
    });

</script>
@stop
