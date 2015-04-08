<style>
    .copyed{
        background-color: darkgray;
    }    
</style>
<script>

    function Delete(data) {
        alert("del");
    }

    function getUrlSite(el,id) {
        var wesiteUrl = "http://localhost:82/dreamdata/index.php?r=Sites/Index&id=" + id;
        $('#modalTile').text($(el).closest("tr").find('td:eq(1)').text());
        $('#wesiteUrl').text(wesiteUrl);
        $("#myModal").modal('show');

        $("#modalCopy").click(function() {
            $('#modalCopy').text("ก็อบบี้");
            $(this).zclip({
                path: "http://www.steamdev.com/zclip/js/ZeroClipboard.swf",
                copy: function() {
//                    $('#modalCopy').text("ก็อบบี้แล้ว");
//                    $('#wesiteUrl').addClass("copyed");
                    return $('#wesiteUrl').text();
                }
            });
        });
    }

    $(function() {

//        $(".view-site").click(function() {
//            var $row = $(this).closest("tr"), // Finds the closest row <tr> 
//                    $tds = $row.find("td:nth-child(1)"); // Finds the 2nd <td> element
//            var link = "index.php?r=Sites/Index&id=" + $tds.text();
//            window.open(link, '_blank');
//            return false;
//        });

//        $(".delete").on("click", function() {
//            var _a = $(this).parent().find('a');
////            alert(_a.html());
//            var id = _a.data().websiteid;
//            var name = _a.data().name;
//
//            var row = $(this).parents('tr:first');
//            websiteDelete(id, name, row);
//        });
    });
</script>
<?php
$this->renderPartial('PartailMenu', array("username" => $username));
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">เว็บไซต์ทั้งหมด</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อเว็บไซต์</th>
                        <th>ชื่อสถาบัน</th>
                        <!--<th>โลโก้</th>-->
                        <!--<th>แบนเนอร์</th>-->
                        <th>เมนู</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rank = 0;
                    foreach ($webSites as $webSite):
                        $id = $webSite['website_id'];
                        $name = $webSite['name'];
                        $university = $webSite['university'];
                        $logo = $webSite['logo'];
                        $banner = $webSite['banner'];
                        $rank += 1;
                        ?>
                        <tr>
                            <td><?php echo $rank; ?></td>
                            <td><a target="_blank" href="index.php?r=Sites/Index&id=<?php echo $id; ?>"><?php echo $name; ?></a></td>
                            <td><?php echo $university; ?></td>
                            <!--<td><?php echo $logo;  ?></td>-->
    <!--                            <td><?php echo $banner;  ?></td>                -->
                            <td>                                    

                                <div class="btn-group" >
                                    <a class="btn btn-primary btn-sm" onclick="return getUrlSite(this,<?php echo $webSite['website_id'] ?>);" title="เผยแผร่" data-toggle="tooltip" data-placement="top"
                                       href="#">
                                        <i class="glyphicon glyphicon-bullhorn"></i>
                                    </a>
                                    <a class="btn btn-warning btn-sm" title="แก้ไข" data-toggle="tooltip" data-placement="top"
                                       href="index.php?r=Websites/Update&id=<?php echo $webSite['website_id'] ?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm delete" title="ลบ" data-toggle="tooltip" data-placement="top" 
                                            data-id="<?php echo $id; ?>" data-name="<?php echo $name; ?>">
                                        <i class="glyphicon glyphicon-remove"></i></button>

                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

<!--        <table class="table table-hover table-responsive" style="padding-top: 50px">
    <header>
        <th style="display: none">#</th>
        <th>ชื่อเว็บไซต์</th>
        <th>ชื่อสถาบัน</th>
        <th>โลโก้</th>
        <th>แบนเนอร์</th>
        <th></th>
    </header>
    <tbody>
        <?php foreach ($webSites as $webSite): ?>
                    <tr>
                        <td style="display: none"><?php echo $webSite['website_id'] ?></td>
                        <td><?php echo $webSite['name'] ?></td>
                        <td><?php echo $webSite['university'] ?></td>
                        <td><?php echo $webSite['logo'] ?></td>
                        <td><?php echo $webSite['banner'] ?></td>                
                        <td>                                    

                            <div class="btn-group">
                                <a href="#" class="btn btn-default view-site">
                                    <i class="glyphicon glyphicon-eye-open"></i> ดูเว็บไซต์
                                </a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        เมนู
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" onclick="return getUrlSite(this);">
                                                <i class="glyphicon glyphicon-bullhorn"></i> เผยแผร่
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.php?r=Manager/Index&id=<?php echo $webSite['website_id'] ?>">
                                                <i class="glyphicon glyphicon-cog"></i> บริหารจัดการ
                                            </a>
                                        </li>
                                        <li><a href="index.php?r=Websites/Update&id=<?php echo $webSite['website_id'] ?>">
                                                <i class="glyphicon glyphicon-edit"></i> แก้ไข</a> </li>
            <?php
            $id = $webSite['website_id'];
            $name = $webSite['name'];
            ?>
                                        <li><a class="delete" href="#" data-websiteid="<?php echo $id; ?>" data-name="<?php echo $name; ?>">
                                                <i class="glyphicon glyphicon-remove"></i> ลบ
                                            </a>
                                        </li>                                            
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
        <?php endforeach; ?>
    </tbody>
</table>-->
    </div>
</div>


<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-arrow-right"></span> <span id="modalTile"></span> </h4>
            </div>
            <div class="modal-body">
                <pre id="wesiteUrl"></pre>
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary" id="modalCopy">ก็อบบี้</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConfrim">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="icon-white"></i> ยืนยันการลบ
            </div>
            <div class="modal-body">
                <div id="modal_content"></div>
            </div>
        </div>
    </div>
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
            websiteDelete(id,name,row)
        });


    });

</script>




