<div class="navbar-default sidebar" role="navigation" id="test"style="border-top: 1px solid #6F0DA8;" >
                <div class="sidebar-nav navbar-collapse" >
                    <ul class="nav" id="side-menu" >
                            <!-- /input-group -->
                            <li class="sidebar-search">
                                <div class="text-center">
                                <img src="{{ URL::to('/') }}/images/logo.png" width="100"  />
                            <!-- /input-group -->
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href={{ action('HomeController@index')}}><i class="fa fa-home"></i>  หน้าแรก</a>
                        </li>
                           <li>
                            <a href="#"><i class="fa fa-sitemap"></i> งานกองทุนผู้สูงอายุ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href={{ action('Fund_borrowingController@index')}} class="fa fa-dot-circle-o"> งานกู้ยืมเงินกองทุนผู้สูงอายุ</a>
                                </li>
                                <li>
                                    <a href={{ action('Fund_enterpiseController@index')}} class="fa fa-dot-circle-o"> งานโครงการขอรับการสนับสนุน</a>
                                </li>


                             <li>
                                 <a href="#" ><i class="fa fa-dot-circle-o"></i>  งานบัญชี<span class="fa arrow"></span></a>
                                 <ul class="nav nav-third-level">
                                   <li>
                                       <a href={{ action('Fund_accountController@index')}} class="fa fa-minus"> ชำระหนี้</a>
                                   </li>
                                   <li>
                                        <a href={{ action('Fund_account_billController@index')}} class="fa fa-minus"> รายการใบเสร็จรับเงิน</a>
                                   </li>
                                   <li>
                                        <a href={{ action('Fund_account_exportController@index')}} class="fa fa-minus"> ดึงข้อมูลรายงาน</a>
                                   </li>

                                 </ul>
                             </li>



                                <li>
                                    <a href="#" ><i class="fa fa-dot-circle-o"></i>  งานติดตามทวงหนี้<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">

                                      <li>
                                          <a href={{ action('Fund_debtController@index')}} class="fa fa-minus"> ลูกหนี้ที่ค้างชำระ</a>
                                      </li>
                                      <li>
                                          <a href={{ action('Fund_debt_allController@index')}} class="fa fa-minus"> ลูกหนี้ทั้งหมด</a>
                                      </li>
                                      <li>
                                          <a href={{ action('Fund_debt_passController@index')}} class="fa fa-minus"> อนุมัติเป็นลูกหนี้</a>
                                      </li>
                                      <li>
                                          <a href={{ action('Fund_debt_unpassController@index')}} class="fa fa-minus"> ลูกหนี้ไม่ผ่านอนุมัติ</a>
                                      </li>

                                    </ul>
                                </li>
                                <li>
                                    <a href={{ action('Fund_processController@index')}} class="fa fa-bar-chart-o "> ประมวลผลข้อมูลกองทุน</a>
                                </li>
                            <!-- /.nav-second-level -->
                          </ul>
                        <li>
                            <a href="#"><i class="fa fa-group"></i> งานผู้เข้ารับบริการ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href={{ action('Service_fixController@index')}} class="fa fa-dot-circle-o"> จัดการผู้เข้ารับบริการ</a>
                                </li>
                                <li>
                                    <a href={{ action('CategoryController@index')}} class="fa fa-dot-circle-o"> จัดการเรื่องรับบริการ</a>
                                </li>
                                <li>
                                    <a href={{ action('Service_processController@index')}} class="fa fa-bar-chart-o "> ประมวลผลข้อมูลบริการ</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
