<div class="container container-jp">
    <div class="row">
        <div class="col-sm-3 boxmenu-jp">        
            <div class="page-header">
                <label>สถานะ :ผู้ดูแลระบบ</label>
            </div>
            <?php
                $this->renderPartial('formLogin');
            ?>
            <ul class="nav nav-pills nav-stacked" id="side-menu">

                <li class="active"><a href="index.php?r=Site/Index"><i class="fa fa-dashboard fa-fw"></i> หน้าหลัก</a></li>
                <li><a href="index.php?r=Products/Index"><i class="fa fa-dashboard fa-fw"></i> สินค้า</a></li>
                <li><a href="index.php?r=Products/add"><i class="fa fa-dashboard fa-fw"></i> เพิ่มสินค้าใหม่</a></li>
                <li><a href="index.php?r=Products/Category"><i class="fa fa-dashboard fa-fw"></i> เพิ่มประเภทสินค้า</a></li>

            </ul>
            <hr>
        </div><!--/left-->

        <!--center-->
        <div class="col-sm-9">
            <div class="row ">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-home fa-fw"></i> หนัาหลัก</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">43</div>
                                    <div>สินค้าทั้งหมด</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pie-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>ประเภทสินค้า</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">23</div>
                                    <div>สมาชิกทั้งหมด</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">23</div>
                                    <div>ใบเสร็จทั้งหมด</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!--<div class="row">-->
            <div class="col-lg-12">
            </div>
        </div>
    </div>
