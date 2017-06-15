@extends('admin.layouts.template')
@section('page_heading')
@section('content')
        <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ลูกหนี้ไม่ผ่านอนุมัติ

</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                     <div class="col-md-2-sm-3">
                                       รายชื่อผู้ยื่นกู้ไม่ผ่าน
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
                                                  <th>ชื่อผู้ค้ำ</th>
                                                   <th>สถานะอนุมัติ</th>
                                                   <th>วันที่ยื่นกู้</th>
                                                   <th>ปีงบประมาณ</th>
                                                   <th></th>
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
                                                         @if($user->status == 1)
                                                        <td>ยังไม่ทำการอนุมัติ</td>
                                                         @elseif($user->status == 2)
                                                        <td>เห็นชอบ</td>
                                                         @elseif($user->status == 3)
                                                        <td>เห็นชอบ ปรับยอดเงินกู้</td>
                                                         @elseif($user->status == 4)
                                                        <td>ไม่เห็นชอบ</td>
                                                         @else
                                                        <td>ยังไม่ทำการอนุมัติ</td>
                                                        @endif
                                                        <td>{{ $user->date}}  </td>
                                                        <td>{{ $user->year}}  </td>
                                                            <td>
                                                            {{ link_to_route('Fund_debt_unpass.edit','',[$user->id_r],['class'=>'btn btn-info glyphicon glyphicon-edit ']) }}
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
