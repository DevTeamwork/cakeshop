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
    <div class="row">
    <!--left-->    
    <div class="col-sm-3 boxmenu-jp">
        <div class="page-header">
            <label>สถานะ :  <?php
                if ($userid != null) {
                    if ($is_admin == 1) {
                        echo 'ผู้ดูแลระบบ';
                    } else {
                        echo 'สมาชิก ';
                        ;
                    }
                } else {
                    echo 'ผู้เยี่ยมชม';
                }
                ?>
            </label>
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

               // if ($websites->sel_news == 'true')
               //     echo '<li><a href="index.php?r=Sites/News&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าววันนี้</a></li>';
                if ($websites->sel_webboad == 'true')
                    echo '<li><a href="index.php?r=Sites/Webboards&id=' . $website_id . '"><i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า</a></li>';
               // if ($websites->sel_knowledge == 'true')
               //     echo '<li><a href="index.php?r=Sites/Knowledges&id=' . $website_id . '"><i class="fa fa-book fa-fw"></i> สาระน่ารู้</a></li>';

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

                ?>
            </ul>
        </div>
    </div><!--/left-->

    <!--center-->
    <div class="col-sm-9">     
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-graduation-cap fa-fw"></i> ทำเนียบศิษย์เก่า</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <?php
                    if ($userid != null) {
                        if ($is_admin == 1) {
                            echo '
                                <li><a href="index.php?r=Sites/AddUser&id=' . $website_id . '">เพิ่มสมาชิกใหม่</a></li>
                                <li class="active">ทำเนียบศิษย์เก่า</li>
                            ';
                        } else {
                            echo '
                                  <li class="active"><i class="fa fa-graduation-cap fa-fw"></i> ทำเนียบศิษย์เก่า</li>';
                        }
                    }
                    ?>

                </ol>
<!--                <div class="row">
                    <div class="col-md-6">
                        <form action="#" method="get">
                            <div class="input-group">
                                 USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH 
                                <input class="form-control" id="system-search" name="q" placeholder="ค้นหา : " required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>-->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-list-search" id="dataTables-example">
                     <thead>
                        <tr>
                        <th>#</th>
                        <th>ชื่อใช้งาน</th>
                        <th>ชื่อ-สกุล</th>
                        <th style="display: none;">สกุล</th>
                        <th style="display: none;">ที่อยู่ติดต่อได้</th>
                        <th>เบอร์โทร</th>
                        <th>อีเมลล์</th>
                        <th style="display: none;">รหัสนักศึกษา</th>
                        <th style="display: none;">คณะ</th>
                        <th style="display: none;">สาขา</th>
                        <th style="display: none;">รุ่น</th>
                        <th style="display: none;">ปีที่เริ่มเรียน</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                        $rank = 0;
                        foreach ($model as $model):
                                $id = $model['userid'];
                                $username = $model['username'];
                                $firstname = $model['firstname'];
                                $lastname  = $model['lastname'];
                                $nickname = $model['nickname'];
                                $birthday = $model['birthday'];
                                $address_contact = $model['address_contact'];
                                $address = $model['address'];
                                $address_office = $model['address_office'];
                                $tel = $model['tel'];
                                $email = $model['email'];
                                $student_no = $model['student_no'];
                                $faculty = $model['faculty'];
                                $department = $model['department'];
                                $generation_no = $model['generation_no'];
                                $year_start = $model['year_start'];
                                $rank += 1;
                            ?>
                            <tr>
                                <td><?php echo $rank; ?></td>
                                <td><a href="index.php?r=Sites/UserDetail&id=<?php echo $id; ?>"><?php echo $username; ?></a></td>
                                <td><?php echo $firstname.' '.$lastname; ?></td>
                                <td style="display: none;"><?php echo $lastname; ?></td>
                                <td style="display: none;"><?php echo $address_contact; ?></td> 
                                <td><?php echo $tel; ?></td>    
                                <td><?php echo $email; ?></td>
                                <td style="display: none;"><?php echo $student_no; ?></td>
                                <td style="display: none;"><?php echo $faculty; ?></td>
                                <td style="display: none;"><?php echo $department; ?></td>
                                <td style="display: none;"><?php echo $generation_no; ?></td>
                                <td style="display: none;"><?php echo $year_start; ?></td>
                                <td>                                   
                                    <div class="btn-group" >
