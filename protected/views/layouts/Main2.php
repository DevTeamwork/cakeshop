<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title>เว็บฐานข้อมูลศิษย์เก่า</title>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/bootstrap.min.css"/>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/plugins/timeline.css" rel="stylesheet" />

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/sb-admin-2.css" rel="stylesheet" />

<!--<link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/plugins/morris.css" rel="stylesheet" />-->
<!--<link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet"  type="text/css"/>-->
        
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet"  type="text/css"/>
        
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/fonts/thsarabunnew.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/jquery-step/css/jquery.steps.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/SimpleCropper/css/jquery.Jcrop.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/BootstrapImageGallery/css/bootstrap-image-gallery.css" rel="stylesheet" type="text/css"/>



        <style>
            body{ 
                font-family: 'THSarabunNew', sans-serif; 

            }
            .type{ font-family: 'THSarabunNew', sans-serif; height: 5em; width: 98%;font-size: 1em;clear: both;margin: 20px auto 10px;padding: 5px 1%; }

            #banner.home-page {
                margin-top: 1em;
                margin-bottom: 0em;
                /*padding-top: 20px;
		height: 50%;*/
            }
            .home-page {
                /*background-color: #eeeeee;*/
            }
            
            .home-three {
                /*text-align: center;*/
                background-color: #f8f8f8;
            }
            
            #inner-content {
                margin-left: -15px;
                margin-right: -15px;
            }
			
            .jumbotron {
                padding-top: 2em;
                padding-bottom: 0em; 
            }

            .col-lg-9 {
                margin-top: 2em;
            }

/*            .stars {
                margin:20px auto 1px;    
            }*/
            #info + .readmore-js-toggle { padding-bottom: 1.5em; border-bottom: 1px solid #999; font-weight: bold;}

            .navbar-sm {min-height:30px}
            .navbar-sm .navbar-brand,
            .navbar-sm .navbar-nav>li>a {padding-top:5px; padding-bottom:5px}
            .navbar-sm .navbar-brand {height: 30px}
            .navbar-sm .navbar-toggle {margin: 3px 9px 3px 0px; padding: 4px 4px 4px 4px;}
            .navbar-sm .navbar-toggle .icon-bar {width: 16px;}
            
            .img-thumbnail {
                display: inline-block;
                width: 100% \9;
                max-width: 30%;
                /*height: auto;*/
                padding: 4px;
                line-height: 1.42857143;
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 4px;
                -webkit-transition: all .2s ease-in-out;
                -o-transition: all .2s ease-in-out;
                transition: all .2s ease-in-out;
            }

             </style>

        <?php
        date_default_timezone_set("Asia/Bangkok");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/jquery.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery.validate.min.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/banner.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/bootstrap.min.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/metisMenu/metisMenu.min.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/sb-admin-2.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/ckeditor/ckeditor.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/ckeditor/adapters/jquery.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/websites.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/formValidateSites.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery-step/jquery.steps.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/SimpleCropper/scripts/jquery.Jcrop.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/SimpleCropper/scripts/jquery.SimpleCropper.js");
//                Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/checkboxs.js");
//                Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/ckeditorScript.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/readmore/readmore.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/readmoreScript.js");
//                Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/dataTables/js/jquery.dataTables.js");
//                    <!-- DataTables JavaScript -->
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/jquery.dataTables.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/dataTables.bootstrap.js");
        
        ?>
        <!--<script src="http://templateplanet.info/tooltip.js"></script>-->
        <script>
            
            $(function (){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>

        <?php
        $logoSrc = Yii::app()->request->baseUrl . "/images/new-logo.png";
        $bannerSrc = Yii::app()->request->baseUrl . "/images/bk-eco.jpg";
        ?>

    <body>
        <!--<div id="banner" class="home-page">-->    
        <div class="container">
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="menuAdmin">
                            <li>
                                <a href="index.php?">
                                    <i class="glyphicon glyphicon-home"></i> 
                                    เว็บฐานข้อมูลศิษย์เก่า
                                </a>
                            </li>   
                            <li>
                                <a href="index.php?r=websites/create">
                                    <i class="glyphicon glyphicon-new-window"></i> 
                                    สร้างไซต์
                                </a>
                            </li>               
                            <li>
                                <a href="index.php?r=websites/index">
                                    <i class="glyphicon glyphicon-tasks"></i> 
                                    เว็บไซต์ทั้งหมด
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav" id="menuUser">
                            <li>
                                <a href="index.php?">
                                    <i class="glyphicon glyphicon-home"></i> 
                                    หน้าแรก
                                </a>
                            </li>   
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-new-window"></i> 
                                    คู่มื่อใช้งาน
                                </a>
                            </li>               
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-tasks"></i> 
                                    เกี่ยวกับเรา
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-top-links navbar-right">   
                            <!-- /.dropdown -->
                            <li id="menu_logout"><a href="index.php?r=Websites/Logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                    </li>                            
                            <!-- /.dropdown -->
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav> <!-- mainmenu -->
            </div> <!-- end .container-->
        </div>

        <div class="container home-three" style="padding-top: 60px;">
	<div class="row">
	<?php echo $content; ?> 	
	</div>  <!--end .row-->
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 footer-below">
                        <hr>
                        <p>Copyright © RMUTI | <a href="">Privacy Policy</a> | <a href="">Terms of Use</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </body>

</html>



