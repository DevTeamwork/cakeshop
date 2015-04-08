<?php
$userid = $model->userid;
$fistname = $model->firstname;
$lastname = $model->lastname;
$nickname = $model->nickname;
$birthday = $model->birthday;
$address_contact = $model->address_contact;
$address = $model->address;
$address_office = $model->address_office;
$tel = $model->tel;
$email = $model->email;
$student_no = $model->student_no;
$faculty = $model->faculty;
$department = $model->department;
$generation_no = $model->generation_no;
$year_start = $model->year_start;
$image_profile = $model->image_profile;
?>
<script type="text/javascript">

    $(function() {
        //image_profile
        var str1 = $('#root_path').val();
        var str2 = $('#website_id').val();
        var res = str1.concat(str2);
        var image_file = $('#image_profile').val();
        console.log(image_file);
        if (image_file == "") {
            $('#image_avatar').attr('src', './images/user.png');
        } else {
            var img = '/profile/' + image_file;
            var imageUrl = res.concat(img);
            console.log(imageUrl);

            $.ajax({
                url: imageUrl,
                type: 'HEAD',
                error: function() {
                    //file not exists
                    console.log("file not exists");
                },
                success: function() {
                    //file exists
                    console.log("file exists");
                    //$('#avatar').attr('src', '' + $(this).data().username + '.png');
                    $('#image_avatar').attr('src', imageUrl);
                }
            });
        }
    });
</script>
<form id="userinfo-form" class="form-horizontal" role="form">
    <input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>" />
    <input type="hidden" id="image_profile" name="image_profile" value="<?php echo $image_profile; ?>" />
    <input type="hidden" id="root_path" name="root_path" value="<?php echo Yii::app()->request->baseUrl . '/uploads/'; ?>"/>
    <fieldset>                         
        <!--<legend><i class="fa fa-user fa-fw"></i> รูปประจำตัว</legend>-->
        <div class="form-group">
            <center>
                <!--<img src="<?php echo Yii::app()->request->baseUrl . "/images/user.png" ?>" width="128" height="128">-->
                <img class="img-responsive" id="image_avatar" src="./images/user.png">
            </center>
        </div>
    </fieldset>
    <fieldset>
        <legend><i class="fa fa-user fa-fw"></i> ข้อมูลส่วนตัว</legend>
        <div class="form-group">
            <label for="firstname" class="col-md-2 control-label">ชื่อ</label>
            <div class="col-md-9">
                <label for="firstname" class="control-label"><?php echo $fistname; ?></label>
                
            </div>
        </div>

        <div class="form-group">
            <label for="lastname" class="col-md-2 control-label">นามสกุล</label>
            <div class="col-md-9">
                
                <label for="lastname" class="control-label"><?php echo $lastname; ?></label>
            </div>
        </div>
        <div class="form-group">
            <label for="nickname" class="col-md-2 control-label">ชื่อเล่น</label>
            <div class="col-md-9">
                
                <label for="lastname" class="control-label"><?php echo $nickname; ?></label>
            </div>
        </div>
        <div class="form-group">
            <label for="brithday" class="col-md-2 control-label">วันเกิด</label>
            <div class="col-md-9">
                
                <label for="brithday" class="control-label"><?php echo $birthday; ?></label>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend><i class="fa fa-home fa-fw"></i> ที่อยู่</legend>
        <div class="form-group">
            <label for="address_contact" class="col-md-2 control-label">ที่อยู่ติดต่อได้</label>
            <div class="col-md-9">           
                <label for="address_contact" class="control-label"><?php echo $address_contact; ?></label>
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-md-2 control-label">ที่อยู่ตามทะเบียนบ้าน</label>
            <div class="col-md-9">
                <label for="address" class="control-label"><?php echo $address; ?></label>
            </div>
        </div>
        <div class="form-group">
            <label for="address_office" class="col-md-2 control-label">ที่อยู่ที่ทำงาน</label>
            <div class="col-md-9">               
                <label for="address_office" class="control-label"><?php echo $address_office; ?></label>
            </div>
        </div>
        <div class="form-group">
            <label for="tel" class="col-md-2 control-label">เบอร์โทร</label>
            <div class="col-md-9">
                
                <label for="tel" class="control-label"><?php echo $tel; ?></label>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-2 control-label"> อีเมลล์</label>
            <div class="col-md-9">
                
                <label for="email" class="control-label"> <?php echo $email; ?></label>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend><i class="fa fa-university fa-fw"></i> สถานศึกษา</legend>
        <div class="form-group">
            <label for="student_no" class="col-md-2 control-label">รหัสนักศึกษา</label>
            <div class="col-md-9">
                
                <label for="student_no" class="control-label"><?php echo $student_no; ?></label>
            </div>
        </div>

        <div class="form-group">
            <label for="faculty" class="col-md-2 control-label">คณะ</label>
            <div class="col-md-9">
                
                <label for="faculty" class="control-label"><?php echo $faculty; ?></label>
            </div>
        </div>
        <div class="form-group">
            <label for="department" class="col-md-2 control-label">สาขา</label>
            <div class="col-md-9">
                
                <label for="department" class="control-label"><?php echo $department; ?></label>
            </div>
        </div>

        <div class="form-group">
            <label for="generation_no" class="col-md-2 control-label">รุ่นที่จบ</label>
            <div class="col-md-9">
                
                <label for="generation_no" class="control-label"><?php echo $generation_no; ?></label>
            </div>
        </div>

        <div class="form-group">
            <label for="year_start" class="col-md-2 control-label">ปีที่จบ(พ.ศ)</label>
            <div class="col-md-9">
                
                <label for="year_start" class="control-label"><?php echo $year_start; ?></label>
            </div>
        </div>
    </fieldset>

    <!--                        <div class="form-group">
                                 Button                                         
                                <div class="col-md-offset-2 col-md-9">
                                    <input type="submit" value="บันทึก" id="btn_forgot" class="btn btn-primary"/>
                                    <input type="reset" value="เคลียร์ข้อมูล" class="btn btn-danger">
                                </div>
                            </div>-->
</form>

