@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">แก้ไขใบเสร็จรับเงิน</h1>
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
                                      
                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">
                        {!! Form::model($service,array('route'=>['Fund_account.update',$service->id_p],
                        'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}


                                <h4>ชำระเงิน</h4>
                                <hr />

                                <label class="col-lg-2 ">ชื่อ</label>
                                <input type="text" class="col-lg-3" name="" value="{{$service->name}} {{$service->surename}}" disabled=""/>
                                <label  class="col-lg-2 text-right">เลขที่สัญญา</label>
                                <div class="col-lg-5">
                                <input type="text" class="col-lg-8" name="" value="{{$service->contect_id}}" disabled=""/>
                                </div>
                                <div class="col-lg-12"> <br />  </div>

                                <label class="col-lg-2 ">วันที่ชำระ</label>
                                <input type="date" class="col-lg-3" name="date_pay" value="{{$service->date_pay}}"/>
                                <label  class="col-lg-2 text-right">ช่องทางการชำระ</label>
                                <div class="col-lg-4">
                     <input list="a" name="place_pay"  id="b"class="col-lg-10" value="{{$service->place_pay}}" >

                                        <datalist id="a">
                                        <option value="เค้าเตอร์เซอร์วิส">
                                        <option value="ธนาณัติ">
                                        <option value="จ่ายเงินสด">
                                        </datalist>

                                           
                                </div>
                                <div class="col-lg-12"> <br />  </div>


                                <label class="col-lg-2 ">ยอดชำระ</label>
                                <input type="text" class="col-lg-3" name="total" value="{{$service->total}}"  />
                                <label  class="col-lg-2 text-right" >ยอดคงเหลือ</label>
                                <div class="col-lg-5">
                                <input type="text" class="col-lg-8" disabled="" name="" value="{{$ser->money_remain}}"/>
                                </div>
                                <div class="col-lg-12"> <br />  </div>

                                <label class="col-lg-2 ">เล่มที่ใบเสร็จ</label>
                                <input type="text" class="col-lg-3"   name="bill_book" value="{{$service->bill_book}}"/>
                                <label  class="col-lg-2 text-right">เลขที่ใบเสร็จ</label>
                                <div class="col-lg-5">
                                <input type="text" class="col-lg-8" name="bill_no" value="{{$service->bill_no}}" id="a3"/>
                                </div>
                                <div class="col-lg-12"> <br />  </div>

                                <label  class="col-lg-2">หมายเหตุ</label>
                                <textarea class="col-lg-3" name="remark" >{{$service->remark}}</textarea>
                                <label  class="col-lg-7"></label>
                                <div class="col-lg-12"> <br />  </div>

                                  <div id="change">
                                <div class="col-lg-12">
                                  <h4>กรณีธนาณัติ</h4>
                                  <hr />
                                </div>

                                <label class="col-lg-2 ">เลขที่ธนาณัติ</label>
                                <input type="text" class="col-lg-3"  name="order_no" value="{{$service->order_no}}" id="a2"/>
                                <label  class="col-lg-2 text-right">วันที่ส่งธนานัติ</label>
                                <div class="col-lg-5">
                                <input type="date" class="col-lg-8" name="order_date" value="{{$service->order_date}}"id="a1"/>
                                </div>

                                </div>
                                <div class="col-lg-12"> <br />  </div>

                                 {!! Form::hidden('class', null,['id' => 'class']) !!}
                                      <div class="form-group col-lg-12" >
                                        <button type="button" id="reset" class="btn btn-danger" >ค่าเริ่มต้น</button>
                                        {!! Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                                      <a href={{ action('Fund_account_billController@excel',[$service->id_p , '1' ] )}} class="btn btn-info fa fa-print pull-right">หนังสือส่งใบเสร็จ</a>
                                      <a href={{ action('Fund_account_billController@excel',[$service->id_p , '2' ] )}} class="btn btn-primary fa fa-print pull-right">หนังสือแจ้งยอดยืนยัน</a>
                                      <a href={{ action('Fund_account_billController@excel',[$service->id_p , '0'] )}} class="btn btn-default fa fa-print pull-right">ข้อมูลใบเสร็จรับเงินรายบุลคล</a>

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
        var val = <?php echo json_encode($service->place_pay); ?>;
         
        if(val =='ธนาณัติ'){
            // alert(val);
               $('#change').show();
          }else{
              $('#change').hide();
          }

        $('#b').on('change',function(){
              if($('#b').val() =='ธนาณัติ'){
               $('#change').show();
          }else{
               $('#change').hide();
               $('#a2').val('');
               $('#a1').val('') ;
               //$('#a3').val('') ;
          }
          });
    });

</script>
@stop
