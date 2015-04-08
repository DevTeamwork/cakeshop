<script>
    $(function() {
//        alert("asdf");
        var page = $("#side-menu li#product");
//        page.addClass("active");
        page.find("ul").first().addClass("nav nav-second-level collapse in");
        var ul = page.find("ul").first();
        ul.find("#index a").addClass("active");
        $('#side-menu').metisMenu();
        
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
<div class="row ">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-bar-chart-o fa-fw"></i> สินค้าทั้งหมด</h1>
    </div>
</div>

<ol class="breadcrumb">
    <li><a href="index.php?r=Products/index"><i class="fa fa-bar-chart-o fa-fw"></i> สินค้าทั้งหมด</a></li>
    <!--<li class="active">เพิ่มสินค้าใหม่</li>-->                                        
</ol>
<div class="panel panel-default">
<!--    <div class="panel-heading">
        Basic Form Elements
    </div>-->
    <div class="panel-body">
        <!-- /.row (nested) -->
        <table class="table table-condensed table-striped" id="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>สินค้า</th>
                    <th>เวลาใช้</th>
                    <th>ราคา</th>
                    <th>เมนู</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($model as $model):
                    $id = $model["product_id"];
                    $name = $model["name"];
                    $time = $model["time"];
                    $price = $model["price"];
                    ?>
                    <tr>
                        <td style="width: 5%;"><?php echo $id; ?></td>
                        <td style="width: 40%;"><?php echo $name; ?></td> 
                        <td style="width: 20%;"><?php echo $time; ?></td> 
                        <td style="width: 20%;"><?php echo $price; ?></td> 
                        <td style="width: 15%;">
                            <div class="btn-group" >
<!--                                <a href="index.php?r=Sites/NewsDetail&id=<?php echo $id; ?>" class="btn btn-primary view-site" data-title="ดูรายละเอียด" rel="tooltip">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>-->
<!--                                <button id="edit" name="delete"  data-title="แก้ไข" rel="tooltip"
                                   href="index.php?r=Sites/NewsEdit&id=<?php echo $id; ?>">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </button>-->
                                <!--<button class="edit"  data-id="<?php $id; ?>" data-title="แก้ไข" rel="tooltip"><i class="glyphicon glyphicon-edit"></i></button>-->
                                <button class="edit" data-title="ลบ" rel="tooltip" data-id="<?php echo $id; ?>" data-name="<?php echo $name; ?>">
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
    <!-- /.panel-body -->
</div>