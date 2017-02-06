@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">งานบัญชี</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       {{ link_to_route('service.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-primary">
                                   <div class="panel-heading">
                                       แก้ไขข้อมูลชำระเงิน
                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">

                                        
                                        {!! Form::model(array('route'=>['service.update'],'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}

                                  
                                <h4>ชำระเงิน</h4>
                                <hr />

                                <label class="col-lg-2 ">ชื่อ</label>
                                <input type="text" class="col-lg-3" value="นางนาคี มีนา" disabled=""/>
                                <label  class="col-lg-2 text-right">เลขที่สัญญา</label>
                                <div class="col-lg-5">
                                <input type="text" class="col-lg-8" value="001/2559" disabled=""/>
                                </div>
                                <div class="col-lg-12"> <br />  </div>

                                <label class="col-lg-2 ">วันที่ชำระ</label>
                                <input type="date" class="col-lg-3" />
                                <label  class="col-lg-2 text-right">ช่องการการชำระ</label>
                                <div class="col-lg-5">
                                <input type="text" class="col-lg-8"/>
                                </div>
                                <div class="col-lg-12"> <br />  </div>


                                <label class="col-lg-2 ">ยอดชำระ</label>
                                <input type="text" class="col-lg-3"   />
                                <label  class="col-lg-2 text-right" >ยอดคงเหลือ</label>
                                <div class="col-lg-5">
                                <input type="text" class="col-lg-8" disabled=""/>
                                </div>
                                <div class="col-lg-12"> <br />  </div>

                                <label class="col-lg-2 ">เล่มที่ใบเสร็จ</label>
                                <input type="text" class="col-lg-3"   />
                                <label  class="col-lg-2 text-right">เลขที่ใบเสร็จ</label>
                                <div class="col-lg-5">
                                <input type="text" class="col-lg-8"/>
                                </div>
                                <div class="col-lg-12"> <br />  </div>

                                <label  class="col-lg-2">หมายเหตุ</label>
                                <textarea class="col-lg-3" ></textarea>
                                <label  class="col-lg-7"></label>
                                <div class="col-lg-12"> <br />  </div>

                                <div class="col-lg-12">
                                  <h4>กรณีธนาณัติ</h4>
                                  <hr />
                                </div>

                                <label class="col-lg-2 ">เลขที่ธนาณัติ</label>
                                <input type="text" class="col-lg-3"   />
                                <label  class="col-lg-2 text-right">วันที่ส่งธนานัติ</label>
                                <div class="col-lg-5">
                                <input type="date" class="col-lg-8"/>
                                </div>
                                <div class="col-lg-12"> <br />  </div>


                                      <div class="form-group col-lg-12" >
                                        {{ link_to_route('service.create','ค่าเริ่มต้น',null,['class'=>'btn btn-danger']) }}                                       
                                        {!! Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
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
    });

</script>
@stop
