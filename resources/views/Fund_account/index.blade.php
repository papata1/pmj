@extends('admin.layouts.template')
@section('page_heading')
@section('content')
        <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ชำระหนี้</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row --><br><br>

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                     <div class="col-md-2-sm-3">
                                       รายชื่อลูกหนี้
                                     </div>
                                     <div class="col-md-8">  </div>
                                   </div>
                                   <!-- /.panel-heading -->
                                   <div class="panel-body">
                                       <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                           <thead>
                                               <tr>
                                                            <th>รหัสบัตรประชาชน</th>
                                                            <th>ชื่อผู้กู้</th>
                                                            <th>ชื่อผู้คํ้า</th>
                                                            <th>เลขที่สัญญา</th>
                                                            <th>วันสิ้นสุดสัญญา</th>
                                                            <th>ปีงบประมาณ</th>
                                                            <td></td>
                                               </tr>
                                           </thead>
                                           <tbody>
                                                 @foreach($ser as $user)
                                                    <tr>
                                                        <td>{{ $user->id_p}}  </td>
                                                        <td>{{ $user->namei}} {{ $user->surename}}  </td>
                                                         @foreach($ser1 as $user1)
                                                        @if($user->id_r == $user1->id_r)
                                                        <td>{{ $user1->name}} {{ $user1->surename}}  </td>
                                                        @endif
                                                         @endforeach
                                                    <td>{{ $user->contect_id}}  </td>
                                                        <td>{{ $user->date_end}}  </td>
                                                        <td>{{ $user->year}}  </td>
                                                            <td>
                                                            {{ link_to_route('Fund_account.edit','ชำระหนี้',[$user->id_r],['class'=>'btn btn-info  ']) }}
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
