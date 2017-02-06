@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">งานติดตามทวงหนี้</h1>
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
                                       แก้ไขข้อมูล
                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">

                                        
                                        {!! Form::model($service,array('route'=>['service.update',$service->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}

                                          <br / >
                              <h4 style="font-weight:bold;">ดำเนินการ</h4>
                              <hr />

                              <label class="col-lg-2 ">เลขที่สัญญา</label>
                              <input type="text" class="col-lg-3"  />
                              <label  class="col-lg-1"></label>
                              <label  class="col-lg-2 text-right">รหัสผู้กู้</label>
                              <input type="text" class="col-lg-3" placeholder="" />
                              <div class="col-lg-12"> <br />  </div>

                              <label class="col-lg-2 "> จ่ายให้กู้</label>
                              <input type="text" class="col-lg-3"  />
                              <label class="col-lg-9 ">  </label>
                              <div class="col-lg-12"> <br />  </div>

                              <label  class="col-lg-2 text-right">กำหนดเวลาผ่อนชำระ</label>
                              <input type="text" class="col-lg-3"  />
                              <label  class="col-lg-1">เดือน</label>
                              <label  class="col-lg-2 text-right">ระยะเวลา</label>
                              <input type="text" class="col-lg-3" placeholder="          ปี            เดือน" disabled="" />
                              <div class="col-lg-12"> <br />  </div>

                              <label class="col-lg-2 ">วันเริ่มสัญญา</label>
                              <input type="date" class="col-lg-3"  />
                              <label  class="col-lg-1"></label>
                              <label  class="col-lg-2 text-right">วันครบกำหนดสัญญา</label>
                              <input type="date" class="col-lg-3" />
                              <label  class="col-lg-1"></label>
                              <div class="col-lg-12"> <br />  </div>


                              <label class="col-lg-2 ">ชำระงวดละ</label>
                              <input type="text" class="col-lg-3"  />
                              <label  class="col-lg-1">บาท</label>
                              <label  class="col-lg-2 text-right">ทั้งสิ้น</label>
                              <input type="text" class="col-lg-3" />
                              <label  class="col-lg-1">งวด</label>
                              <div class="col-lg-12"> <br />  </div>

                              <label class="col-lg-2 ">งวดสุดท้าย</label>
                              <input type="text" class="col-lg-3"  />
                              <label  class="col-lg-7 ">บาท</label>
                              <div class="col-lg-12"> <br />  </div>


                              <div class="col-lg-12">
                              <h4 style="font-weight:bold;">ข้อมูลเงินกู้</h4>
                              <hr /></div>

                              <label class="col-lg-2 ">วงเงินที่กู้ยืม</label>
                              <input type="text" class="col-lg-3"  disabled/>
                              <label  class="col-lg-1">บาท</label>
                              <label  class="col-lg-2 text-right">ยอดชำระแล้ว</label>
                              <input type="text" class="col-lg-3" disabled/>
                              <label  class="col-lg-1">บาท</label>
                              <div class="col-lg-12"> <br />  </div>



                              <label class="col-lg-2 ">งวดค้างชำระ จำนวน</label>
                              <input type="text" class="col-lg-3"  disabled/>
                              <label  class="col-lg-1">งวด</label>
                              <label  class="col-lg-2 text-right">ยอดคงเหลือ</label>
                              <input type="text" class="col-lg-3" disabled/>
                              <label  class="col-lg-1">บาท</label>
                              <div class="col-lg-12"> <br />  </div>


                              <label class="col-lg-2 ">ชำระล่าสุด</label>
                              <input type="text" class="col-lg-3"  disabled/>
                              <label  class="col-lg-1"></label>
                              <label  class="col-lg-2 text-right">วันที่ชำระครั้งล่าสุด</label>
                              <input type="text" class="col-lg-3" disabled/>
                              <label  class="col-lg-1"></label>
                              <div class="col-lg-12"> <br />  </div>

                              <label class="col-lg-2 ">วัตถุประสงค์กู้</label>
                              <input type="text" class="col-lg-3"  disabled/>
                              <label  class="col-lg-1"></label>
                              <label  class="col-lg-2 text-right">อาชีพประสงค์กู้</label>
                              <input type="text" class="col-lg-3" disabled/>
                              <label  class="col-lg-1"></label>
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

        //alert(0);
    });

</script>
@stop
