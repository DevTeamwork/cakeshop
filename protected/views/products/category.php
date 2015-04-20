<script>
    $(function () {
//        alert("asdf");
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
//                alert($("#form").serialize());
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
            category_delete(id,name,row);
        });
        
        $(".edit").on("click", function () {
            var row = $(this).parents('tr:first');
            var id = $(this).data().id;
            var name = $(this).data().name;
            
            $("#category_id").val(id);
            $("#name").val(name);                       
        });


    });
</script>
<div class="row ">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-plus fa-fw"></i> เพิ่มประเภทสินค้า</h1>
    </div>
</div>

<ol class="breadcrumb">
    <li><a href="index.php?r=Products/index"><i class="fa fa-graduation-cap fa-fw"></i> ระบบสินค้า</a></li>
    <li class="active">เพิ่มประเภทสินค้า</li>                                        
</ol>
<div class="panel panel-default">
    <!--    <div class="panel-heading">
            Basic Form Elements
        </div>-->
    <div class="panel-body">
        <form role="form" id="form">
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
        <hr>
        <!-- /.row (nested) -->
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
    <!-- /.panel-body -->
</div>


