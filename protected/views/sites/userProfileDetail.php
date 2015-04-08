
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
        if ($userid == '') {
            echo '<div class="panel panel-primary">
        <div class="panel-heading">เข้าสู่ระบบ</div>
        <div class="panel-body">             
            <form id="login-form" role="form"> 
                <input type="hidden" id="website_id" name="website_id" value="' . $website_id . '"/>
                <div style="margin-bottom:0;" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="ln_username" value="" placeholder="username or email">                                        
                </div>
                <div style="margin-bottom:5px;" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="ln_password" placeholder="password">
                </div>
                <div style="margin-top:5px" class="form-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success" style="width: 100%;">
                            <i class="icon-user icon-white"></i> Login
                        </button>
                    </div>
                </div>                                           
            </form>
        </div>
    </div><hr>';
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
//                if ($websites->sel_news == 'true')
//                    echo '<li><a href="index.php?r=Sites/News&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าววันนี้</a></li>';
                if ($websites->sel_webboad == 'true')
                    echo '<li><a href="index.php?r=Sites/Webboards&id=' . $website_id . '"><i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า</a></li>';
//                if ($websites->sel_knowledge == 'true')
//                    echo '<li><a href="index.php?r=Sites/Knowledges&id=' . $website_id . '"><i class="fa fa-book fa-fw"></i> สาระน่ารู้</a></li>';


                if ($userid != null) {
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
                }
                ?>

            </ul>
        </div>
        <hr>
    </div><!--/left-->

    <!--center-->
    <div class="col-sm-9">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-user fa-fw"></i> ข้อมูลส่วนตัว</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="well">
            <?php
            $this->renderPartial('partialUserDetail', array("model" => $model, 'userid' => $userid, 'page' => 'index'));
            ?>
        </div>
    </div>

</div>
</div>