@extends('admin.layouts.template')
@section('page_heading')
@section('content')
        <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"style="font-family: 'THSarabun';">งานกู้ยืมเงินผู้สูงอายุ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->

                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading" >
                                     <div class="col-md-3" >
                                       ข้อมูลผู้กู้ยืมเงินผู้สูงอายุ
                                     </div>
                                     <div class="col-md-6">  </div>
                                    {{ link_to_route('Fund_borrowing.create','ลงทะเบียนผู้กู้ยืมเงินกองทุน ',null,['class'=>'btn btn-success']) }}
                                   </div>
                                   <!-- /.panel-heading -->
                                   <div class="panel-body">
                                       <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                           <thead>
                                               <tr>
                                                    <th>รหัสบัตรประชาชน</th>
                                                    <th>ชื่อผู้กู้</th>
                                                    <th>ชื่อผู้คํ้า</th>
                                                    <th>สถานะอนุมัติ</th>
                                                    <th>วันที่ยื่นกู้</th>
                                                    <th>ปีงบประมาณ</th>
                                                    <th width="170"></th>
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
                                                            {!! Form::open(array('route'=>['Fund_borrowing.destroy',$user->id_r],'method'=>'DELETE')) !!}
                                                            {{ link_to_route('Fund_borrowing.show','',[$user->id_r],['class'=>'btn btn-default glyphicon glyphicon-eye-open ']) }}
                                                            {{ link_to_route('Fund_borrowing.edit','',[$user->id_r],['class'=>'btn btn-info glyphicon glyphicon-edit ']) }}
                                                            {!! Form::button('',['class'=>'btn btn-danger glyphicon glyphicon-remove-sign del','type'=>'submit']) !!}
                                                             <a href={{ action('Fund_borrowingController@excel',[$user->id_r] )}} class="btn btn-default fa fa-print"></a>
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
