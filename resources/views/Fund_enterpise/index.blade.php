@extends('admin.layouts.template')
@section('page_heading')
@section('content')
        <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">งานโครงการขอรับการสนับสนุน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                       <!-- /.row -->
                    <br><br>
                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                     <div class="col-md-2">
                                       ข้อมูลโครงการ
                                     </div>
                                     <div class="col-md-8">  </div>
                                      <!--ปุ่มเพิ่ม-->
                                    {{ link_to_route('Fund_enterpise.create','ลงทะเบียนโครงการ ',null,['class'=>'btn btn-success']) }}
                                   </div>
                                   <!-- /.panel-heading -->
                                   <div class="panel-body">
                                       <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                           <thead>
                                               <tr>
                                                    <th>ชื่อโครงการ</th>
                                                    <th>ชื่อองค์กรที่เสนอ</th>
                                                    <th>ประเภทโครงการ</th>
                                                    <th>ปีงบประมาณ</th>
                                                    <th>วันที่ยื่น</th>
                                                    <th width="170"></th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                           <!-- วนลูปเพื่อเอาข้อมูลออก -->
                                                  @foreach($ser as $user)
                                                    <tr>
                                                        <td>{{ $user->name_th}}  </td>
                                                        <td> {{ $user->company}}   </td>
                                                        @if($user->category=='1')
                                                        <td> องค์กรเอกชน มูลนิธิ </td>
                                                        @elseif($user->category=='2')
                                                        <td> องค์กรปกครองส่วนท้องถิ่น </td>
                                                        @elseif($user->category=='3')
                                                        <td> สถาบันการศึกษาหรือหน่วยราชการ </td>
                                                         @elseif($user->category=='4')
                                                        <td>องค์กร/ชมรมของผู้สูงอายุ  </td>
                                                        @else()
                                                        <td> {{ $user->category_other}} </td>
                                                        @endif
                                                        <td>{{ $user->year}}  </td>
                                                        <td>{{ $user->date}}  </td>
                                                            <td>
                                                            {!! Form::open(array('route'=>['Fund_enterpise.destroy',$user->id],'method'=>'DELETE')) !!}
                                                            {{ link_to_route('Fund_enterpise.show','',[$user->id],['class'=>'btn btn-default glyphicon glyphicon-eye-open ']) }}
                                                            <!--ปุ่มแก้ไข-->
                                                            {{ link_to_route('Fund_enterpise.edit','',[$user->id],['class'=>'btn btn-info glyphicon glyphicon-edit ']) }}
                                                            <!--ปุ่มลบ-->
                                                            {!! Form::button('',['class'=>'btn btn-danger glyphicon glyphicon-remove-sign del','type'=>'submit']) !!}
                                                            <a href={{ action('Fund_enterpiseController@excel',[$user->id] )}} class="btn btn-default fa fa-print"></a>
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
