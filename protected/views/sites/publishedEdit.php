<script>
    $(function() {
        CKEDITOR.disableAutoInline = false;
        $('#editor1').ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
        $('#editable').ckeditor(); // Use CKEDITOR.inline().

        function setValue() {
            // $('#editor1').val($('input#val').val());
        }

        $('#form').validate({
            rules: {
                title: "required",
                editor1: "required"
            },
            messages: {
                title: "กรุณากรอกชื่อผลงาน",
                editor1: "กรุณากรอกรายละเอียด"
            },
            submitHandler: function(form) {
//                alert($("#form").serialize());
                publishedSave($("#form").serialize());

            }

        });
    });
</script>
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
<div class="row">	
    <div class="col-sm-3 boxmenu-jp">
        <div class="page-header">
            <label>สถานะ :  
                <?php
                if ($userid != null) {
                    if ($is_admin == 1) {
                        echo 'ผู้ดูแลระบบ';
                    } else {
                        echo 'สมาชิก ' ;
                        ;
                    }
                } else {
                    echo 'ผู้เยี่ยมชม';
                }
                ?>
            </label>
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

//                if ($websites->sel_news == 'true')
//                    echo '<li class="active"><a href="index.php?r=Sites/News&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าววันนี้</a></li>';
                if ($websites->sel_webboad == 'true')
                    echo '<li><a href="index.php?r=Sites/Webboards&id=' . $website_id . '"><i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า</a></li>';
//                if ($websites->sel_knowledge == 'true')
//                    echo '<li><a href="index.php?r=Sites/Knowledges&id=' . $website_id . '"><i class="fa fa-book fa-fw"></i> สาระน่ารู้</a></li>';

//                 if ($userid != null) {

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
                        echo '<li class="active">
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
    </div><!--/left-->

    <!--center-->
    <div class="col-sm-9">     
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-newspaper-o fa-fw"></i> ข่าวสารจากผู้ดูแลระบบ</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="index.php?r=Sites/PublishedManager&id=<?php echo $websites->website_id ?>">จัดการ</a></li>    
                    <li><a href="index.php?r=Sites/PublishedCreate&id=<?php echo $websites->website_id ?>">เพิ่มข่าวใหม่</a></li>
                    <li><a href="index.php?r=Sites/PublishedDetail&id=<?php echo $model->id; ?>" target="_blank">ฟรีวิว</a></li>
                    <li class="active">แก้ไข : <?php echo $model->title ?></li>
                </ol>
                
                <div class="well">
                    <?php
                    $this->renderPartial('formEdit', array("model" => $model));
                    ?>
<!--                    <form id="portfolio-form" role="form">
                        <input type="hidden" id='website_id' name="website_id" value="<?php echo $websites->website_id ?>">
                        <input type="hidden" id='id' name="id" value="<?php echo $model->id; ?>">
                        <fieldset>
                            <div class="input-group form-group-jp" style="width: 500px;">
                                <label>หัวข้อ/ชื่อเรื่อง</label>
                                <input id="title" type="text" class="form-control" name="title" value="<?php echo $model->title ?>" placeholder="title">                                        
                            </div>

                            <div class="input-group form-group-jp">
                                <label>เนื้อหา/รายละเอียด</label>
                                <input id="detail" type="text" class="form-control" name="detail" placeholder="password">
                                <textarea id="editor1" name="editor1" style="padding-left: 0;padding-right: 0;" rows="50" class="required">
                                    <?php echo $model->detail; ?>
                                </textarea>
                            </div>
                            <div class="form-group form-group-jp">                              
                                <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save fa-fw"></i>บันทึก</i>
                                </button>
                            </div>
                        </fieldset>
                    </form>-->
                </div>
            </div>
        </div>

    </div><!--/center-->
    <hr>
	</div>
</div><!--/container-fluid-->


