<?php
$website_id = $websites->website_id;
$site_name = $websites->name;
$site_university = $websites->university;
$site_banner = $websites->banner;
$site_logo = $websites->logo;

$totalKnowledge = $totalKhowledges[0]["total"];
$totalNew = $totalNews[0]['total'];
$totalUser = $totalUsers[0]['total'];
$totalview = $totalview['view'];
//echo 'totalKnowledge : '.$totalKnowledge;
?>
<?php
$this->renderPartial('_configWebsites', array("websites" => $websites, 'is_admin' => $is_admin));
?>

<div class="container container-jp">
    <div class="row">
        <div class="col-sm-3 boxmenu-jp">        
            <div class="page-header">
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
                if ($websites->sel_login == "true") {
                    $this->renderPartial('formLogin', array("websites" => $websites));
                }
            }
            ?>
            <ul class="nav nav-pills nav-stacked" id="side-menu">
                <?php
                echo '<li class="active"><a href="index.php?r=Sites/Index&id=' . $website_id . '"><i class="fa fa-home fa-fw"></i> หน้าหลัก</a></li>';

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
               // if ($websites->sel_news == 'true')
                //    echo '<li><a href="index.php?r=Sites/News&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าววันนี้</a></li>';
                if ($websites->sel_webboad == 'true')
                    echo '<li><a href="index.php?r=Sites/Webboards&id=' . $website_id . '"><i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า</a></li>';
               // if ($websites->sel_knowledge == 'true')
               //     echo '<li><a href="index.php?r=Sites/Knowledges&id=' . $website_id . '"><i class="fa fa-book fa-fw"></i> สาระน่ารู้</a></li>';

                $this->renderPartial('menus', array("websites" => $websites, 'userid' => $userid, 'page' => 'index'));
                ?>

            </ul>
            <hr>
        </div><!--/left-->

        <!--center-->
        <div class="col-sm-9">
            <div class="row ">
                <div class="col-lg-12">
                    <!--<h1 class="page-header">กระดานข่าวศิษย์เก่า</h1>-->
                    <h1 class="page-header"><i class="fa fa-home fa-fw"></i> หนัาหลัก</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <?php
                echo '<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-briefcase fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">' . $totalKnowledge . '</div>
                                    <div>ผลงานศิษย์เก่า</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?r=Sites/portfolios&id=' . $website_id . '">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>';

                echo'<div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-newspaper-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">' . $totalNew . '</div>
                                        <div>ข่าวสารจากผู้ดูแลระบบ</div>
                                    </div>
                            </div>
                        </div>
                        <a href="index.php?r=Sites/Published&id=' . $website_id . '">
                                <div class="panel-footer">
                                    <span class="pull-left">ดูรายละเอียด</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                    </div>
                </div>';

                echo '<div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-eye fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">' . $totalview . '</div>
                                        <div>ผู้ชมทั้งหมด</div>
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
                </div>';

                echo'<div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">' . $totalUser . '</div>
                                        <div>สมาชิกทั้งหมด</div>
                                    </div>
                                </div>
                        </div>
                        <a href="index.php?r=Sites/Users&id=' . $website_id . '">
                                <div class="panel-footer">
                                    <span class="pull-left">ดูรายละเอียด</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                    </div>
                </div>
            </div>';
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php
                            $this->renderPartial('partialWebboards', array(
                                'model' => $webboards,
                                'websites' => $websites,
                                'is_admin' => $is_admin,
                                'userid' => $userid));
                            ?>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div><!--/center-->

        </div>
        <!--/right-->
    </div><!--/container-fluid-->
</div>