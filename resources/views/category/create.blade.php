@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-9">
               <h1 class="page-header">เพิ่มเรื่องของเข้ารับบริการ</h1>
               <div class="panel panel-default">

                   <div class="panel-heading"></div>

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
                                        {{ link_to_route('category.index','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}
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
@stop
