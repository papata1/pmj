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
                                       ชำระหนี้
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



                            </form>
                          </div>
                          <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->
                      <div class="form-group" align="center">
                      <a href="Fund_account_action_pay.php" class="btn btn-primary glyphicon glyphicon-check"> ชำระหนี้</a>
                      </div>
                  </div>
                  <!-- /.col-lg-12 -->
                </div><!-- /row -->

        <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                  <div class="panel-heading">

                      <div class="col-md-2">
                        ตารางชำระหนี้
                      </div>
                      <div class="col-md-8">  </div>
                      <a  class="btn btn-success fa fa-print"> ประวัติชำระเงิน</a>
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ครั้งที่</th>
                                <th>วันที่ชำระ</th>
                                <th>ช่องการการชำระ</th>
                                <th>เลขที่ธนาณัติ</th>
                                <th>ยอดชำระ</th>
                                <th>ยอดคงเหลือ</th>
                                <th>เล่มที่ใบเสร็จ</th>
                                <th>เลขที่ใบเสร็จ</th>
                                <th>สถานะ</th>

                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>

                </div><!-- /#panel body -->

              </div><!-- /#panel panel -->
         </div><!-- /.col-lg-12 -->
      </div><!-- /#row -->
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
    });

</script>
@stop
