<script>
$(function() {
//    alert("asdf");
        $('#form').validate({
            rules: {
                email: "required",
                password: "required",
            },
            messages: {
                email: "กรุณากรอก อีเมลล์",
                password: "กรุณากรอก รหัสผ่าน",
            },
            submitHandler: function (e) {
//                product_save($("#form").serialize());
//                alert("Login");
                login($("#form").serialize());
                
            }

        });
    });
</script>
<div class="content">
    <div class="container">
        <div class="login-page">
            <div class="account_grid">
                <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
                    <h3>NEW CUSTOMERS</h3>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                    <a class="acount-btn" href="index.php?r=frontend/Register">Create an Account</a>
                </div>
                <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
                    <h3>REGISTERED CUSTOMERS</h3>
                    <p>If you have an account with us, please log in.</p>
                    <form id="form">
                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="text" id="email" name="email"> 
                        </div>
                        <div>
                            <span>Password<label>*</label></span>
                            <input type="password" id="password" name="password"> 
                        </div>
                        <a class="forgot" href="#">Forgot Your Password?</a>
                        <input type="submit" value="Login">
                    </form>
<!--                <form role="form" id="form">
                    <div class="form-group">
                        <label>อีเมลล์</label>
                        <input class="form-control" id="email" name="email" placeholder="email">
                    </div>  
                    <div class="form-group">
                        <label>รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>-->
                </div>	
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>