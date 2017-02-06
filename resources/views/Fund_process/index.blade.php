@extends('admin.layouts.template')
@section('page_heading')
@section('content')
        <div id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ประมวลผลข้อมูลกองทุน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                     
                       <div class="row">
                           <div class="col-lg-12">
                               <div class="panel panel-primary">
                                   <div class="panel-heading">
                                     <div class="col-md-3">
                                       ประมวลผลข้อมูล
                                     </div>
                                        <br />  
                                               </div>
                                  
                                  <div class="panel-body">


                              <div class="form-group col-md-12">
                              <label ><h4 style="font-weight:bold">เงื่อนไขแรก</h4></label>
                             </div>


                              <div class="col-md-6">
                               <div class="form-group">
                                       <label>เลือกปีงบประมาณ</label>
                                       <select class="form-control">
                                         <option>ทั้งหมด</option>
                                         <option>2560</option>
                                         <option>2559</option>
                                         <option>2558</option>
                                         <option>2557</option>
                                         <option>2556</option>
                                         <option>2555</option>
                                      </select>
                               </div>
                             </div>


                              <div class="col-md-6">
                               <div class="form-group">
                                       <label>เลือกเดือน</label>
                                       <select class="form-control">
                                         <option>ทั้งหมด</option>
                                         <option>มกราคม</option>
                                         <option>กุมพาพันธ์</option>
                                         <option>มีนาคม</option>
                                         <option>เมษายน</option>
                                         <option>พฤษภาคม</option>
                                         <option>มิถุนายน</option>
                                      </select>
                               </div>
                             </div>

                             <div class="col-md-6">
                              <div class="form-group">
                                      <label>ไตรมาศ</label>
                                      <select class="form-control">
                                        <option>ทั้งหมด</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                     </select>
                              </div>
                            </div>




                            <div class="form-group col-md-12">
                            <label ><h4 style="font-weight:bold">เงื่อนไขสอง</h4></label>
                            </div>

                              <div class="col-md-6">
                               <div class="form-group">
                                       <label>ประเภท</label>
                                       <select class="form-control">
                                         <option>อำเภอ</option>
                                         <option>ช่วงอายุ</option>
                                         <option>อาชีพ</option>
                                         <option>โครงการ</option>
                                         <option>ข้อมูลผู้ชำระหนี้</option>
                                         <option>เพศ</option>
                                      </select>
                              </div>
                            </div>

                            <div class="col-md-6">
                             <div class="form-group">
                                     <label>ข้อมูล</label>
                                     <select class="form-control">
                                       <option>ข้อมูลบุคคลทั้งหมด</option>
                                       <option>ข้อมูลลูกหนี้ทั้งหมด</option>
                                       <option>ข้อมูลลูกหนี้ค้างชำระ</option>
                                       <option>ข้อมูลสถิติการอนุมัติ</option>
                                       <option>ข้อมูลผู้ที่ชำระครบแล้ว</option>
                                    </select>
                            </div>
                          </div>

                          <div class="form-group col-md-12">
                          <label ><h4 style="font-weight:bold">เงื่อนไขสาม</h4></label>
                          </div>

                          <div class="col-md-12">
                            <div class="col-md-6">
                             <div class="form-group">
                                     <label>ค่าที่ออกมา</label>
                                     <select class="form-control">
                                       <option>จำนวนคน</option>
                                       <option>จำนวนเงิน</option>
                                    </select>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12" align="center">
                            <a href="" class="btn btn-primary" >ประมวลผล</a>
                            <a href="../file/แบบฟอร์มตารางรายงานการรับชำระหนี้ลูกหนี้กู้ยืมเงินทุนประกอบอาชีพรายบุคคล.xlsx" class="btn btn-success">Download Excel</a>
                            </div>

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


@stop