<!--                                            <a href="index.php?r=Sites/UserDetail&id=<?php echo $id; ?>" class="btn btn-primary view-site" data-title="ดูรายละเอียด" rel="tooltip">
                                                <i class="glyphicon glyphicon-eye-open"></i>
                                            </a>-->
                                            <?php 
                                                if($is_admin == TRUE){
                                                echo '
                                                    <a class="btn btn-warning view-site"data-title="แก้ไข" rel="tooltip"
                                                       href="index.php?r=Sites/UserEdit&id='.$id.'">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>
                                                    <button class="btn btn-danger view-site delete" href="#" data-title="ลบ" rel="tooltip" data-id="'.$id.'" data-name="'.$username.'">
                                            <i class="glyphicon glyphicon-remove"></i></button>';
                                                }
                                              ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                 
            </div>

        </div><!--/center-->
    </div><!--/container-fluid-->
    </div>
    </div>
    <script>
        $(document).ready(function() {
            
        var languageObj ={
                "emptyTable":     "ไม่มีข้อมูล",
                "info":           "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "infoEmpty":      "แสดง 0 ถึง 0 จาก 0 แถว",
                "infoFiltered":   "(ค้นหา จาก _MAX_ แถว)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "แสดง _MENU_ แถว",
                "loadingRecords": "โหลด...",
                "processing":     "กำลังทำงาน...",
                "search":         "ค้นหา:",
                "zeroRecords":    "ไม่มีคำที่ค้นหา",
                "paginate": {
                    "first":      "แรก",
                    "last":       "สุดท้าย",
                    "next":       "ถัดไป",
                    "previous":   "ก่อนหน้า"
                },
                "aria": {
                    "sortAscending":  ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            };  
            
            $('#dataTables-example').dataTable({
                "language":languageObj
            });
            
            $(".delete").on("click", function() {
            var _a = $(this).parent().find('button');
            var id = _a.data().id;
            var name = _a.data().name;
//            alert("id : " + id + " name: " + name);
            var row = $(this).parents('tr:first');
            userDelete(id, name, row);
        });
       

    });
//    $(document).ready(function() {
//        
//    var activeSystemClass = $('.list-group-item.active');
//
//    //something is entered in search form
//    $('#system-search').keyup( function() {
//       var that = this;
//        // affect all table rows on in systems table
//        var tableBody = $('.table-list-search tbody');
//        var tableRowsClass = $('.table-list-search tbody tr');
//        $('.search-sf').remove();
//        tableRowsClass.each( function(i, val) {
//        
//            //Lower text for case insensitive
//            var rowText = $(val).text().toLowerCase();
//            var inputText = $(that).val().toLowerCase();
//            if(inputText != '')
//            {
//                $('.search-query-sf').remove();
//                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>ค้นหา: "'
//                    + $(that).val()
//                    + '"</strong></td></tr>');
//            }
//            else
//            {
//                $('.search-query-sf').remove();
//            }
//
//            if( rowText.indexOf( inputText ) == -1 )
//            {
//                //hide rows
//                tableRowsClass.eq(i).hide();
//                
//            }
//            else
//            {
//                $('.search-sf').remove();
//                tableRowsClass.eq(i).show();
//            }
//        });
//        //all tr elements are hidden
//        if(tableRowsClass.children(':visible').length == 0)
//        {
//            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">ไม่เจอคำที่ค้นหา.</td></tr>');
//        }
//    });
//});
    </script>