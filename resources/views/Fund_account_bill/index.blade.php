@extends('admin.layouts.template')
@section('page_heading')
@section('content')
        <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รายการใบเสร็จรับเงิน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row --><br><br>

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                     <div class="col-md-2-sm-3">
                                       รายการใบเสร็จรับเงิน
                                     </div>
                                   </div>

                                   <!-- /.panel-heading -->
                                   <div class="panel-body">
                                       <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                           <thead>
                                               <tr>
                                                             <th>เล่มที่ใบเสร็จ</th>
                                                            <th>เลขที่ใบเสร็จ</th>
                                                            <th>วันที่ชำระ</th>
                                                            <th>ได้รับเงินจาก</th>
                                                            <th>เลขที่ธนาณัติ</th>
                                                            <th>เลขที่สัญญา</th>
                                                            <th>ปีงบประมาณ</th>
                                                            <th width="80"></th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                                   @foreach($ser as $user)
                                                    <tr>
                                                        <td>{{ $user->bill_book}}  </td>
                                                       <td>{{ $user->bill_no}}  </td>
                                                        <td>{{ $user->date_pay}} </td>
                                                        <td>{{ $user->name}} {{ $user->surename}}</td>
                                                        <td>{{ $user->order_no}}  </td>
                                                        <td>{{ $user->contect_id}}  </td>
                                                        <td>{{ $user->year}}  </td>
                                                        <td>

                              {{ link_to_route('Fund_account_bill.edit','',[$user->id_r],['class'=>'btn btn-info glyphicon glyphicon-edit ']) }}
                            {{ link_to_route('Fund_account_bill.show','',[$user->id_r],['class'=>'btn btn-danger glyphicon glyphicon-remove-sign del ']) }}

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
