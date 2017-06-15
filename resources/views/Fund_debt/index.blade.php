@extends('admin.layouts.template')
@section('page_heading')
@section('content')
        <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ลูกหนี้ที่ค้างชำระ</h1>
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
                                       รายการติดตามทวงหนี้
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
                                    <th>ปีงบประมาณ</th>
                                    <th>สถานะการติดตามหนี้</th>
                                    <th width="80"></th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                                @foreach($ser as $user)

                                                    <?php
                                                        $ldate = date('Y-m-d');
                                                        $date1=date_create($ldate);
                                                        $date2=date_create($user->date_latest);
                                                        $diff=date_diff($date1,$date2);
                                                           // dd($diff->format("%R%a"));
                                                    ?>
                                                        @if($diff->format("%R%a") <=  -31)
                                                        <tr>
                                                        <td>{{ $user->id_p}}  </td>
                                                        <td>{{ $user->contect_id}}  </td>
                                                        <td>{{ $user->name}} {{ $user->surename}}  </td>
                                                        <td>{{ $user->year}}  </td>
                                                        <td>จ่ายล่าช้าไป <?php  echo floor($diff->format("%a")/30); ?> งวด</td>
                                                            <td>
                                                            {{ link_to_route('Fund_debt.edit','',[$user->id_r],['class'=>'btn btn-info glyphicon glyphicon-edit ']) }}
                                                            <a href={{ action('Fund_debtController@excel',[$user->id_r,'1'] )}} class="btn btn-default fa fa-print"></a>
                                                            </td>
                                                    </tr>

                                                        @endif
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
