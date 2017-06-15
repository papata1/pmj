@extends('admin.layouts.template')
@section('page_heading')
@section('content')
        <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ประมวลผลข้อมูลบริการ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                     
                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                     <div class="col-md-3">
                                       ประมวลผลข้อมูล
                                     </div>
                                        <br />  
                                               </div>
                                  
                                  <div class="panel-body">

{!! Form::open(array('route'=>'Service_process.store','class' => 'form',
                                        'novalidate' => 'novalidate',
                                        'files' => true)) !!}                              <div class="form-group col-md-12">
                              <label ><h4 style="font-weight:bold">เงื่อนไขแรก</h4></label>
                             </div>


                              <div class="col-md-6">
                               <div class="form-group">
                                       <label>เลือกปีงบประมาณ</label>
                                 {!! Form::select('year',['' => 'ทั้งหมด'] + $year, null, ['class' => 'form-control']) !!}
                               </div>
                             </div>


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

                             




                            <div class="form-group col-md-12">
                            <label ><h4 style="font-weight:bold">เงื่อนไขสอง</h4></label>
                            </div>

                              <div class="col-md-6">
                               <div class="form-group">
                                       <label>ประเภท</label>
                                       <select class="form-control" name="cat">
                                         <option value="district">อำเภอ</option>
                                         <option value="job">อาชีพ</option>
                                         <option value="prefix">เพศ</option>
                                          <option value="dob">ช่วงอายุ</option>
                                      </select>
                              </div>
                            </div>

                            <div class="col-md-6">
                             <div class="form-group">
                                     <label>ข้อมูล</label>
                                     <select class="form-control" name="data">
                                       <option value="1">ข้อมูลผู้เข้ารับบริการ </option>
                                    </select>
                            </div>
                          </div>

                                                         {!! Form::hidden('class', null,['id' => 'class']) !!}

                               
                        <div class="form-group col-md-12" align="center">
                            {!! Form::button('ประมวลผล',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                     {!! Form::button('Download Excel',['type'=>'submit','class'=>'btn btn-success','id'=>'excel']) !!}
                            </div>
                                                      {!! Form::close() !!}
                                   </div>
                                   <!-- /.panel-body -->
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

               $('#excel').click(function () {
               $('#class').val('excel');
        });

    });

</script>
@stop
