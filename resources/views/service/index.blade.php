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
                                       ข้อมูลผู้เข้ารับบริการ
                                     </div>
                                     <div class="col-md-8">  </div> 
                                    {{ link_to_route('service.create','ลงทะเบียนผู้รับบริการ ',null,['class'=>'btn btn-success']) }}
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
                                                   <th>สถานะดำเนินการ</th>
                                                   <th>วันที่ยื่น</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                                    @foreach($ser as $user)
                                                    <tr>
                                                        <td>{{ $user->id_p}}  </td>
                                                        <td>{{ $user->name}} {{ $user->surename}}  </td>
                                                        <td>{{ $user->status}}  </td>
                                                        <td>{{ $user->date}}  </td>
                                                        <td>{{ $user->year}}  </td>
                                                            <td>
                                                            {!! Form::open(array('route'=>['service.destroy',$user->id],'method'=>'DELETE')) !!}
                                                            {{ link_to_route('service.edit','',[$user->id],['class'=>'btn btn-info fa fa-arrow-circle-right']) }}
                                                            {!! Form::button('',['class'=>'btn btn-default fa fa-print','type'=>'submit']) !!}
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
