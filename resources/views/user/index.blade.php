@extends('admin.layouts.template')
@section('page_heading')
@section('content')
<class="container">
  			<div class="form-group"><h1 class="page-header">ตั้งค่าผู้ใช้งาน</h1></div>

<p>
</p>
<div class="bs-example" data-example-id="bordered-table">.
    <div class="row">
        <div class="col-lg-12">
<div class="panel panel-default" >
    <div class="panel-heading">
        <div class="col-lg-2">ตารางสมาชิก</div><div class="col-lg-8"></div>{{ link_to_route('user.create','เพิ่มผู้ใช้งาน ',null,['class'=>'btn btn-success']) }}
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>อีเมลล์</th>
                <th>อำนาจแก้ไข</th>
                <th width="70">จัดการ</th>
            </tr>
              </thead>
              <tbody>
            <?php
            $i = 1 ;
            ?>
                @foreach($users as $user)
                <tr>
                
                     <td>{{$i}}  </td>
                     <td>{{ $user->name}}  </td>
                     <td>{{ $user->email}}  </td>
                    <td>
                    @if($user->role != 1)
                        @if($user->rent == 1)
                        &nbsp;&nbsp;งานกู้ยืมเงินกองทุนผู้สูงอายุ&nbsp;&nbsp;
                        @endif
                        @if($user->project == 1)
                        &nbsp;&nbsp;งานโครงการขอรับการสนับสนุน&nbsp;&nbsp;
                        @endif
                        @if($user->account == 1)
                        &nbsp;&nbsp;งานบัญชี&nbsp;&nbsp;
                        @endif
                        @if($user->debt == 1)
                        &nbsp;&nbsp;งานติดตามถามทวงหนี้&nbsp;&nbsp;
                        @endif
                        @if($user->process == 1)
                        &nbsp;&nbsp;ประมวลผลกองทุน&nbsp;&nbsp;
                        @endif
                    @else
                    &nbsp;&nbsp;Super Admin&nbsp;&nbsp;
                    @endif
                    </td>
                         <td>
                           {!! Form::open(array('route'=>['user.destroy',$user->id],'method'=>'DELETE')) !!}
                        {{ link_to_route('user.edit','',[$user->id],['class'=>'btn btn-info glyphicon glyphicon-edit']) }}
                           {!! Form::button('',['class'=>'btn btn-danger glyphicon glyphicon-remove-sign del','type'=>'submit']) !!}
                           {!! Form::close() !!}
                         </td>
                         <?php
                            $i++ ;
                            ?>
                 </tr>
                @endforeach
              </tbody>
        </table>
    </div>   </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

</div>


@stop
