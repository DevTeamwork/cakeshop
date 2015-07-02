<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sweet-cakes Website Template | Home :: w3layouts</title>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>-->
        <!-- Custom Theme files -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/style.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/jquery-ui/jquery-ui.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!----webfonts--->
<!--        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,800,400,600' rel='stylesheet' type='text/css'>-->
    <!---//webfonts--->
    
         <?php
        date_default_timezone_set("Asia/Bangkok");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/jquery.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery.validate.min.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/bootstrap.min.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/metisMenu/metisMenu.min.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/sb-admin-2.js");
        //Morris Charts JavaScript
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/morris/raphael.min.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/morris/morris.min.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/morris/morris-data.js");
        
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/jquery.dataTables.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/dataTables.bootstrap.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/dataTables.bootstrap.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery-ui/jquery-ui.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/cakeshop.frontend.script.js");
        
        ?>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <script type="text/javascript">
            $(function() {
               <?php if(Yii::app()->session['error_login'] == 'Y') : ?>
                   alert('อีเมล์หรือรหัสผ่านไม่ถูกต้องกรุณาลองใหม่อีกครั้ง');
                   <?php Yii::app()->session['error_login'] = null; ?>
                <?php endif; ?>
            });
            </script>
</head>
<body>
    <!-- container -->
    <!-- top-header -->
    <div class="top-header">
        <div class="container">
            <div class="top-header-left">
                <ul>
                    <?php if(!empty(Yii::app()->session["user_id"])) : ?>
                    <li><a href=""><?php echo Yii::app()->session["username"]; ?></a></li>
                    <li><a href="">ข้อมูลส่วนตัว</a></li>
                    <li><a href="index.php?r=frontend/logout">ออกจากระบบ</a></li>
                    <?php else : ?>
                    <li><a href="index.php?r=frontend/login">เข้าสู่ระบบ</a></li>
                    <li><a href="index.php?r=frontend/Register">สมัครสมาชิก</a></li>
                    <?php endif; ?>
                    <div class="clearfix"> </div>
                </ul>
            </div>
            <div class="top-header-center">
                <p><a style="color: #ffffff;" href="index.php?r=Cart/showCart"><span class="cart"> </span>ตะกร้าสินค้า</a></p>
            </div>
            <div class="top-header-right" >
                <ul>
                    <li>
                        <form>
                            <input type="text">
                            <input type="submit" value="" />
                        </form>

                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- /top-header -->
    <!-- main-menu -->
    <div class="main-menu">
        <div class="container">
            <div class="head-nav">
                <span class="menu"> </span>
                <ul>
                    <li class="active"><a href="index.php?r=frontend">หน้าแรก</a></li>
                    <li><a href="index.php?r=frontend/products">สินค้า</a></li>
                    <li><a href="#" style="margin-left: 80px;">เกี่ยวกับเรา</a></li>
                    <li><a href="#">ติดต่อเรา</a></li>
                    <div class="clearfix"> </div>
                </ul>
            </div>	
            <!-- script-for-nav -->
            <script>
                $("span.menu").click(function () {
                    $(".head-nav ul").slideToggle(300, function () {
                        // Animation complete.
                    });
                });
            </script>
            <!-- script-for-nav -->

            <!-- logo -->
            <div class="logo">
                <a href="index.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/logo.png" title="Sweetcake" /></a>
            </div>
            <!-- logo -->
        </div>
    </div>
    <!-- /main-menu -->
    
    <!-- content -->
    <?php echo $content; ?>
    
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <!--<div class="footer-top">
                <div class="col-md-3 location">
                    <h4>location</h4>
                    <p>#04 Dist.City,State,PK</p>
                    <h4>hours</h4>
                    <p>Weekdays 7 a.m.-7 p.m.</p>
                    <p>Weekends 8 a.m.-7 p.m.</p>
                    <p>Call for Holidays Hours.</p>
                </div>
                <div class="col-md-3 customer">
                    <h4>customer service</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. </p>
                    <h4>phone</h4>
                    <h6>1(234)567-8910</h6>
                    <h4>contact us</h4>
                    <h6>contact us page.</h6>
                </div>
                <div class="col-md-3 social">
                    <h4>get social</h4>
                    <div class="face-b">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/foot.png" title="name"/>
                        <a href="#"><i class="fb"> </i></a>
                    </div>
                    <div class="twet">		
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/foot.png" title="name"/>
                        <a href="#"><i class="twt"> </i></a>
                    </div>	
                </div>
                <div class="col-md-3 sign">
                    <h4>sign up for news later</h4>	
                    <form>
                        <input type="text" class="text" value="YOUR EMAIL" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'YOUR EMAIL ';
                                                        }">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>-->
            <div class="footer-bottom">
                <p>Template by <a href="http://w3layouts.com" target="_blank"> w3layouts</a></p>
            </div>
        </div>
    </div>
    <!-- /footer -->
</body>
</html>


