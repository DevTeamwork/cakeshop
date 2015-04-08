<?php
$website_id = $websites->website_id;
$site_name = $websites->name;
$site_university = $websites->university;
$site_banner = $websites->banner;
$site_logo = $websites->logo;
?>
<ol class="breadcrumb">
    <?php
//    echo 'userid : '.$userid;
    if ($userid != null) {
        if ($is_admin == 1) {
            echo '<li><a href="index.php?r=Sites/WebboardCreate&id=' . $website_id . '">ตั้งกระทู้ใหม่</a></li>
                  <li class="active">กระดานข่าวศิษย์เก่า</li>';
        }
    }else{
        echo '<li class="active">กระดานข่าวศิษย์เก่า</li>';
    }
    ?>

</ol>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 30%;">หัวข้อ</th>
                <th>ผู้ตั้งกระทู้</th>
                <th>วันที่</th>
                <th>เวลา</th>
                <th>อ่าน</th>
                <th>ตอบ</th>
                <?php
                if ($is_admin == TRUE) {
                    echo'<th style="width: 80px;"></th>';
                }
                ?>


            </tr>
        </thead>
        <tbody>
            <?php
            $rank = 0;
            foreach ($model as $model):
                $id = $model['id'];
                $title = $model['title'];
                $detail = $model['detail'];
                $username = $model['username'];
                $postdate = $model['postdated'];
                $posttime = $model['posttime'];
                $view = $model['view'];
                $reply = $model['reply'];
                $rank += 1;
                ?>
                <tr>
                    <td><?php echo $rank; ?></td>
                    <td><a href="index.php?r=Sites/WebboadDetail&id=<?php echo $id; ?>"><?php echo $title; ?></a></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $postdate; ?></td>
                    <td><?php echo $posttime; ?></td> 
                    <td><?php echo $view; ?></td>    
                    <td><?php echo $reply; ?></td>

                    <?php
                    if ($is_admin == 1) {
                        echo '<td><div class="btn-group" >
                                        <a class="btn btn-warning btn-sm" title="แก้ไข" data-toggle="tooltip" data-placement="top"
                                           href="index.php?r=Sites/WebboardEdit&id=' . $id . '">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                                    <button class="btn btn-danger btn-sm delete" href="#" data-title="ลบ" data-toggle="tooltip" data-placement="top" data-id="' . $id . '" data-name="' . $title . '">
                                            <i class="glyphicon glyphicon-remove"></i></button>
                                            
</div>
                    </td>';
                    }
                    ?>



                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {

        var languageObj = {
            "emptyTable": "ไม่มีข้อมูล",
            "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
            "infoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
            "infoFiltered": "(ค้นหา จาก _MAX_ แถว)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "แสดง _MENU_ แถว",
            "loadingRecords": "โหลด...",
            "processing": "กำลังทำงาน...",
            "search": "ค้นหา:",
            "zeroRecords": "ไม่มีคำที่ค้นหา",
            "paginate": {
                "first": "แรก",
                "last": "สุดท้าย",
                "next": "ถัดไป",
                "previous": "ก่อนหน้า"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        };

        $('#dataTables-example').dataTable({
            "language": languageObj
        });

        $(".delete").on("click", function() {
            var _a = $(this).parent().find('button');
            var id = _a.data().id;
            var name = _a.data().name;
//            alert("id : " + id + " name: " + name);
            var row = $(this).parents('tr:first');
            webboardDelete(id, name, row);
        });


    });

</script>


