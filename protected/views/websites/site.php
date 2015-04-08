<?php ?>
<script>
    $(function() {
        $('#menuAdmin').hide();
        $('#menuProfileUser').hide();
        
        $('#menuLoginUser').click(function() {
            $('#modalLogin').modal('show');
        });

        $('#menuSigupUser').click(function() {
            $('#modalSigup').modal('show');
        });

//form validation rules
        $("#register-form").validate({
            rules: {
                username: "required",
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirmpassword: {
                    EqualTo: "#password"
                }
            },
            messages: {
                username: "กรุณากรอก ชื่อผู้ใช้",
                password: {
                    required: "กรุณากรอก รหัสผ่าน",
                    minlength: "กรอกรหัสผ่านอย่างน้อย 6 ตัว"
                },
                confirmpassword: " รหัสผ่านไม่ตรงกัน",
                email: "กรุณากรอกอีเมลล์ให้ถูกต้อง ตัวอย่าง username@gmail.com"
            },
            submitHandler: function(form) {
//                form.submit();
                alert('บันทึกเสร็จแล้ว');
            }
        });


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
//                alert("login summit");;
                login();
            }
        });

    });
</script>
<style>
    .sb-page-header {
        background-color: #3499A7;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-3">                     
        </div>        
        <div class="col-md-6" id="pagewrapper">
        </div>
        <div class="col-md-3" >
        </div>
    </div>
</div>

<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">ปิด</span></button>
                <h4 class="modal-title" id="myModalLabel">ล็อกอิน</h4>
            </div>
            <div class="modal-body">
                <form id="login-form" action="#">
                    <input type="hidden" id="website_id" name="website_id" value="<?php echo $model->website_id ?>">                     
                    <div class="form-group">
                        <label for="ln_username"><span style="color:red;">*</span> ชื่อผู้ใช้</label>
                        <input type="text" name="ln_username" placeholder="username" class="required form-control">
                    </div>
                    <div class="form-group">
                        <label for="ln_password"><span style="color:red;">*</span> รหัสผ่าน</label>
                        <input type="password" name="ln_password" placeholder="password" class="required form-control">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> ปิด</button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-user icon-white"></i> ตกลง
                </button>
            </div>
            </form>  
        </div>
    </div>
</div>

<div class="modal fade" id="modalSigup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">ปิด</span></button>
                <h4 class="modal-title" id="myModalLabel">สมัครสมาชิก</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="register-form" novalidate="novalidate">
                    <div id="form-content">
                        <input type="hidden" id="website_id" name="website_id" value="<?php echo $model->website_id ?>"> 
                        <div class="form-group">
                            <label for="username"><span style="color:red;">*</span> ชื่อผู้ใช้</label>
                            <input type="text" name="username" placeholder="username" class="required form-control">
                        </div>

                        <div class="form-group">
                            <label for="email"><span style="color:red;">*</span> อีเมลล์</label>
                            <input type="text" name="email" placeholder="user@gmail.com" class="required form-control">
                        </div>

                        <div class="form-group">
                            <label for="password"><span style="color:red;">*</span> รหัสผ่าน</label>
                            <input type="password" name="password" placeholder="password" class="required form-control">
                        </div>

                        <div class="form-group">
                            <label for="confirmpassword"><span style="color:red;">*</span> รหัสผ่านอีกครั้ง</label>
                            <input type="password" name="confirmpassword" placeholder="password" class="required form-control">
                        </div>


                        <div class="form-group">
                            <p>ถ้าเป็นสมาชิกแล้ว<a href="#">Sign in</a>.</p>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> ปิด</button>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-user icon-white"></i> ตกลง
                </button>
            </div>
            </form>

        </div>
    </div>
</div>

<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tabLogin" data-toggle="tab">ล็อกอิน</a></li>
                    <li><a href="#tabSigup" data-toggle="tab">สมัครสมาชิก</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tabLogin">
                        <form id="form" action="#">
                            <input type="hidden" id="website_id" name="website_id" value="<?php echo $website->website_id ?>">                      
                            <div class="form-group">
                                <label><span style="color:red;">*</span> ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control required" placeholder="usernmae" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label><span style="color:red;">*</span> รหัสผ่าน</label>  
                                <input type="password" class="form-control" placeholder="123456" id="password" name="password">
                            </div>   

                            <a type="submit" class="btn btn-outline btn-primary" href="#">
                                <i class="glyphicon glyphicon-ok"></i> ตกลง</a>
                        </form>    
                    </div>

                    <div class="tab-pane fade" id="tabSigup">
                        <form id="forgot-password-form" action="#">

                            <div class="form-group">
                                <label><span style="color:red;">*</span> อีเมลล์</label>
                                <input type="email" id="rg-email" name="rg-email" placeholder="username@gmail.com" class="required form-control"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" href="#">
                                    <i class="glyphicon glyphicon-send"></i> ส่ง</button>
                            </div>                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->



