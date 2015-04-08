<?php
$website_id = $websites->website_id;
$site_name = $websites->name;
$site_university = $websites->university;
$site_banner = $websites->banner ;
$site_logo = $websites->logo;
?>
<?php
    $this->renderPartial('_configWebsites', array("websites" => $websites,'is_admin' =>$is_admin));
?>
<div class="container container-jp">
    <div class="row">
    <!--left-->
    <div class="col-sm-3 boxmenu-jp">
        <div class="page-header">
            <label>สถานะ : <?php
                 if ($userid != null) {
                    if ($is_admin == 1) {
                        echo 'ผู้ดูแลระบบ';
                    } else {
                        echo 'สมาชิก';
                    }
                 }else{
                      echo 'ผู้เยี่ยมชม';
                 }
                 ?></label>
        </div>
         <?php
        if ($userid == '') {
            $this->renderPartial('formLogin',array("websites"=>$websites));
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
                                echo '<li class="active"><a href="index.php?r=Sites/RegisterForm&id=' . $website_id . '"><i class="fa fa-user fa-fw"></i>สมัครสมาชิก</a></li>';
                            }
                        }
                    }
//                if ($websites->sel_news == 'true')
//                    echo '<li><a href="index.php?r=Sites/News&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าววันนี้</a></li>';
                if ($websites->sel_webboad == 'true')
                    echo '<li><a href="index.php?r=Sites/Webboards&id=' . $website_id . '"><i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า</a></li>';
//                if ($websites->sel_knowledge == 'true')
//                    echo '<li><a href="index.php?r=Sites/Knowledges&id=' . $website_id . '"><i class="fa fa-book fa-fw"></i> สาระน่ารู้</a></li>';
                
                $this->renderPartial('menus', array("websites" => $websites,'userid'=>$userid,'page'=>'index'));
                
                ?>                              
            </ul>
        </div>
        <hr>
    </div><!--/left-->

    <!--center-->
    <div class="col-sm-9 ">     
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-user fa-fw"></i> สมัครสมาชิก</h1>
            </div>
            <!-- /.col-lg-12 -->
            <?php 
                if($is_admin == 1){
                    echo '<div class="col-lg-12">
                            <ol class="breadcrumb">
                                <li><a href="index.php?r=Sites/RegisterSettings&id='.$website_id.'">ตั้งค่า</a></li>
                                <li class="active">แสดงผล</li>
                            </ol>
                          </div>';
                }
            ?>            
        </div>
        <div class="well well-sm">        
        <form id="register-form" class="form-horizontal" role="form">
                    <input type="hidden" id="rg_websiteid" name="rg_websiteid" value="<?php echo $websites->website_id ?>"/>
                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="rg_username" class="col-md-2 control-label">ชื่อผู้ใช้งาน</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="rg_username" placeholder="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rg_email" class="col-md-2 control-label">อีเมลล์</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="rg_email" id="rg_email" placeholder="name@gmail.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rg_password" class="col-md-2 control-label">รหัสผ่าน</label>
                        <div class="col-md-8">
                            <input type="password" id="rg_password" class="form-control" name="rg_password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rg_password_confrim" class="col-md-2 control-label">ยืนยันรหัสผ่าน</label>
                        <div class="col-md-8">
                            <input type="password" name="rg_password_confrim" id="rg_password_confrim" placeholder="Password" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->                                        
                        <div class="col-md-offset-2 col-md-8">
                            <input type="submit" value="บันทึก" id="btn_forgot" class="btn btn-primary"/>
                            <input type="reset" value="เคลียร์ข้อมูล" class="btn btn-danger">
                        </div>
                    </div>
                </form>
            </div>
    </div><!--/center-->
    
    <hr>
    </div>
</div><!--/container-fluid-->
