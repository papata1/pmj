@extends('admin.layouts.template')
@section('page_heading')
@section('content')
<div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">จัดการเรื่องรับบริการ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="col-md-2">
                            ข้อมูลผู้เข้ารับบริการ
                          </div>
                          <div class="col-md-8">  </div>
                          {{ link_to_route('category.create','เพิ่มเรื่องขอเข้ารับบริการ ',null,['class'=>'btn btn-success']) }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ลักษณะงาน</th>
                                        <th>ประเภทงาน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cate as $user)
                         <tr>
                            <td>{{ $user->id}}  </td>
                            <td>{{ $user->name}}  </td>
                            <td>{{ $user->remark}}  </td>
                           </tr>
                                    @endforeach
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
