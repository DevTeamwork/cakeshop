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
    <!--left-->    
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
                if ($websites->sel_news == 'true')
                    echo '<li><a href="index.php?r=Sites/News&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าววันนี้</a></li>';
                if ($websites->sel_webboad == 'true')
                    echo '<li><a href="index.php?r=Sites/Webboards&id=' . $website_id . '"><i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า</a></li>';
                if ($websites->sel_knowledge == 'true')
                    echo '<li class="active"><a href="index.php?r=Sites/Knowledges&id=' . $website_id . '"><i class="fa fa-book fa-fw"></i> สาระน่ารู้</a></li>';

                 $this->renderPartial('menus', array("websites" => $websites,'userid'=>$userid,'page'=>'index'));
                ?>
            </ul>
        </div>
    </div><!--/left-->

    <!--center-->
    <div class="col-sm-9">     
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-book fa-fw"></i> สาระน่ารู้</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">  
                <?php
                $tile = $model->title;
                $detail = $model->detail;
                $postdated = $model->postdated;
                ?> 
                <p></p>
                <ol class="breadcrumb">
                    <li><a href="index.php?r=Sites/Knowledges&id=<?php echo $websites->website_id; ?>">สาระน่ารู้</a></li>
                    <li class="active"><?php echo $tile ?></li>
                </ol>    
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <h2><?php echo $tile; ?></h2>
                                <p><?php echo $detail; ?></p>
                                <!--<p class="lead"><button class="btn btn-default">อ่านทั้งหมด</button></p>-->
                                <!--<p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>-->
                                <hr>
                                <ul class="list-inline">
                                    <li><i class="fa fa-calendar"></i> <?php echo $postdated ?></li>
                                    <!--<li><a href="#"><i class="glyphicon glyphicon-comment"></i> 4 Comments</a></li>-->
                                    <!--<li><a href="#"><i class="glyphicon glyphicon-share"></i> 34 Shares</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <nav>
                    <ul class="pager">
                        <li class="previous"><a href="index.php?r=Sites/Knowledges&id=<?php echo $websites->website_id; ?>">&larr; กลับ</a></li>
                        <!--<li class="next"><a href="#">ถัดไป &rarr;</a></li>-->
                    </ul>
                </nav>

            </div><!--/center-->
        </div><!--/container-fluid-->
    </div>
</div>



