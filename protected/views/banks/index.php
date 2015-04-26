<script>
    $(function () {
//        alert("asdf");
        var page = $("#side-menu li#bank");
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
            "language": languageObj
        });

        $('#form').validate({
            rules: {
                bank_name: "required",
                branch: "required",
                account_no: "required",
                account_name: "required"
            },
            messages: {
                bank_name: "กรุณากรอก ชื่อธนาคาร",
                branch: "กรุณากรอก สาขา",
                account_no: "กรุณากรอก เลขที่บัญชี",
                account_name: "กรุณากรอก ชื่อบัญชี"
            },
            submitHandler: function (e) {
//                console.log($("#form").serialize());
                bank_save($("#form").serialize());
            }

        });

        $(".delete").on("click", function () {
            var id = $(this).data().id;
            var name = $(this).data().name;
            var row = $(this).parents('tr:first');
            bank_delete(id, name, row);
        });

        $(".edit").on("click", function () {
            var row = $(this).parents('tr:first');
            var id = $(this).data().id;
            var name = $(this).data().name;
            var branch = $(this).data().branch;
            var account_no = $(this).data().account_no;
            var account_name = $(this).data().account_name;
            var image = $(this).data().image;


            $("#bank_id").val(id);
            $("#bank_name").val(name);
            $("#branch").val(branch);
            $("#account_no").val(account_no);
            $("#account_name").val(account_name);
            $("#image").val(image);
            $('#image_avatar').attr("src", image);
            
            

//            alert("edit :"+size);
        });
        
        $("#change_avatar").change(function(event) {
            var file_list = event.target.files;
//            console.log(file_list);

            for (var i = 0, file; file = file_list[i]; i++) {
                var sFileName = file.name;
                var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
                var iFileSize = file.size;
                var iConvert = (file.size / 10485760).toFixed(2);

                if (!(sFileExtension === "pdf" || sFileExtension === "doc" || sFileExtension === "docx") || iFileSize > 10485760) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $.ajax({
                            url: 'index.php?r=Banks/ChangeProfileImage',
                            type: 'POST',
                            data: {
                                image: event.target.result,
                            },
                            success: function(data) {
                                console.log(data);
                                if (data != '-1') {
                                    $('#image_avatar').attr("src", data);
                                    $('#image').val(data);
                                }
                            }
                        });
                    };
                    reader.onerror = function(event) {
                        alert("I AM ERROR: " + event.target.error.code);
                    };
                    reader.readAsDataURL(file_list[0]);

                } else {
                    alert('error!,แนะนำให้ใส่เป็นรูปนามสกุล .png');
                }
            }
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
        <h1 class="page-header"><i class="fa fa-bar-chart-o fa-fw"></i> ข้อมูลธนคาร</h1>
    </div>
</div>

<ol class="breadcrumb">
    <li><a href="index.php?r=Banks/index"><i class="fa fa-bar-chart-o fa-fw"></i> ข้อมูลธนาคาร</a></li>
    <!--<li class="active">เพิ่มสินค้าใหม่</li>-->                                        
</ol>
<div class="panel panel-default">
    <div class="panel-body">
        <div>
                <label>รูป</label>
                <img class="img-responsive" id="image_avatar" src="./images/user.png">
                <div class="change-image btn btn-outline btn-primary" >
                    เปลี่ยนรูป
                    <input type="file" accept="image/jpeg" id="change_avatar">
                </div>
        </div>
        <form role="form" id="form">
            <input type="hidden" id="user_id" name="user_id" value="1"/>
            <input type="hidden" id="bank_id" name="bank_id" value="0"/>
            <input type="hidden" id="image" name="image" />
            <div class="form-group">
                <label>ชื่อธนาคาร</label>
                <input class="form-control" id="bank_name" name="bank_name" placeholder="เช่น กสิกรไทย">
            </div>
            <div class="form-group">
                <label>สาขา</label>
                <input class="form-control" id="branch" name="branch" placeholder="เช่น ขอนแก่น">
            </div>
            <div class="form-group">
                <label>เลขที่บัญชี</label>
                <input type="text" lang="10" class="form-control" id="account_no" name="account_no" placeholder="เช่น 1234567890">
            </div>
            <div class="form-group">
                <label>ชื่อบัญชี</label>
                <input type="text" class="form-control" id="account_name" name="account_name" placeholder="เช่น นายเค้ก ขายดีมาก ">
            </div>
            <button type="submit" class="btn btn-primary">บันทึก</button>
            <button type="reset" class="btn btn-warning">เคียร์ค่า</button>
        </form>
        <hr>
        <table class="table table-condensed table-striped" id="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อธนาคาร</th>
                    <th>สาขา</th>
                    <th>เลขที่บัญชี</th>
                    <th>ชื่อบัญชี</th>
                    <th>เมนู</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($model as $model):
                    $id = $model["bank_id"];
                    $name = $model["bank_name"];
                    $branch = $model["branch"];
                    $account_no = $model["account_no"];
                    $account_name = $model["account_name"];
                    $image = $model["image"];
                    ?>
                    <tr>
                        <td style="width: 5%;"><?php echo $id; ?></td>
                        <td style="width: 35%;"><?php echo $name; ?></td> 
                        <td style="width: 15%;"><?php echo $branch; ?></td> 
                        <td style="width: 15%;"><?php echo $account_no; ?></td> 
                        <td style="width: 15%;"><?php echo $account_name; ?></td> 
                        <td style="width: 15%;">
                            <div class="btn-group" >
                                <button class="edit" data-title="ลบ" rel="tooltip" 
                                        data-id="<?php echo $id; ?>" 
                                        data-name="<?php echo $name; ?>"
                                        data-branch="<?php echo $branch ?>"
                                        data-account_no="<?php echo $account_no; ?>"
                                        data-account_name="<?php echo $account_name; ?>"
                                        data-image="<?php echo $image; ?>"
                                        >
                                    <i class="glyphicon glyphicon-edit"></i></button>
                                <button class="delete" href="#" data-title="ลบ" rel="tooltip" data-id="<?php echo $id; ?>" data-name="<?php echo $name; ?>">
                                    <i class="glyphicon glyphicon-remove"></i></button>
                            </div> 
                        </td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
