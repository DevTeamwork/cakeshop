<script>
    $(function () {
//          alert("asdf");
        var page = $("#side-menu li#product");
//        page.addClass("active");
        page.find("ul").first().addClass("nav nav-second-level collapse in");
        var ul = page.find("ul").first();
        ul.find("#category a").addClass("active");
        $('#side-menu').metisMenu();

//        console.log($("#side-menu li#product").parent().html());
//        CKEDITOR.disableAutoInline = false;
//        $('#editor1').ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
//        $('#editable').ckeditor(); // Use CKEDITOR.inline().


        $('#form').validate({
            rules: {
                name: "required",
            },
            messages: {
                name: "กรุณากรอกชื่อประเภทสินค้า",
            },
            submitHandler: function (form) {
//                newsSave($("#form").serialize());
                alert($("#form").serialize());
                category_save($("#form").serialize());

            }

        });

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

        $(".delete").on("click", function () {
            var id = $(this).data().id;
            var name = $(this).data().name;
            var row = $(this).parents('tr:first');
            category_delete(id, name, row);
        });

        $(".edit").on("click", function () {
            var row = $(this).parents('tr:first');
            var id = $(this).data().id;
            var name = $(this).data().name;
            var photo = $(this).data().photo;

            $("#category_id").val(id);
            $("#name").val(name);
            $('#image_avatar').attr("src", photo);
        });

        $("#change_avatar").change(function (event) {
            var file_list = event.target.files;
            console.log(file_list);

            for (var i = 0, file; file = file_list[i]; i++) {
                var sFileName = file.name;
                var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
                var iFileSize = file.size;
                var iConvert = (file.size / 10485760).toFixed(2);

                if (!(sFileExtension === "pdf" || sFileExtension === "doc" || sFileExtension === "docx") || iFileSize > 10485760) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        $.ajax({
                            url: 'index.php?r=Products/UploadCategoryPhoto',
                            type: 'POST',
                            data: {
                                image: event.target.result,
                            },
                            success: function (data) {
                                console.log(data);
                                if (data != '-1') {
                                    $('#image_avatar').attr("src", data);
                                    $('#photo').val(data);
                                }
                            }
                        });
                    };
                    reader.onerror = function (event) {
                        alert("I AM ERROR: " + event.target.error.code);
                    };
                    reader.readAsDataURL(file_list[0]);

                } else {
                    alert('error!,แนะนำให้ใส่เป็นรูปนามสกุล .png');
                }
            }
        });

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
        <h1 class="page-header"><i class="fa fa-plus fa-fw"></i> เพิ่มประเภทสินค้า</h1>
    </div>
</div>

<ol class="breadcrumb">
    <li><a href="index.php?r=Products/index"><i class="fa fa-graduation-cap fa-fw"></i> ระบบสินค้า</a></li>
    <li class="active">เพิ่มประเภทสินค้า</li>                                        
</ol>
<div class="panel panel-default" id="add">
    <div class="panel-body">
        <div class="col-xs-6">
            <img class="img-responsive" id="image_avatar" src="images/base/image.png">
            <div class="change-image btn btn-outline btn-primary" >
                เปลี่ยนรูป
                <input type="file" accept="image/jpeg" id="change_avatar">
            </div>
        </div>
        <div class="col-xs-6">       
            <form role="form" id="form">
                <input type="hidden" id="photo" name="photo"/>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="hidden" id="category_id" name="category_id" value="0"/>
                        <div class="form-group">
                            <label>ชื่อประเภทสินค้า</label>
                            <input class="form-control" id="name" name="name" placeholder="ชื่อประเภทสินค้า">
                        </div>
                    </div>
                    <div class="col-lg-6"> 
                        <div class="form-group" style="padding-top: 25px;">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                            <button type="reset" class="btn btn-warning">เคียร์ค่า</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <hr>
    </div>
</div>
<div class="panel panel-default" id="list">
    <div class="panel-body">
        <table class="table table-condensed table-striped" id="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ข้อมูลประเภทสินค้า</th>
                    <th>เมนู</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($model as $model):
                    $id = $model["category_id"];
                    $name = $model["name"];
                    ?>
                    <tr>
                        <td style="width: 5%;"><?php echo $id; ?></td>
                        <td style="width: 80%;"><?php echo $name; ?></td> 
                        <td style="width: 15%;">
                            <div class="btn-group" >
                                <button class="edit" data-title="แก้ไข" rel="tooltip" 
                                        data-id="<?php echo $id; ?>" 
                                        data-name="<?php echo $name; ?>">
                                    <i class="glyphicon glyphicon-edit"></i></button>
                                <button class="delete" href="#" data-title="ลบ" rel="tooltip" 
                                        data-id="<?php echo $id; ?>" 
                                        data-name="<?php echo $name; ?>">
                                    <i class="glyphicon glyphicon-remove"></i></button>

                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
