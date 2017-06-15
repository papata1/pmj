@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')
    <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ข้อมูลการชำระหนี้</h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
            </div>
                       <!-- /.row -->
                       {{ link_to_route('Fund_account.index','ย้อนกลับ',null,['class'=>'btn btn-default pull-right']) }}
                       <br />
                       <br />

                       <div class="row">
                           <div class="col-lg-12">

                               <div class="panel panel-default">
                                   <div class="panel-heading">

                                                                                                  <div class="col-md-3">
                                       ชำระหนี้
                                     </div>
                                                                              <div class="col-md-7">  </div>
                     {{ link_to_route('Fund_borrowing.show','ข้อมูลบุคคล',[$service],['class'=>'btn btn-default']) }}
                                   </div>
                                   <!-- /.panel-heading -->

                                       <div class="panel-body">


                                        {!! Form::model($service,array('route'=>['service.update',$service],'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}

                                          <br / >
                                               <h4 style="font-weight:bold;">ดำเนินการ</h4>
                                      <hr />


                                      <label class="col-lg-2 ">เลขที่สัญญา</label>
                                      <input type="text" class="col-lg-3" name="contect_id" value="{{$ser1->contect_id}}" disabled/>
                                      <label  class="col-lg-1"></label>
                                      <label  class="col-lg-2 text-right">รหัสผู้กู้</label>
                                      <input type="text" class="col-lg-3" placeholder=""  name="no" value="{{$ser1->no}}" disabled/>
                                      <div class="col-lg-12"> <br />  </div>

                                      <label class="col-lg-2 "> จ่ายให้กู้</label>
                                      <input type="date" class="col-lg-3"  name="date_count" value="{{$ser1->date_count}}" disabled/>
                                      <label  class="col-lg-1"></label>
                                      <label  class="col-lg-2 text-right">วันเริ่มนับจ่ายงวด</label>
                                      <input type="date" class="col-lg-3" placeholder=""  name="date_loan" value="{{$ser1->date_loan}}" disabled/>
                                      <div class="col-lg-12"> <br />  </div>

                                      <label  class="col-lg-2 ">กำหนดเวลาผ่อนชำระ</label>
                                      <input type="text" class="col-lg-3"  name="time_total" value="{{$ser1->time_total}}" disabled/>
                                      <label  class="col-lg-1">เดือน</label>
                                      <label  class="col-lg-2 text-right"></label>
                                      <div class="col-lg-12"> <br />  </div>

                                      <label class="col-lg-2 ">วันเริ่มสัญญา</label>
                                      <input type="date" class="col-lg-3" name="date_start" value="{{$ser1->date_start}}" disabled/>
                                      <label  class="col-lg-1"></label>
                                      <label  class="col-lg-2 text-right">วันครบกำหนดสัญญา</label>
                                      <input type="date" class="col-lg-3" name="date_end" value="{{$ser1->date_end}}" disabled/>
                                      <label  class="col-lg-1"></label>
                                      <div class="col-lg-12"> <br />  </div>


                                      <label class="col-lg-2 ">ชำระงวดละ</label>
                                      <input type="text" class="col-lg-3" name="return_money" value="{{$ser1->return_money}}" disabled/>
                                      <label  class="col-lg-1">บาท</label>
                                      <label  class="col-lg-2 text-right">ทั้งสิ้น</label>
                                      <input type="text" class="col-lg-3"name="return_money_total" value="{{$ser1->return_money_total}}" disabled/>
                                      <label  class="col-lg-1">งวด</label>
                                      <div class="col-lg-12"> <br />  </div>

                                      <label class="col-lg-2 ">งวดสุดท้าย</label>
                                      <input type="text" class="col-lg-3" name="return_money_last" value="{{$ser1->return_money_last}}" disabled/>
                                      <label  class="col-lg-7 ">บาท</label>
                                      <div class="col-lg-12"> <br />  </div>


                              <div class="col-lg-12">
                              <h4 style="font-weight:bold;">ข้อมูลเงินกู้</h4>
                              <hr /></div>

                              <label class="col-lg-2 ">วงเงินที่กู้ยืม</label>
                              <input type="text" class="col-lg-3"  disabled name="debt" value="{{$ser3->money}}"/>
                              <label  class="col-lg-1">บาท</label>
                              <label  class="col-lg-2 text-right">ยอดชำระแล้ว</label>
                              <input type="text" class="col-lg-3" disabled name="payed" value="{{$ser3->money_payed}}"/>
                              <label  class="col-lg-1">บาท</label>
                              <div class="col-lg-12"> <br />  </div>



                              <label class="col-lg-2 ">งวดค้างชำระ จำนวน</label>
                              <input type="text" class="col-lg-3"  disabled name="no_payed" value="{{$ser3->mounth_remain}}"/>
                              <label  class="col-lg-1">งวด</label>
                              <label  class="col-lg-2 text-right">ยอดคงเหลือ</label>
                              <input type="text" class="col-lg-3" disabled name="remain_round" value="{{$ser3->money_remain}}"/>
                              <label  class="col-lg-1">บาท</label>
                              <div class="col-lg-12"> <br />  </div>


                              <label class="col-lg-2 ">ชำระล่าสุด</label>
                              <input type="text" class="col-lg-3"  disabled name="money_remain" @if($ser5)value="{{$ser5->total}}" @endif/>
                              <label  class="col-lg-1"></label>
                              <label  class="col-lg-2 text-right">วันที่ชำระครั้งล่าสุด</label>
                              <input type="text" class="col-lg-3" disabled name="date_loan" @if($ser5)value="{{$ser5->date_pay}}" @endif/>
                              <label  class="col-lg-1"></label>
                              <div class="col-lg-12"> <br />  </div>

                              <label class="col-lg-2 ">อาชีพประสงค์กู้</label>
                              <input type="text" class="col-lg-3"  disabled name="date_ga" value="{{$ser3->forwhat}}"/>
                              <label  class="col-lg-1"></label>
                              <label  class="col-lg-2 text-right">รายละเอียดอาชีพ</label>
                              <input type="text" class="col-lg-3" disabled name="return_money_last" value="{{$ser3->job_remark}}"/>
                              <label  class="col-lg-1"></label>
                              <div class="col-lg-12"> <br />  </div>



                                                                  <div class="form-group col-lg-12" >
                                                                                        <div class="form-group" align="center">
                                {{ link_to_route('Fund_account.show','ชำระหนี้',[$service],['class'=>'btn btn-primary glyphicon glyphicon-check']) }}
                                      </div>
     </div>

                                    {!! Form::close() !!}
                          </div>
                          <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->

                  </div>
                  <!-- /.col-lg-12 -->
                </div><!-- /row -->

        <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                  <div class="panel-heading">

                      <div class="col-md-2">
                        ตารางชำระหนี้
                      </div>
                      <div class="col-md-8">  </div>
           <a href={{ action('Fund_accountController@excel',[$service] )}} class="btn btn-success fa fa-print">ประวัติชำระเงิน</a>
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ครั้งที่</th>
                                <th>วันที่ชำระ</th>
                                <th>ช่องการการชำระ</th>
                                <th>เลขที่ธนาณัติ</th>
                                <th>ยอดชำระ</th>
                                <th>เล่มที่ใบเสร็จ</th>
                                <th>เลขที่ใบเสร็จ</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                                             @foreach($ser2 as $user)
                                                    <tr>
                                                        <td>{{ $loop->iteration}}  </td>
                                                       <td>{{ $user->date_pay}}  </td>
                                                        <td>{{ $user->place_pay}} </td>
                                                        <td>{{ $user->order_no}}  </td>
                                                        <td>{{ $user->total}}  </td>
                                                        <td>{{ $user->bill_book}} </td>
                                                        <td>{{ $user->bill_no}}  </td>
                                                        <td>
                                                        {{ link_to_route('Fund_account_bill.edit','',[$user->id_r],['class'=>'btn btn-info glyphicon glyphicon-edit ']) }}
                                                        {{ link_to_route('Fund_account_bill.show','',[$user->id_r],['class'=>'btn btn-danger glyphicon glyphicon-remove-sign del ']) }}
                                                         </td>   
                                                    </tr>
                                                    @endforeach
                        </tbody>
                    </table>

                </div><!-- /#panel body -->

              </div><!-- /#panel panel -->
         </div><!-- /.col-lg-12 -->
      </div><!-- /#row -->



                                   </div>
                                   <!-- /.panel-body -->
                                    @if($errors->any())
                                    <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    @endif
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
<script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {
         $('#dataTables-example').on('click', '.del', function() {
          var x = confirm("ต้องการลบใช่ไหม?");
          if (x) {
             return true;
        }
          else {
          event.preventDefault();
                return false;
            }
         });


    });


</script>
@stop
