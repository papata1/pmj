@extends('admin.layouts.template')
@section('page_heading')
@section('content')
        <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ลูกหนี้ทั้งหมด</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                      <br><br>
                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                     <div class="col-md-2-sm-3">
                                       รายชื่อลูกหนี้ทั้งหมด
                                     </div>
                                     <div class="col-md-8">  </div>
                                   </div>
                                   <!-- /.panel-heading -->
                                   <div class="panel-body">
                                       <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                           <thead>
                                               <tr>
                                    <th>รหัสบัตรประชาชน</th>
                                    <th>เลขที่สัญญา</th>
                                    <th>ชื่อผู้กู้</th>
                                    <th>ชื่อผู้คํ้า</th>
                                    <th>วันที่ทำสัญญา</th>
                                    <th>วันสิ้นสุดสัญญา</th>
                                    <th>ปีงบประมาณ</th>
                                     <th width="80"></th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                                @foreach($ser as $user)
                                                    <tr>
                                                        <td>{{ $user->id_p}}  </td>
                                                        <td>{{ $user->contect_id}}  </td>
                                                        <td>{{ $user->namei}} {{ $user->surename}}  </td>
                                                         @foreach($ser1 as $user1)
                                                        @if($user->id_r == $user1->id_r)
                                                        <td>{{ $user1->name}} {{ $user1->surename}}  </td>
                                                        @endif
                                                         @endforeach
                                                    <td>{{ $user->date_start}}  </td>
                                                    <td>{{ $user->date_end}}  </td>
                                                        <td>{{ $user->year}}  </td>
                                                            <td>
                                                            {{ link_to_route('Fund_debt_all.edit','',[$user->id_r],['class'=>'btn btn-info glyphicon glyphicon-edit ']) }}
                                                            <a href={{ action('Fund_debt_allController@excel',[$user->id_r] )}} class="btn btn-default fa fa-print"></a>
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
