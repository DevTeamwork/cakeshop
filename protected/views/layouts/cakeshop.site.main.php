<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CakeShop Admin</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/bootstrap.min.css"/>

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/plugins/metisMenu/metisMenu.min.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/sb-admin-2.css"/>

    <!-- Custom Fonts -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet"  type="text/css"/>
    
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <?php
        date_default_timezone_set("Asia/Bangkok");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/jquery.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery.validate.min.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/bootstrap.min.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/metisMenu/metisMenu.min.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/sb-admin-2.js");
        //Morris Charts JavaScript
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/morris/raphael.min.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/morris/morris.min.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/morris/morris-data.js");
        
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/jquery.dataTables.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/dataTables.bootstrap.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/dataTables.bootstrap.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/cakeshop.product.script.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/cakeshop.bank.script.js");
        
        ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CakeShop Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li id="dashboard">
                            <a href="index.php?r=Site/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li id="product">
                            <a href="index.php?r=Products/index"><i class="fa fa-bar-chart-o fa-fw"></i> ระบบสินค้า<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li id="index">
                                    <a href="index.php?r=Products/index"><i class="fa fa-bar-chart-o fa-fw"></i> สินค้าทั้งหมด</a></a>
                                </li>
                                <li id="add">
                                    <a href="index.php?r=Products/add"><i class="fa fa-plus fa-fw"></i> เพิ่มสินค้าใหม่</a>
                                </li>
                                <li id="category">
                                    <a href="index.php?r=Products/Category"><i class="fa fa-plus fa-fw"></i> เพิ่มประเภทสินค้า</a>
                                </li>
                                <li id="new">
                                    <a href="index.php?r=Products/New"><i class="fa fa-bar-chart-o fa-fw"></i> สินค้ามาใหม่</a>
                                </li>
                                <li id="bestsellers">
                                    <a href="index.php?r=Products/Bestsellers"><i class="fa fa-bar-chart-o fa-fw"></i> สินค้าขายดี</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li id="bank">
                            <a id="index" href="index.php?r=Banks/Index"><i class="fa fa-table fa-fw"></i> เพิ่มธนาคาร</a>
                        </li>
                        <li id="orders">
                            <a href="index.php?r=Reports/Orders"><i class="fa fa-edit fa-fw"></i> บิลทั้งหมด</a>
                        </li>
                        <li id="bills_limit">
                            <a href="index.php?r=Reports/BillsLimitdate"><i class="fa fa-edit fa-fw"></i> แจ้งเตือนให้ชำระเงิน</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> สรุปยอดขาย</a>
                        </li>
                        <li id="comfirmPayment">
                            <a href="index.php?r=Reports/ComfirmPayment"><i class="fa fa-edit fa-fw"></i> รายการแจ้งโอน</a>
                        </li>
                        <li id="notification">
                            <a href="index.php?r=Reports/Notification"><i class="fa fa-edit fa-fw"></i> รายการแจ้งเตือนบิลที่ยังไม่จ่ายเงิน</a>
                        </li>
                        <li id="logout">
                            <a href="index.php?r=Site/"><i class="fa fa-close fa-fw"></i> ออกจากระบบ</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <?php echo $content; ?> 
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>

