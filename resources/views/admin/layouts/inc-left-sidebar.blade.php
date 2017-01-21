<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">          
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> หน้าแรก</a>
                        </li>
                                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> งานกองทุนผู้สูงอายุ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html"></a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> งานผู้เข้ารับบริการ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href={{ action('ServiceController@index')}}>จัดการผู้เข้ารับบริการ</a>
                                </li>
                                <li>
                                    <a href={{ action('CategoryController@index')}}>จัดการเรื่องรับบริการ</a>
                                </li>
                                <li>
                                    <a href="morris.html">ประมวลผลข้อมูลบริการ</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>