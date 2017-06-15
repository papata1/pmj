@extends('admin.layouts.template')
@section('page_heading')
@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ดึงข้อมูลรายงาน</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                </div>
                </div>
              <div class="row">

              {!! Form::open(array('route'=>'Fund_account_export.store','class' => 'form',
                                        'novalidate' => 'novalidate',
                                        'files' => true)) !!}

                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                            ดึงข้อมูลรายงาน
                          </div>
                          <!-- /.panel-heading -->
                          <div class="panel-body">
                            <div class="col-md-12">
                              <div class="col-md-6">
                               <div class="form-group">
                                       <label>เลือกปีงบประมาณ</label>
                              {!! Form::select('year',['' => 'ทั้งหมด'] + $year, null, ['class' => 'form-control']) !!}
                               </div>
                             </div>
                            </div>

                            <div class="col-md-12">
                              <div class="col-md-6">
                               <div class="form-group">
                                       <label>เลือกเดือน</label>
                                         <select class="form-control" name="mounth">
                                         <option value="">ทั้งหมด</option>
                                         <option value="01">มกราคม</option>
                                         <option value="02">กุมพาพันธ์</option>
                                         <option value="03">มีนาคม</option>
                                         <option value="04">เมษายน</option>
                                         <option value="05">พฤษภาคม</option>
                                         <option value="06">มิถุนายน</option>
                                         <option value="07">กรกฎาคม</option>
                                         <option value="08">สิงหาคม</option>
                                         <option value="09">กันยายน</option>
                                         <option value="10">ตุลาคม</option>
                                         <option  value="11">พฤศจิกายน </option>
                                         <option value="12">ธันวาคม</option>
                                      </select>
                               </div>
                             </div>
                            </div>

                            <div class="form-group" align="center">
                         {!! Form::hidden('class', null,['id' => 'class']) !!}
                            {!! Form::button('รายงานการใช้ใบเสร็จรับเงินกองทุนผู้สูงอายุ',['type'=>'submit','class'=>'btn btn-primary fa fa-print','id'=>'add1']) !!}
                     {!! Form::button('รายงานการรับชำระเงินทุนประกอบอาชีพรายบุคคล',['type'=>'submit','class'=>'btn btn-success fa fa-print','id'=>'excel']) !!}
                            </div>



 {!! Form::close() !!}
                          </div>
                          <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->
                  </div>
                  <!-- /.col-lg-12 -->
                </div><!-- /row -->



        </div>
        <!-- /#page-wrapper -->
<script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {

        $('#excel').on('click',function(){
        $('#class').val('excel');
        });
        $('#add1').on('click',function(){ 
               $('#class').val('add');
        });

    });

</script>
@stop
