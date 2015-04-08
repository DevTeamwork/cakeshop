<?php
$website_id = $websites->website_id;
$site_name = $websites->name;
$site_university = $websites->university;
$site_banner = $websites->banner;
$site_logo = $websites->logo;
?>
<script>
    $(function() {
        $(".delete").on("click", function() {
            var _a = $(this).parent().find('button');
            var id = _a.data().id;
            var name = _a.data().name;
//            alert("id : " + id + " name: " + name);
            var row = $(this).parents('tr:first');
            newsDelete(id, name, row);
        });
    });
</script>
<?php
    $this->renderPartial('_configWebsites', array("websites" => $websites,'is_admin' =>$is_admin));
?>
<div class="container container-jp">
    <!--left-->    
    <div class="row">
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
        if ($userid == null) {
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
                                echo '<li><a href="index.php?r=Sites/RegisterForm&id=' . $website_id . '"><i class="fa fa-user fa-fw"></i>สมัครสมาชิก</a></li>';
                            }
                        }
                    }

                //if ($websites->sel_news == 'true')
                //    echo '<li class="active"><a href="index.php?r=Sites/News&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าววันนี้</a></li>';
                if ($websites->sel_webboad == 'true')
                    echo '<li><a href="index.php?r=Sites/Webboards&id=' . $website_id . '"><i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า</a></li>';
               // if ($websites->sel_knowledge == 'true')
               //     echo '<li><a href="index.php?r=Sites/Knowledges&id=' . $website_id . '"><i class="fa fa-book fa-fw"></i> สาระน่ารู้</a></li>';

                $this->renderPartial('menus', array("websites" => $websites, 'userid' => $userid, 'page' => 'index'));
                ?>
            </ul>
        </div>
    </div><!--/left-->

    <!--center-->
    <div class="col-sm-9">     
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-newspaper-o fa-fw"></i> ข่าววันนี้</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <p></p>
                <?php 
                
                 if ($userid != null) {
                    if ($is_admin == TRUE) {
                        echo '<ol class="breadcrumb">
                                <li><a href="index.php?r=Sites/NewsCreate&id='.$website_id.'">เพิ่มข่าวใหม่</a></li>
                                <li class="active">จัดการ</li>
                            </ol>';
                    }
                 }      
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อเรื่อง</th>
                            <th>วันที่</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($model as $model):
                            $id = $model["id"];
                            $title = $model["title"];
                            $postdated = $model['postdated'];
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $title; ?></td> 
                                <td><?php echo $postdated; ?></td>
                                <td>
                                    <div class="btn-group" >
                                        <a href="index.php?r=Sites/NewsDetail&id=<?php echo $id; ?>" class="btn btn-primary view-site" data-title="ดูรายละเอียด" rel="tooltip">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                        <a class="btn btn-warning view-site"data-title="แก้ไข" rel="tooltip"
                                           href="index.php?r=Sites/NewsEdit&id=<?php echo $id; ?>">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                        <button class="btn btn-danger view-site delete" href="#" data-title="ลบ" rel="tooltip" data-id="<?php echo $id; ?>" data-name="<?php echo $title; ?>">
                                            <i class="glyphicon glyphicon-remove"></i></button>

                                    </div> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div><!--/center-->
    <hr>
    </div>
</div><!--/container-fluid-->


