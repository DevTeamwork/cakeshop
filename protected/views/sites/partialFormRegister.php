<form id="adduser-form" class="form-horizontal" role="form">
    <fieldset>
        <legend>กรอกข้อมูลผู้ใช้งาน</legend>
        <input type="hidden" id="rg_websiteid" name="rg_websiteid" value="<?php echo $websites->website_id ?>"/>
        <div class="form-group">
            <label for="rg_username" class="col-md-2 control-label">ชื่อผู้ใช้งาน</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="rg_username" placeholder="username">
            </div>
        </div>

        <div class="form-group">
            <label for="rg_email" class="col-md-2 control-label">อีเมลล์</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="rg_email" id="rg_email" placeholder="name@gmail.com">
            </div>
        </div>
        <div class="form-group">
            <label for="rg_password" class="col-md-2 control-label">รหัสผ่าน</label>
            <div class="col-md-8">
                <input type="password" id="rg_password" class="form-control" name="rg_password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="rg_password_confrim" class="col-md-2 control-label">ยืนยันรหัสผ่าน</label>
            <div class="col-md-8">
                <input type="password" name="rg_password_confrim" id="rg_password_confrim" placeholder="Password" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <!-- Button -->                                        
            <div class="col-md-offset-2 col-md-8">
                <input type="submit" value="บันทึก" id="btn_forgot" class="btn btn-primary"/>
                <input type="reset" value="เคลียร์ข้อมูล" class="btn btn-danger">
            </div>
        </div>
    </fieldset>
</form>

