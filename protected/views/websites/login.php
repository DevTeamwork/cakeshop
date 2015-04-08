<!--<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>-->
<script>
    $(function() {
        $("#title-page").text("เว็บไซต์ฐานข้อมูลศิษย์เก่า");
        $('#menuAdmin').hide();
        $('#forgotbox').hide();
        $('#menu_account').hide();

        $('#login-form').validate({
            rules: {
                ln_username: "required",
                ln_password: "required"
            },
            messages: {
                ln_username: "กรุณากรอกชื่อผู้ใช้งาน",
                ln_password: "กรุณากรอกรหัสผ่าน"
            },
            submitHandler: function(form) {
//                alert("login summit");
//                console.log($("#login-form").serialize());
                            $.ajax({
                                url: 'index.php?r=Websites/Login',
                                data: $("#login-form").serialize(),
                                type: "POST",
                                success: function(data) {
//            alert(data);
                                    if (data == 'y') {
//                                        alert("ล็อกอิน สำเร็จ");
                                        location.href = "index.php?r=Websites/create";

                                    } else {
                                        alert("ผิดพลาด");
                                    }
                                }
                            });
                        }
        });
        
        var obj_resister = {
            rules: {
                rg_username: "required"
                ,rg_email: {
                    required: true,
                    email: true,
                    remote:"index.php?r=WebSites/UniqueEmail"
                }
                ,rg_password:{
                    required:true,
                    minlength: 6
                }
                ,rg_password_confrim:{
                    equalTo : "#rg_password"
                }
                
            },
            messages: {
                rg_username: "กรุณากรอกชื่อผู้ใช้งาน"
                ,rg_email: {
                    required:'กรุณากรอกอีเมลล์',
                    email:"กรุณากรอกอีเมลล์ให้ถูกต้อง ตัวอย่าง username@gmail.com",
                    remote:'อีเมลล์ถูกใช้งานแล้ว'
                }
                ,rg_password:"กรอกรหัสผ่านอย่างน้อย 6 ตัว"
                ,rg_password_confrim:"รหัสผ่านไม่ตรงกัน"
            },
            submitHandler: function(form) {
                register($('#register-form').serialize());
            }
        };
        
        $('#register-form').validate(obj_resister);
        
    });
</script>
<style>
    .error{
        color: red;
    }
</style>
<div class="container">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">เข้าระบบ</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#" onclick="$('#loginbox').hide();
                        $('#signupbox').hide();
                        $('#forgotbox').show();">ลืมรหัสผ่าน</a></div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="login-form" class="form-horizontal" role="form">
                    <!--<input id="page_site" name="page_site" type="hidden" value="M">-->
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="ln_username" type="text" class="form-control" name="ln_username" value="" placeholder="username">                                        
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="ln_password" type="password" class="form-control" name="ln_password" placeholder="password">
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-user icon-white"></i> ตกลง
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                หากยังไม่เป็นสมาชิก! 
                                <a href="#" onClick="$('#loginbox').hide();
                                        $('#signupbox').show()">
                                    สมัคร
                                </a>
                            </div>
                        </div>
                    </div>    
                </form>    
            </div>                     
        </div>  
    </div>
    
    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">สมัครสมาชิก</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide();
                        $('#loginbox').show();$('#forgotbox').hide();">เข้าระบบ</a></div>
            </div>  
            <div class="panel-body" >
                <form id="register-form" class="form-horizontal" role="form">

                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="rg_username" class="col-md-3 control-label">ชื่อผู้ใช้งาน</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="rg_username" placeholder="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rg_email" class="col-md-3 control-label">อีเมลล์</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="rg_email" id="rg_email" placeholder="name@gmail.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rg_password" class="col-md-3 control-label">รหัสผ่าน</label>
                        <div class="col-md-9">
                            <input type="password" id="rg_password" class="form-control" name="rg_password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rg_password_confrim" class="col-md-3 control-label">ยืนยันรหัสผ่าน</label>
                        <div class="col-md-9">
                            <input type="password" name="rg_password_confrim" id="rg_password_confrim" placeholder="Password" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->                                        
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" id="btn_forgot" class="btn btn-primary"/>
                            <input type="reset" class="btn btn-danger">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    
    <div id="forgotbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">ลืมรหัสผ่าน</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
            </div>     
             <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal" role="form">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="forgot_ad_email" type="email" class="form-control" name="forgot_ad_email" value="" placeholder="username@gmail.com">                                        
                    </div>
                     <div style="margin-top:10px" class="form-group">
                                    <div class="col-sm-12 controls">
                                      <a id="btn-login" href="#" class="btn btn-success">ส่งคำขอ</a>
                                    </div>
                     </div>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                กลับ! 
                                <a href="#" onClick="$('#loginbox').show();
                                        $('#signupbox').hide();
                                        $('#forgotbox').hide();">
                                    เข้าระบบ
                                </a>
                            </div>
                        </div>
                    </div>    
                </form>     



            </div>  
        </div>  
    </div>
</div>

