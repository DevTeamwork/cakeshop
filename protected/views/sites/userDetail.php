
<?php
$website_id = $websites->website_id;
$site_name = $websites->name;
$site_university = $websites->university;
$site_banner = $websites->banner;
$site_logo = $websites->logo;
?>
<?php
    $this->renderPartial('_configWebsites', array("websites" => $websites,'is_admin' =>$is_admin));
?>
<div class="container container-jp">
    <div class="col-sm-3 boxmenu-jp">        
        <div class="content">
            <label>สถานะ : <?php
                if ($userid != null) {
                    if ($is_admin == 1) {
                        echo 'ผู้ดูแลระบบ';
                    } else {
                        echo 'สมาชิก';
                    }
                } else {
                    echo 'ผู้เยี่ยมชม';
                }
                ?></label>
        </div>
        <?php
        if ($userid == null) {
            $this->renderPartial('formLogin', array("websites" => $websites));
        }
        ?>

        <div class="nav nav-pills nav-pills">
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
                //   echo '<li><a href="index.php?r=Sites/News&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าววันนี้</a></li>';
                if ($websites->sel_webboad == 'true'){
                    echo '<li><a href="index.php?r=Sites/Webboards&id=' . $website_id . '"><i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า</a></li>';
                }
                //if ($websites->sel_knowledge == 'true')
                //    echo '<li><a href="index.php?r=Sites/Knowledges&id=' . $website_id . '"><i class="fa fa-book fa-fw"></i> สาระน่ารู้</a></li>';


//                if ($userid != null) {
                    if ($websites->sel_listuser == 'true') {
                        echo ' <li class="active">
                            <a href="index.php?r=Sites/Users&id=' . $website_id . '"><i class="fa fa-graduation-cap fa-fw"></i> ทำเนียบศิษย์เก่า</a>
                        </li>';
                    }
                    if ($websites->sel_portfolio == 'true') {
                        echo '<li>
                            <a href="index.php?r=Sites/Portfolios&id=' . $website_id . '"><i class="fa fa-briefcase fa-fw"></i> ผลงานศิษย์เก่า</a>
                        </li>';
                    }
                    if ($websites->sel_album == 'true') {
                        echo '<li>
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
                    echo '<li><a href="#" onclick="return logout();"><i class="fa fa-sign-out"> ออกจากระบบ</i></a></li>';
//                }
                ?>

            </ul>
        </div>
        <hr>
    </div><!--/left-->

    <!--center-->
    <div class="col-sm-9">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-graduation-cap fa-fw"></i> ทำเนียบศิษย์เก่า</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <ol class="breadcrumb">
            <li><a href="index.php?r=Sites/Users&id=<?php echo $websites->website_id ?>"><i class="fa fa-graduation-cap fa-fw"></i> ทำเนียบศิษย์เก่า</a></li>
            <li class="active">ข้อมูลส่วนตัว : <?php echo $model->username; ?></li>                                        
        </ol>
        <div class="well">
            <?php
//            $this->renderPartial('partialUserDetail', array("model" => $model, 'userid' => $userid, 'page' => 'index'));
            ?>
           <?php
            $this->renderPartial('partialUserDetail', array("model" => $model, 'userid' => $userid, 'page' => 'index'));
            ?>
        </div>
    </div>

</div>
</div>