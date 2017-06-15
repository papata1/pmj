@extends('admin.layouts.template')
@section('page_heading')
@section('content')
        <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">จัดการผู้เข้ารับบริการ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default" >
                                   <div class="panel-heading" style="background-color:#CC99FF;border-color:#CC99FF;" >
                                     <div class="text-right">
                                       {{ link_to_route('service_fix.create','ลงทะเบียนผู้รับบริการ ',null,['class'=>'btn btn-success']) }}
                                     </div>
                                   </div>
                                   <!-- /.panel-heading -->
                                   <div class="panel-body">
                                       <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                           <thead>
                                               <tr>
                                                   <th>รหัสบัตรประชาชน</th>
                                                   <th>ชื่อ-นามสกุล</th>
                                                   <th>ประเภทงาน</th>
                                                   <th>ลักษณะ</th>
                                                   <th>วันที่ยื่น</th>
                                                   <th>ปีงบประมาณ</th>
                                                   <th width="170"></th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                                    @foreach($ser as $user)
                                                    <tr>
                                                        <td>{{ $user->id_p}}  </td>
                                                        <td>{{ $user->iname}} {{ $user->surename}}  </td>
                                                        <td>{{ $user->cname}}  </td>
                                                        <td>{{ $user->remark}}  </td>
                                                        <td>{{ $user->date}}  </td>
                                                        <td>{{ $user->year}}  </td>


                                                            <td>
                                                            {!! Form::open(array('route'=>['service_fix.destroy',$user->id_rela],'method'=>'DELETE')) !!}
                                                            {{ link_to_route('service_fix.show','',[$user->id_rela],['class'=>'btn btn-default glyphicon glyphicon-eye-open']) }}
                                                            {{ link_to_route('service_fix.edit','',[$user->id_rela],['class'=>'btn btn-info glyphicon glyphicon-edit ']) }}
                                                            {!! Form::button('',['class'=>'btn btn-danger glyphicon glyphicon-remove-sign del','type'=>'submit']) !!}
                                                            <a href={{ action('Service_fixController@excel',[$user->id_rela] )}} class="btn btn-default fa fa-print"></a>
                                                            {!! Form::close() !!}
                                                            </td>
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
