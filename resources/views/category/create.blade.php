@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-8 col-md-offset-2">.
               <h1 class="page-header">ตั้งค่าแอดมิน</h1>
               <div class="panel panel-default">

                   <div class="panel-heading">สมาชิก</div>

                   <div class="panel-body">

                     {!! Form::open(array('route'=>'category.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}

                                  <div class="form-group">
                                      {!! Form::label('name','ลักษณะงาน') !!}
                                      {!! Form::text('name',null,['class'=>'form-control']) !!}
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('remark','ประเภทงาน') !!}
                                      {!! Form::text('remark',null,['class'=>'form-control']) !!}
                                  </div>
                                    <div class="form-group">
                                        {!! Form::button('เพิ่ม',['type'=>'submit','class'=>'btn btn-primary']) !!}
                                        {{ link_to_route('user.index','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}
                                    </div>
                                {!! Form::close() !!}
                   </div>
               </div>
                                     @if($errors->any())
                                    <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    @endif
           </div>
       </div>
   </div>
@stop
