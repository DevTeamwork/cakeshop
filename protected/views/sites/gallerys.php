<?php
$website_id = $websites->website_id;
$site_name = $websites->name;
$site_university = $websites->university;
$site_banner = $websites->banner;
$site_logo = $websites->logo;
?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/BootstrapImageGallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/BootstrapImageGallery/css/bootstrap-image-gallery.css">
<!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/BootstrapImageGallery/css/demo.css">-->

<?php
$this->renderPartial('_configWebsites', array("websites" => $websites, 'is_admin' => $is_admin));
?>
<div class="container container-jp">
    <div class="row">
        <!--left-->    
        <div class="col-sm-3 boxmenu-jp">
            <div class="page-header">
                <label>สถานะ :  <?php
                    if ($userid != null) {
                        if ($is_admin == TRUE) {
                            echo 'ผู้ดูแลระบบ';
                        } else {
                            echo 'สมาชิก ';
                            ;
                        }
                    } else {
                        echo 'ผู้เยี่ยมชม';
                    }
                    ?></label>
            </div>
            <?php
            if ($userid == '') {
                $this->renderPartial('formLogin', array("websites" => $websites));
            }
            ?>
            <div class="nav nav-pills nav-stacked">
                <ul class="nav nav-pills nav-stacked" id="side-menu">
                    <?php
                    echo '<li><a href="index.php?r=Sites/Index&id=' . $website_id . '"><i class="fa fa-home fa-fw"></i> หน้าหลัก</a></li>';
                    if ($websites->sel_register == 'true') {
                        if ($userid != null) {
                            if ($is_admin != 1) {
                                echo '<li><a href="index.php?r=Sites/UserProfile&id=' . $userid . '"><i class="fa fa-user fa-fw"></i> ข้อมูลส่วนตัว</a></li>';
                                echo '<li><a href="index.php?r=Sites/UserProfileEdit&id=' . $userid . '"><i class="fa fa-edit fa-fw"></i> แก้ไขข้อมูลส่วนตัว</a></li>';
                            }
                        } else {
                            if ($is_admin != 1) {
                                echo '<li><a href="index.php?r=Sites/RegisterForm&id=' . $website_id . '"><i class="fa fa-user fa-fw"></i>สมัครสมาชิก</a></li>';
                            }
                        }
                    }

                    //if ($websites->sel_news == 'true')
                    //    echo '<li><a href="index.php?r=Sites/News&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าววันนี้</a></li>';
                    if ($websites->sel_webboad == 'true')
                        echo '<li><a href="index.php?r=Sites/Webboards&id=' . $website_id . '"><i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า</a></li>';
                    //if ($websites->sel_knowledge == 'true')
                    //    echo '<li><a href="index.php?r=Sites/Knowledges&id=' . $website_id . '"><i class="fa fa-book fa-fw"></i> สาระน่ารู้</a></li>';


                    if ($websites->sel_listuser == 'true') {
                        echo ' <li>
                            <a href="index.php?r=Sites/Users&id=' . $website_id . '"><i class="fa fa-graduation-cap fa-fw"></i> ทำเนียบศิษย์เก่า</a>
                        </li>';
                    }
                    if ($websites->sel_portfolio == 'true') {
                        echo '<li>
                            <a href="index.php?r=Sites/Portfolios&id=' . $website_id . '"><i class="fa fa-briefcase fa-fw"></i> ผลงานศิษย์เก่า</a>
                        </li>';
                    }
                    if ($websites->sel_album == 'true') {
                        echo '<li class="active">
                            <a href="index.php?r=Sites/Gallerys&id=' . $website_id . '"><i class="fa fa-file-image-o fa-fw"></i> อัลบั้มภาพศิษย์เก่า</a>
                        </li>';
                    }

                    if ($websites->sel_published == 'true') {
                        echo '<li>
                            <a href="index.php?r=Sites/Published&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าวสารจากผู้ดูแลระบบ</a>
                        </li>';
                    }

                    if ($websites->sel_contact == 'true') {
                        echo '<li>
                            <a href="index.php?r=Sites/ContactAdmin&id=' . $website_id . '"><i class="fa fa-twitch fa-fw"></i> ติดต่อผู้ดูแลระบบ</a>
                        </li>';
                    }
                    if ($userid != null) {
                        echo '<li><a href="#" onclick="return logout();"><i class="fa fa-sign-out"> ออกจากระบบ</i></a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div><!--/left-->

        <!--center-->
        <div class="col-sm-9">     
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-file-image-o fa-fw"></i> อัลบั้มภาพศิษย์เก่า</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12"> 
                    <ol class="breadcrumb">
                        <?php
                        if ($userid != null) {
                            if ($is_admin == 1) {
                                echo '
                                <li><a href="index.php?r=Sites/GalleryManager&id=' . $website_id . '">จัดการ</a></li>
                                <li><a href="index.php?r=Sites/GalleryAdd&id=' . $website_id . '">เพิ่มรูป</a></li>
                            ';
                            }
                        }
                        ?>
                        <li class="active">อัลบั้มภาพศิษย์เก่า</li>
                    </ol>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="links">
                                <?php
                                foreach ($model as $model):
                                    $id = $model["gallery_id"];
                                    $image_path = $model["image_path"];
                                    ?> 
                                    <a 
                                        href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/<?php echo $website_id . '/gallery/' . $image_path; ?>"
                                        title="<?php echo $image_path; ?>" data-gallery="">
                                        <img class="img-thumbnail" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/<?php echo $website_id . '/gallery/' . $image_path; ?>">
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div><!--/center-->
                </div>

            </div><!--/center-->
        </div>
    </div><!--/container-fluid-->

    <div id="blueimp-gallery" class="blueimp-gallery">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            ก่อนหน้า
                        </button>
                        <button type="button" class="btn btn-primary next">
                            ถัดไป
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>-->

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/BootstrapImageGallery/jquery.blueimp-gallery.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/BootstrapImageGallery/js/bootstrap-image-gallery.js"></script>
    <!--<script src="js/demo.js"></script>-->



