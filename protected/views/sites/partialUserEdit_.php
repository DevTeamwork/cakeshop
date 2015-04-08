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

<div>
    <center>
        <img class="img-responsive" id="image_avatar" src="./images/user.png" width="128" height="128">
        <div class="change-image btn btn-outline btn-primary" >
            เปลี่ยนรูป

            <input type="file" accept="image/jpeg" id="change_avatar">
        </div>
    </center>
</div>
<form id="userinfo-form" class="form-horizontal" role="form">
    <!--<input type="hidden" id="rg_websiteid" name="rg_websiteid" value="<?php echo $website_id; ?>"/>-->
    <input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>" />
    <input type="hidden" id="image_profile" name="image_profile" value="<?php echo $image_profile; ?>" />
    <input type="hidden" id="root_path" name="root_path" value="<?php echo Yii::app()->request->baseUrl . '/uploads/'; ?>"/>
    <fieldset>
        <legend><i class="fa fa-user fa-fw"></i> ข้อมูลส่วนตัว</legend>
        <div class="form-group">
            <label for="firstname" class="col-md-2 control-label">ชื่อ<span class="required">*</span></label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="firstname" placeholder="ตัวอย่าง : สมชาย" 
                       value="<?php echo $fistname; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="lastname" class="col-md-2 control-label">นามสกุล<span class="required">*</span></label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="ตัวอย่าง : เรียนดี" 
                       value="<?php echo $lastname; ?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="nickname" class="col-md-2 control-label">ชื่อเล่น</label>
            <div class="col-md-9">
                <input type="text" id="nickname" class="form-control" name="nickname" placeholder="ตัวอย่าง : ชาติ"
                       value="<?php echo $nickname; ?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="birthday" class="col-md-2 control-label">วันเกิด</label>
            <div class="col-md-9">
                <input type="date" id="birthday" class="form-control" name="birthday" placeholder=""
                       value="<?php echo $birthday; ?>" >
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend><i class="fa fa-home fa-fw"></i> ที่อยู่</legend>
        <div class="form-group">
            <label for="address_contact" class="col-md-2 control-label">ที่อยู่ติดต่อได้</label>
            <div class="col-md-9">
                <textarea type="text" class="form-control" name="address_contact" id="address_contact" placeholder="ตัวอย่าง : 11/232 ต.ในเมือง อ.เมือง จ.ขอนแก่น 40000"
                          ><?php echo $address_contact; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-md-2 control-label">ที่อยู่ตามทะเบียนบ้าน</label>
            <div class="col-md-9">
                <textarea type="text" class="form-control" name="address" id="lastname" placeholder="ตัวอย่าง : 11/232 ต.ในเมือง อ.เมือง จ.ขอนแก่น 40000"
                          ><?php echo $address; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="address_office" class="col-md-2 control-label">ที่อยู่ที่ทำงาน</label>
            <div class="col-md-9">
                <textarea type="text" id="address_office" class="form-control" name="address_office" placeholder="ตัวอย่าง : 323/232 ต.ในเมือง อ.เมือง จ.ขอนแก่น 40000"
                          ><?php echo $address_office; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="tel" class="col-md-2 control-label">เบอร์โทร</label>
            <div class="col-md-9">
                <input type="tel" id="tel" class="form-control" name="tel" placeholder="ตัวอย่าง : 0896234234"
                       value="<?php echo $tel; ?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-2 control-label">อีเมลล์ <span class="required">*</span></label>
            <div class="col-md-9">
                <input type="tel" id="email" class="form-control" name="email" placeholder="ตัวอย่าง : username@gmail.com" 
                       value="<?php echo $email; ?>">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend><i class="fa fa-university fa-fw"></i> สถานศึกษา</legend>
        <div class="form-group">
            <label for="student_no" class="col-md-2 control-label">รหัสนักศึกษา</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="student_no" id="student_no" placeholder="ตัวอย่าง : 542342343"
                       value="<?php echo $student_no; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="faculty" class="col-md-2 control-label">คณะ</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="faculty" id="faculty" placeholder="ตัวอย่าง : ครุศาสตร์"
                       value="<?php echo $faculty; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="department" class="col-md-2 control-label">สาขา</label>
            <div class="col-md-9">
                <input type="text" id="department" class="form-control" name="department" placeholder="ตัวอย่าง : คอมพิวเตอร์"
                       value="<?php echo $department; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="generation_no" class="col-md-2 control-label">รุ่นที่จบ</label>
            <div class="col-md-9">
                <input type="number" id="generation_no" class="form-control" name="generation_no" placeholder="1"
                       value="<?php echo $generation_no; ?>" >
            </div>
        </div>

        <div class="form-group">
            <label for="year_start" class="col-md-2 control-label">ปีที่จบ(พ.ศ)</label>
            <div class="col-md-9">
                <input type="text" id="year_start" class="form-control" name="year_start" placeholder="ตัวอย่าง : 2553"
                       value="<?php echo $year_start; ?>">
            </div>
        </div>
    </fieldset>

    <div class="form-group">
        <!-- Button -->                                        
        <div class="col-md-offset-2 col-md-9">
            <input type="submit" value="บันทึก" id="btn_forgot" class="btn btn-primary"/>
            <input type="reset" value="เคลียร์ข้อมูล" class="btn btn-danger">
        </div>
    </div>
</form>

