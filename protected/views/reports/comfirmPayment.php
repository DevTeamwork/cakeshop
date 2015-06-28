<script>
    $(function () {
//        alert("asdf");
        var page = $("#side-menu li#comfirmPayment");
//        page.addClass("active");
//        page.find("ul").first().addClass("nav nav-second-level collapse in");
//        var ul = page.find("ul").first();
        page.find("a").addClass("active");
        $('#side-menu').metisMenu();

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

        $('#table').dataTable({
//            "bLengthChange": false,
//            "bPaginate": false,
//            "ordering": false,
//            "info":     false,    
//            "paging":   false,
            "language": languageObj
        });

//        console.log($("#side-menu li#product").parent().html());
//        CKEDITOR.disableAutoInline = false;
//        $('#editor1').ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
//        $('#editable').ckeditor(); // Use CKEDITOR.inline().


//        $('#form').validate({
//            rules: {
//                title: "required",
//                editor1: "required"
//            },
//            messages: {
//                title: "กรุณากรอกชื่อผลงาน",
//                editor1: "กรุณากรอกรายละเอียด"
//            },
//            submitHandler: function(form) {
//                newsSave($("#form").serialize());
//
//            }
//
//        });
    });
</script>
<style>
    .change-image{
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    .change-image #change_avatar {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>

<div class="row ">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-bar-chart-o fa-fw"></i> รายการแจ้งโอน </h1>
    </div>
</div>

<!--<ol class="breadcrumb">
    <li><a href="index.php?r=Reports/Orders"><i class="fa fa-edit fa-fw"></i> บิลทั้งหมด</a></li>
    <li class="active">บิลเลขที่ : <?php echo $model[0]["order_id"]; ?></li>                                     
</ol>-->
<div class="panel panel-default">
    <div class="panel-body">      
        <table class="table table-condensed table-striped" id="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>เลขที่บิล</th>
                    <th>ชื่อ</th>
                    <th>ธนาคาร</th>
                    <th>วันที่</th>
                    <th>เวลา</th>
                    <th>เป็นเงิน (บาท) </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = 0;
                $total_price = 0;
                foreach ($model as $model):
                    $id = $model["order_id"];
                    $firstname = $model["firstname"];
                    $lastname = $model["lastname"];
                    $create_date = $model["create_date"];
                    $create_time = $model["create_time"];
                    $price = $model["price"];
                    $bank_name = $model["bank_name"];
//                    $order_status = $model["order_status"];
                    $row ++;
                    ?>
                    <tr>
                        <td style="width: 10%;"><?php echo $row; ?></td>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $firstname . " " . $lastname; ?></td>
                        <td><?php echo $bank_name; ?></td>
                        <td style="width: 20%;"><?php echo $create_time; ?></td> 
                        <td style="width: 15%;"><?php echo $create_date; ?></td> 

                        <td style="width: 15%;"><?php echo $price; ?></td> 
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
    </div>
</div>








