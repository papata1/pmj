@extends('admin.layouts.template')
@section('page_heading')
@section('content')
        <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">งานโครงการขอรับการสนับสนุน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                      <div class="col-md-12">
                        <div class="col-md-6">
                         <div class="form-group">
                                 <label>เลือกปีงบประมาณ</label>
                                 <select class="form-control">
                                   <option>ทั้งหมด</option>
                                   <option>2560</option>
                                   <option>2559</option>
                                   <option>2558</option>
                                   <option>2557</option>
                                   <option>2556</option>
                                   <option>2555</option>
                                </select>
                         </div>
                       </div>
                      </div>
                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                     <div class="col-md-2">
                                       ข้อมูลโครงการ
                                     </div>
                                     <div class="col-md-8">  </div> 
                                    {{ link_to_route('Fund_enterpise.create','ลงทะเบียนโครงการ ',null,['class'=>'btn btn-success']) }}
                                   </div>
                                   <!-- /.panel-heading -->
                                   <div class="panel-body">
                                       <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                           <thead>
                                               <tr>
                                                    <th>ชื่อโครงการ</th>
                                                    <th>ชื่อองค์กรที่เสนอ</th>
                                                    <th>ประเภทโครงการ</th>
                                                    <th>สถานะอนุมัติ</th>
                                                    <th>สถานะข้อมูล</th>
                                                    <th>วันที่ยื่น</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                                
                                           </tbody>
                                       </table>
                                       <!-- /.table-responsive -->

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

               </div>
               <!-- /#wrapper -->

@stop