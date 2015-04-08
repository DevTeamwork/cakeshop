$(function() {
//alert('save');
//    $("[rel='tooltip']").tooltip();

//    $('#side-menu').metisMenu();
//        alert($('#website_banner').val());
//        console.log('website_banner_path : '+$('#website_banner_path').val());
    if ($('#website_banner').val() != '') {
        $('#imageBanner').css("background", "url(" + $('#website_banner_path').val() + ")");
        $('#banner').css("background", "url(" + $('#website_banner_path').val() + ")");
    }
    if ($("#website_logo").val() != '') {
        $('#imageLogo').attr('src', $("#website_logo_path").val());
    }

    $('#site_name').text($('#website_name').val());
    $('#site_university').text($('#website_university').val());
    $('#site_id').val($('#website_id').val());

    if ($('#is_admin').val() == '1') {
//         console.log("is_admin : "+$('#is_admin').val()); 
//        $("#bannerUpload").css("display", "block");
//        $("#uploaderLogo").css("display", "block");
        $('.custom-file').show();
        $('.alert').show();

    } else {
//        $("#bannerUpload").css("display", "none"); 
//        $("#uploaderLogo").css("display", "none");
        $('.custom-file').hide();
        $('.alert').hide();
    }
    //website_logo"
    //website_banner

    var obj_login = {
        rules: {
            ln_username: "required",
            ln_password: "required"
        },
        messages: {
            ln_username: "กรุณากรอกชื่อผู้ใช้งาน",
            ln_password: "กรุณากรอกรหัสผ่าน"
        },
        submitHandler: function(form) {
            login($("#login-form").serialize(), $("#website_id").val());
        }
    };
//adduser-form
var obj_adduser = {
        rules: {
            rg_username: "required"
            , rg_email: {
                required: true,
                email: true,
                remote: "index.php?r=Sites/UniqueEmail"
            }
            , rg_password: {
                required: true,
                minlength: 6
            }
            , rg_password_confrim: {
                equalTo: "#rg_password"
            }

        },
        messages: {
            rg_username: "กรุณากรอกชื่อผู้ใช้งาน"
            , rg_email: {
                required: 'กรุณากรอกอีเมลล์',
                email: "กรุณากรอกอีเมลล์ให้ถูกต้อง ตัวอย่าง username@gmail.com",
                remote: 'อีเมลล์ถูกใช้งานแล้ว'
            }
            , rg_password: "กรอกรหัสผ่านอย่างน้อย 6 ตัว"
            , rg_password_confrim: "รหัสผ่านไม่ตรงกัน"
        },
        submitHandler: function(form) {
            adduser($('#adduser-form').serialize(), $('#rg_websiteid').val());
        }
    };
    

    var obj_resister = {
        rules: {
            rg_username: "required"
            , rg_email: {
                required: true,
                email: true,
                remote: "index.php?r=Sites/UniqueEmail"
            }
            , rg_password: {
                required: true,
                minlength: 6
            }
            , rg_password_confrim: {
                equalTo: "#rg_password"
            }

        },
        messages: {
            rg_username: "กรุณากรอกชื่อผู้ใช้งาน"
            , rg_email: {
                required: 'กรุณากรอกอีเมลล์',
                email: "กรุณากรอกอีเมลล์ให้ถูกต้อง ตัวอย่าง username@gmail.com",
                remote: 'อีเมลล์ถูกใช้งานแล้ว'
            }
            , rg_password: "กรอกรหัสผ่านอย่างน้อย 6 ตัว"
            , rg_password_confrim: "รหัสผ่านไม่ตรงกัน"
        },
        submitHandler: function(form) {
            register($('#register-form').serialize(), $('#rg_websiteid').val());
        }
    };


    var obj_userProfile = {
        rules: {
            firstname: "required",
            lastname: "required",
            address_contact: "required",
            student_no: "required",
            faculty: "required",
            department: "required",
            generation_no: "required",
            year_start: "required"
        },
        messages: {
            firstname: "กรุณากรอก ชื่อผู้ใช้งาน",
            lastname: "กรุณากรอก นามสกุล",
            address_contact: "กรุณากรอก ที่อยู่ติดต่อได้",
            student_no: "กรุณากรอก รหัสนักศึกษา",
            faculty: "กรุณากรอก คณะ",
            department: "กรุณากรอก สาขา",
            generation_no: "กรุณากรอก รุ่นที่จบ",
            year_start: "กรุณากรอก ปีที่จบ"
        },
        submitHandler: function(form) {
            userProfileUpdate($("#userinfo-form").serialize());
        }
    };

    var obj_portfolio = {
        rules: {
            title: "required",
            editor1: "required"
        },
        messages: {
            title: "กรุณากรอกชื่อผลงาน",
            editor1: "กรุณากรอกรายละเอียด"
        },
        submitHandler: function(form) {
            portfolioSave($("#portfolio-form").serialize());
        }
    };

    $('#portfolio-form').validate(obj_portfolio);

    $("#userinfo-form").validate(obj_userProfile);
    $('#login-form').validate(obj_login);
    $('#register-form').validate(obj_resister);
    $('#adduser-form').validate(obj_adduser);

}
);



