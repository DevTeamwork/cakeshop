<script>
    $(function () {
var page = $("#side-menu li#product");
        page.find("ul").first().addClass("nav nav-second-level collapse in");
        var ul = page.find("ul").first();
        ul.find("#add a").addClass("active");
        $('#side-menu').metisMenu();


        $('#form').validate({
            rules: {
                name: "required",
                time: "required",
                price: "required"
            },
            messages: {
                name: "กรุณากรอก ชื่อสินค้า",
                time: "กรุณากรอก เวลาทำ",
                price: "กรุณากรอก ราคา"
            },
            submitHandler: function (e) {
                console.log($("#form").serialize());
                product_save($("#form").serialize());
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
            product_delete(id, name, row);
        });

        $(".edit").on("click", function () {
            var row = $(this).parents('tr:first');
            var id = $(this).data().id;
            var name = $(this).data().name;
            var discription = $(this).data().discription;
            var time = $(this).data().time;
            var price = $(this).data().price;
            var category_id = $(this).data().category_id;
            var size = $(this).data().size;
            var photo = $(this).data().photo;

            $("#product_id").val(id);
            $("#name").val(name);
            $("#discription").val(discription);
            $("#time").val(time);
            $("#price").val(price);
            $("#category_id").val(category_id);
            $("#size").val(size);
            $('#image_avatar').attr("src", photo);
        });
        
        $("#change_avatar").change(function(event) {
            var file_list = event.target.files;
            console.log(file_list);

            for (var i = 0, file; file = file_list[i]; i++) {
                var sFileName = file.name;
                var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
                var iFileSize = file.size;
                var iConvert = (file.size / 10485760).toFixed(2);

                if (!(sFileExtension === "pdf" || sFileExtension === "doc" || sFileExtension === "docx") || iFileSize > 10485760) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $.ajax({
                            url: 'index.php?r=Products/UploadPhoto',
                            type: 'POST',
                            data: {
                                image: event.target.result,
                            },
                            success: function(data) {
                                console.log(data);
                                if (data != '-1') {
                                    $('#image_avatar').attr("src", data);
                                    $('#photo').val(data);
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
        <h1 class="page-header"><i class="fa fa-plus fa-fw"></i> เพิ่มสินค้าใหม่</h1>
    </div>
</div>

<ol class="breadcrumb">
    <li><a href="index.php?r=Products/index"><i class="fa fa-graduation-cap fa-fw"></i> ระบบสินค้า</a></li>
    <li class="active">เพิ่มสินค้าใหม่</li>                                        
</ol>
<div class="panel panel-default">
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
                <input type="hidden" id="user_id" name="user_id" value="1"/>
                <input type="hidden" id="product_id" name="product_id" value="0"/>
                <input type="hidden" id="photo" name="photo" />
                <div class="form-group">
                    <label>ชื่อสินค้า</label>
                    <input class="form-control" id="name" name="name" placeholder="ชื่อสินค้า">
                </div>
                <div class="form-group">
                    <label>คำอธิบาย</label>
                    <textarea class="form-control" id="discription" name="discription" placeholder="คำอธิบาย"></textarea>
                </div>
                <div class="form-group">
                    <label>เวลาที่ใช้ทำ (วัน)</label>
                    <input type="number" class="form-control" id="time" name="time" placeholder="เวลาที่ใช้ทำ เช่น 1">
                </div>
                <div class="form-group">
                    <label>ราคา(บาท)</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="ราคา เช่น 300">
                </div>
                <div class="form-group">
                    <label>ประเภทสินค้า</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <?php
                        foreach ($category as $category):
                            $category_id = $category["category_id"];
                            $category_name = $category["name"];
                            ?>
                            <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>ขนาด</label>
                    <select class="form-control" id="size" name="size">
                        <option value="1"> 1 ปอน</option>
                        <option value="2"> 2 ปอน</option>
                        <option value="3"> 3 ปอน</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <button type="reset" class="btn btn-warning">เคียร์ค่า</button>
            </form>
        </div>
        <hr>
        <table class="table table-condensed table-striped" id="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>สินค้า</th>
                    <th>ใช้เวลา (วัน)</th>
                    <th>ขนาด (ปอน)</th>
                    <th>ราคา</th>
                    <th>เมนู</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row_index = 0;
                foreach ($model as $model):
                    $id = $model["product_id"];
                    $name = $model["name"];
                    $discription = $model["discription"];
                    $time = $model["time"];
                    $price = $model["price"];
                    $category_id = $model["category_id"];
                    $size = $model["size"];
                    $photo = $model["photo"];
                    if($photo == ""){
                        $photo = "images/base/image.png";
                    }
                    $row_index += 1;
                    ?>
                    <tr>
                        <td style="width: 5%;"><?php echo $row_index; ?></td>
                        <td style="width: 50%;"><?php echo $name; ?></td> 
                        <td style="width: 10%;"><?php echo $time; ?></td> 
                        <td style="width: 10%;"><?php echo $size; ?></td> 
                        <td style="width: 10%;"><?php echo $price; ?></td> 
                        <td style="width: 15%;">
                            <div class="btn-group" >
                                <button class="edit" data-title="แก้ไข" rel="tooltip" 
                                        data-id="<?php echo $id; ?>" 
                                        data-name="<?php echo $name; ?>"
                                        data-time="<?php echo $time; ?>"
                                        data-price="<?php echo $price; ?>"
                                        data-size="<?php echo $size; ?>"
                                        data-discription="<?php echo $discription; ?>"
                                        data-category_id="<?php echo $category_id; ?>"
                                        data-photo="<?php echo $photo; ?>">
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