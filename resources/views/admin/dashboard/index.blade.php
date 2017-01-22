@extends('admin.layouts.template')
@section('content')
<div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">หน้าแรก</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">

                <div class="col-md-6 col-md-offset-3 ">
                      <div class="alert alert-info text-center">
                          <h4>คู่มือประกอบการใช้งานระบบ</h4>
                          <hr />
                            <a class="btn btn-primary btn-lg fa fa-file-pdf-o"> คู่มือการใช้งานระบบ</a>
                        </div>
                    </div>
                <div class="col-lg-3">  </div>

                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                          นำเข้าข้อมูลบุคคล กองทุนผู้สูงอายุ
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                              <a class="btn btn-success btn-lg fa fa-file-excel-o "> นำเข้าข้อมูล</a>
                              <a class="btn btn-default btn-lg fa fa-file-excel-o pull-right"> Download template</a>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                          นำเข้าข้อมูลบุคคล งานผู้เข้ารับบริการ
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                              <a class="btn btn-success btn-lg fa fa-file-excel-o "> นำเข้าข้อมูล</a>
                              <a class="btn btn-default btn-lg fa fa-file-excel-o pull-right"> Download template</a>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->


              </div><!-- /row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

@stop