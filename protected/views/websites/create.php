<?php
/* @var $this WebsitesController */
/* @var $model Websites */

//$this->breadcrumbs=array(
//	'เว็บไซต์ทั้งหมด'=>array('index'),
//	'สร้างเว็บใซต์ใหม่',
//);
//$this->menu=array(
//	array('label'=>'List Websites', 'url'=>array('index')),
//	array('label'=>'Manage Websites', 'url'=>array('admin')),
//);
?>
<script>
    $(function() {
            var obj_create = {
                rules: {
                    name: "required",
                    university: "required"
                },
                messages: {
                    name: "กรุณากรอก ชื่อเว็บไซต์",
                    university: "กรุณากรอก ชื่อโรงเรียน/มหาวิทยาลัย "
                }
//                ,
//                submitHandler: function(form) {
////                    login($("#login-form").serialize(), $("#website_id").val());
//                }
            };
    
        $("#form").steps({
            bodyTag: "fieldset",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical",
            onStepChanging: function(event, currentIndex, newIndex)
            {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex)
                {
                    return true;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function(event, currentIndex, priorIndex)
            {
                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("previous");
                    return;
                }

                // Suppress (skip) "Warning" step if the user is old enough.
//                if (currentIndex === 2 && Number($("#age").val()) >= 18)
//                {
//                    $(this).steps("next");
//                }
            },
            onFinishing: function(event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function(event, currentIndex)
            {
                var form = $(this);
//                alert("submit");
                // Submit form input
//                form.submit();
//                location.href = "index.php?r=websites/All"; 
//                console.log($('#form').serialize());
                $.ajax({
                    url: 'index.php?r=Websites/WebsiteInsert',
                    type: 'POST',
                    data: $('#form').serialize(),
                    success: function(data) {
//                        alert(data);
                        if (data == '1') {
                            location.href = "index.php?r=websites/All";
                        } else {
                            console.log("Insert website error : "+data);
                        }
                    }
                });

            }
        }).validate(obj_create
//                {
//            errorPlacement: function(error, element)
//            {
//                element.before(error);
//            },
//            rules: {
//                confirm: {
////                    equalTo: "#password"
//                }
//            }
//        }
                );
    });
</script>
<?php
$this->renderPartial('PartailMenu', array("username" => $username));
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">สร้างเว็บไซต์</h3>
    </div>
    <div class="panel-body">
        <!--<form id="form" action="index.php?r=websites/SaveSite" method="post" enctype="multipart/form-data">-->

        <form id="form">
            <h1>ข้อมูลทั่วไป</h1>
            <br/>
            <fieldset>
                <legend>ข้อมูลทั่วไป เกี่ยวกับเว็บศิษย์เก่า</legend>
                <input type="hidden" name="website_id" id="website_id"/>
                <input type="hidden" name="userid" id="userid" value='<?php echo $userid ?>'/>
                <div class="form-group">
                    <label for="name">ชื่อเว็บไซต์ <span style="color: red;">*</span></label>
                    <input type="text" id="name" name="name" class="required form-control"/>
                </div>
                <div class="form-group">
                    <label for="university">ชื่อโรงเรียน/มหาวิทยาลัย <span style="color: red;">*</span></label>
                    <input type="text" id="university" name="university" class="required form-control"/>
                </div>
<!--                <div class="form-group">

                    <label>ตราสัญลักษณ์/โลโก้ <span style="color: red;">*</span></label>

                    <input type="file" id="logo" title="เลือกไฟล์" name="logo" value="logo"/>
                </div>
                <div class="form-group">
                    <label>แบนเนอร์ <span style="color: red;">*</span></label>
                    <input type="file" id="banner" name="banner" value="banner" />
                </div>-->
                <p style="color: red;">(*)กรุณากรอกให้ครบ</p>
            </fieldset>

            <h1>เลือกหน้าที่ต้องการสร้าง</h1>
            <fieldset>
                <legend>เลือกหน้าที่ต้องการสร้าง</legend>
                <div class="form-group">       
                    <div class="form-group" >
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" disabled="true" id="sel_mainpage" name="sel_mainpage" value="true" checked/> หน้าหลัก
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_profile" name="sel_profile" value="true" /> หน้าข้อมูลผู้ใช้
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_editprofile" name="sel_editprofile" value="true" /> หน้าแก้ไขข้อมูลผู้ใช้
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_listuser" name="sel_listuser" value="true" /> หน้าทำเนียบศิษย์เก่า
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_portfolio" name="sel_portfolio" value="true" /> หน้าผลงานศิษย์เก่า
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_album" name="sel_album" value="true" /> หน้าอัลบั้มศิษย์เก่า
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_published" name="sel_published" value="true" /> หน้าข่าวสารจากผู้ดูแลระบบ
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_contact" name="sel_contact" value="true" /> หน้าติดต่อผู้ดูแลระบบ
                            </label>
                        </div>
                    </div>
                </div>

            </fieldset>
            <h1>ตั้งค่าหน้าหลัก</h1>
            <fieldset>
                <legend>ตั้งค่าหน้าหลัก</legend>
                <div class="form-group">       
                    <div class="form-group" >
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_login" name="sel_login" value="true"/> เข้าสู่ระบบ
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_register" name="sel_register" value="true"/> สมัครสมาชิก
                            </label>
                        </div>
<!--                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_news" name="sel_news" value="true" /> ข่าววันนี้
                            </label>
                        </div>-->
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_webboad" name="sel_webboad" value="true" /> กระดานข่าวศิษย์เก่า
                            </label>
                        </div>

                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_viewsite" name="sel_viewsite" value="true" /> ผู้ชมทั้งหมด
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_accounts" name="sel_accounts" value="true" /> สมาชิกทั้งหมด
                            </label>
                        </div>
<!--                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_knowledge" name="sel_knowledge" value="true" /> สาระน่ารู้
                            </label>
                        </div>-->

                    </div>
                </div>

            </fieldset>
            <!--    <h1>เสร็จสิ้น</h1>
                <fieldset>
                    <legend>เสร็จสิ้น</legend>
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                </fieldset>-->
        </form>
    </div>
</div>
<!--<div class="container">
    <div class="row">
        
    </div>
</div>-->
