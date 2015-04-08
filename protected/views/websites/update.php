
<script>
//    
    $(function() {
        $('#menuUser').remove();
        $("#title-page").text("แก้ไขเว็บไซต์");
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

                // Forbid suppressing "Warning" step if the user is to young
//                if (newIndex === 3 && Number($("#age").val()) < 18)
//                {
//                    return false;
//                }

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
//                alert("save data");
//                saveSite();
                $.ajax({
                    url: 'index.php?r=Websites/WebsiteInsert',
                    type: 'POST',
                    data: $('#form').serialize(),
                    success: function(data) {
                        if (data == '1') {
                            location.href = "index.php?r=websites/All";
                        } else {
                            console.log("Insert website error : " + data);
                        }
                    }
                });
                a

            }
        }).validate({
            errorPlacement: function(error, element)
            {
                element.before(error);
            },
            rules: {
                confirm: {
//                    equalTo: "#password"
                }
            }
        });
//        
//        editSite($("#website_id").val());
        //alert($("#website_id").val());

    });
</script>
<?php
$this->renderPartial('PartailMenu', array("username" => $username));
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">แก้ไขเว็บไซต์</h3>
    </div>
    <div class="panel-body">
        <form id="form">
            <h1>ข้อมูลทั่วไป</h1>
            <br/>
            <fieldset>
                <legend>ข้อมูลทั่วไป เกี่ยวกับเว็บศิษย์เก่า</legend>
                <input type="hidden" name="website_id" id="website_id" value="<?php echo $model->website_id; ?>">
                <input type="hidden" name="userid" id="userid" value='<?php echo $model->userid; ?>'/>
                <div class="form-group">
                    <label for="name">ชื่อเว็บไซต์ <span style="color: red;">*</span></label>
                    <input type="text" id="name" name="name" class="required form-control" value="<?php echo $model->name; ?>"/>
                </div>

                <div class="form-group">
                    <label for="university">ชื่อโรงเรียน/มหาวิทยาลัย <span style="color: red;">*</span></label>
                    <input type="text" id="university" name="university"  value="<?php echo $model->university; ?>" class="required form-control"/>
                </div>

                <!--                <div class="form-group">
                                    <label>logo</label>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="<?php echo Yii::app()->request->baseUrl . '/uploads/' . $model->logo;
; ?>" class="img-responsive img-radio">
                                            <img class="img-thumbnail img-rounded" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/<?php echo '/' . $image_path; ?>">
                                            <input type="file" id="logo" name="logo"/>
                                        </div>
                                        <div class="col-xs-4">
                                            <img src="<?php echo Yii::app()->request->baseUrl . '/uploads/' . $model->logo;
; ?>" class="img-responsive img-radio">
                                            <img class="img-thumbnail img-rounded" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/<?php echo '/' . $model->logo; ?>">
                                        </div>
                                    </div>
                                    
                                </div>-->
                <!--                <div class="form-group">
                                    <label>Banner</label>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="<?php echo Yii::app()->request->baseUrl . '/uploads/' . $model->logo;
; ?>" class="img-responsive img-radio">
                                            <input type="file" id="banner" name="banner" value="<?php echo $model->banner; ?>" />
                                        </div>
                                    </div>
                                    
                                </div>-->
                <p style="color: red;">(*)กรุณากรอกให้ครบ</p>
            </fieldset>

            <h1>เลือกหน้าที่ต้องการสร้าง</h1>
            <fieldset>
                <legend>เลือกหน้าที่ต้องการสร้าง</legend>
                <div class="form-group">       
                    <!--            <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="checkbox" checked> Option 1 (pre-checked)
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="checkbox"> Option 2
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="checkbox"> Option 3
                                    </label>
                                </div>-->
                    <div class="form-group" >
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_mainpage" disabled="true" name="sel_mainpage" value="true" 
                                       <?php
                                       if ($model->sel_mainpage == "true") {
                                           echo 'checked';
                                       }
                                       ?>/>
                                หน้าหลัก
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_profile" name="sel_profile" value="true" 
                                       <?php
                                       if ($model->sel_profile == "true") {
                                           echo 'checked';
                                       }
                                       ?>/>
                                หน้าข้อมูลผู้ใช้
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_editprofile" name="sel_editprofile" value="true" 
                                <?php
                                if ($model->sel_editprofile == "true") {
                                    echo 'checked';
                                }
                                ?>
                                       /> หน้าแก้ไขข้อมูลผู้ใช้
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_listuser" name="sel_listuser" value="true" 
                                <?php
                                if ($model->sel_listuser == "true") {
                                    echo 'checked';
                                }
                                ?>
                                       /> หน้าทำเนียบศิษย์เก่า
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_portfolio" name="sel_portfolio" value="true" 
                                <?php
                                if ($model->sel_portfolio == "true") {
                                    echo 'checked';
                                }
                                ?>
                                       /> หน้าผลงานศิษย์เก่า
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_album" name="sel_album" value="true" <?php
                                if ($model->sel_album == "true") {
                                    echo 'checked';
                                }
                                ?>/> หน้าอัลบั้มศิษย์เก่า
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_published" name="sel_published" value="true" 
                                       <?php
                                       if ($model->sel_published == "true") {
                                           echo 'checked';
                                       }
                                       ?>/> หน้าข่าวสารจากผู้ดูแลระบบ
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_contact" name="sel_contact" value="true" <?php
                                       if ($model->sel_contact == "true") {
                                           echo 'checked';
                                       }
                                       ?>/> หน้าติดต่อผู้ดูแลระบบ
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
                                <input type="checkbox" id="sel_login" name="sel_login" value="true"
                                <?php
                                if ($model->sel_login == "true") {
                                    echo 'checked';
                                }
                                ?>
                                       /> เข้าสู่ระบบ
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_register" name="sel_register" value="true"
                                       <?php
                                       if ($model->sel_register == "true") {
                                           echo 'checked';
                                       }
                                       ?>/> สมัครสมาชิก
                            </label>
                        </div>
<!--                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_news" name="sel_news" value="true"
                                       <?php
//                                       if ($model->sel_news == "true") {
//                                           echo 'checked';
//                                       }
                                       ?>/> ข่าววันนี้
                            </label>
                        </div>-->
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_webboad" name="sel_webboad" value="true" 
                                       <?php
                                       if ($model->sel_webboad == "true") {
                                           echo 'checked';
                                       }
                                       ?>/> กระดานข่าวศิษย์เก่า
                            </label>
                        </div>

                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_viewsite" name="sel_viewsite" value="true" <?php
                                       if ($model->sel_viewsite == "true") {
                                           echo 'checked';
                                       }
                                       ?>/> ผู้ชมทั้งหมด
                            </label>
                        </div>
                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_accounts" name="sel_accounts" value="true" <?php
                                       if ($model->sel_accounts == "true") {
                                           echo 'checked';
                                       }
                                       ?>/> สมาชิกทั้งหมด
                            </label>
                        </div>
<!--                        <div class="button-checkbox">
                            <label>
                                <input type="checkbox" id="sel_knowledge" name="sel_knowledge" value="true" <?php
//                                       if ($model->sel_knowledge == "true") {
//                                           echo 'checked';
//                                       }
                                       ?>/> สาระน่ารู้
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
