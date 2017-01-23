@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="page">
       <div class="row">
           <div class="col-md-12">
               <h1 class="page-header">ตั้งค่าแอคเคาท์</h1>
                {{ link_to_route('user.index','ย้อนกลับ ',null,['class'=>'btn btn-default pull-right']) }}
                <br />
                <br />
               <div class="panel panel-primary">

                   <div class="panel-heading">สมาชิก</div>

                   <div class="panel-body">


                     {!! Form::model($user,array('route'=>['user.update',$user->id],'method'=>'PUT')) !!}


                                    <div class="form-group">
                                        {!! Form::label('name','ชื่อ') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('email','อีเมล') !!}
                                        <p>{{$user->email}}</p>
                                    </div>
                                    <div class="form-group">
                                         <label>อำนาจแก้ไข</label>&nbsp;&nbsp;
                                         <label class="checkbox-inline">
                                               <input type="checkbox" id="c1" vaule="1"> งานกู้ยืมเงินกองทุนผู้สูงอายุ
                                           </label>
                                           <label class="checkbox-inline">
                                               <input type="checkbox" id="c2"> งานโครงการขอรับการสนับสนุน
                                           </label>
                                           <label class="checkbox-inline">
                                               <input type="checkbox" id="c3"> งานบัญชี
                                           </label>
                                           <label class="checkbox-inline">
                                               <input type="checkbox" id="c4"> งานติดตามถามทวงหนี้
                                           </label>
                                           <label class="checkbox-inline">
                                               <input type="checkbox" id="c5"> ประมวลผลกองทุน
                                           </label>
                                            <label class="checkbox-inline">
                                               <input type="checkbox" id="c6"> Super Admin
                                           </label>
                                      </div>
                                    {!! Form::hidden('rent', null,['id' => 'rent']) !!}
                                    {!! Form::hidden('project', null,['id' => 'project']) !!}
                                    {!! Form::hidden('account', null,['id' => 'account']) !!}
                                    {!! Form::hidden('debt', null,['id' => 'debt']) !!}
                                    {!! Form::hidden('process', null,['id' => 'process']) !!}
                                    {!! Form::hidden('role', null,['id' => 'role']) !!}
                                    <div class="form-group">
                                        {!! Form::button('เพิ่ม',['type'=>'submit','class'=>'btn btn-primary']) !!}
                                        {{ link_to_route('user.index','ย้อนกลับ',null,['class'=>'btn btn-danger','id'=>'add1']) }}
                                    </div>
                                    <div id="test"></div>
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
   <script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {

                //              alert(5);
                var ch1 =0 ;
                var ch2 =0 ;
                var ch3 =0 ;
                var ch4 =0 ;
                var ch5 =0 ;
                var ch6 =0 ;

          $('#c1').on('click',function(){
            if(ch1==0){
             $("#rent").val('1');
             ch1 =1 ;
            }else{
             $("#rent").val('0');
             ch1 ='0' ;
            }
             alert($("#rent").val());
            $("#test").html($("#rent").val());
          });

           $('#c2').on('click',function(){
            if(ch2==0){
             $("#project").val('1');
             ch2 =1 ;
            }else{
             $("#project").val('0');
             ch2 ='0' ;
            }
          //   alert($("#rent").val());
         //   $("#test").html($("#rent").val());
          });
          $('#c3').on('click',function(){
            if(ch3==0){
             $("#account").val('1');
             ch3 =1 ;
            }else{
             $("#account").val('0');
             ch3 ='0' ;
            }
          //   alert($("#rent").val());
         //   $("#test").html($("#rent").val());
          });
          $('#c4').on('click',function(){
            if(ch4==0){
             $("#debt").val('1');
             ch4 =1 ;
            }else{
             $("#debt").val('0');
             ch4 ='0' ;
            }
          //   alert($("#rent").val());
         //   $("#test").html($("#rent").val());
          });
          $('#c5').on('click',function(){
            if(ch5==0){
             $("#process").val('1');
             ch5 =1 ;
            }else{
             $("#process").val('0');
             ch5 ='0' ;
            }
           //  alert($("#process").val());
         //  $("#test").html($("#process").val());
          });
          $('#c6').on('click',function(){
            if(ch6==0){
             $("#role").val('1');
             $("#rent").val('1');
             $("#project").val('1');
             $("#account").val('1');
             $("#debt").val('1');
             $("#process").val('1');
             ch6 =1 ;
            }else{
             $("#role").val('0');
             $("#rent").val('0');
             $("#project").val('0');
             $("#account").val('0');
             $("#debt").val('0');
             $("#process").val('0');
             ch6 ='0' ;
            }
         //    alert($("#role").val());
         //  $("#test").html($("#role").val());
          });

    });

</script>
@stop
