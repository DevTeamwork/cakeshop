
function register(data,website_id){
//       console.log("data : "+data.rg_websiteid);
    $.ajax({
        url: 'index.php?r=Sites/Register',
        data: data,
        type: "POST",
        success: function(data) {
            
            if(data == '1'){
                alert("สมัครสมาชิกเรียบร้อย...ให้ล็อกด้วย ชื่อผู้ใช้ และ รหัสผ่าน ทีสมัคร");
                window.location.href = "index.php?r=Sites/Index&id="+website_id;
            }
        }
    });
}

function adduser(data,website_id){
//       console.log("data : "+data.rg_websiteid);
    $.ajax({
        url: 'index.php?r=Sites/Register',
        data: data,
        type: "POST",
        success: function(data) {
            
            if(data == '1'){
                alert("เพิ่มสมาชิกใหม่เรียบร้อย");
                window.location.href = "index.php?r=Sites/Users&id="+website_id;
            }
        }
    });
}

function login(data,website_id) {
//   console.log("data : "+data);
//    var website_id = $('#website_id').val();
    $.ajax({
        url: 'index.php?r=sites/Login',
        data: data,
        type: "POST",
        success: function(data) {
            console.log(data);
            if (data == 'n') {
               alert("กรุณาตรวจสอบ ชื่อผู้ใช้ กับ รหัสผ่าน ให้ถูกต้อง");
            } else { 
                var arr = data.split(" ");
                var is_admin = arr[0];
                var userid = arr[1];
                var active = arr[2];
//                console.log(is_admin);
//                console.log(userid);
                if (is_admin == '1' || active == 'y') {
                    location.href = "index.php?r=Sites/Index&id=" + website_id;
                } else {
                    location.href = "index.php?r=Sites/UserProfileEdit&id=" + userid;
                }
                
            }
        }
    });
}

//logout
function logout(){
    $.ajax({
        url: 'index.php?r=Sites/Logout',
        success: function(data) {
//            alert(data);
            location.href = "index.php?r=Sites/Index&id="+data;
        }
    });
}

function userProfileUpdate(data){
//    console.log("data : "+data);
    $.ajax({
        url: 'index.php?r=Sites/UserProfileUpdate',
        data: data,
        type: "POST",
        success: function(data) {
//            alert(data);
            if(data == '1'){
                alert("บันทึกข้อมูลส่วนตัวเรียบร้อย.")
                window.location.reload();
            }
        }
    });
}

//NewsInsert
function newsSave(data) {
    $.ajax({
        url: 'index.php?r=Sites/NewsInsert',
        data: data,
        type: "POST",
        success: function(data) {
//            alert(data);
            if (data == '1') {
                alert("เพิ่มข่าวใหม่ เรียบร้อย");
//                location.reload();
            } else {
                alert("ผิดพลาด");
            }
        }
    });
}
//
function khowledgeInsert(data) {
//    console.log(data);
    $.ajax({
        url: 'index.php?r=Sites/KhowledgeInsert',
        data: data,
        type: "POST",
        success: function(data) {
            alert(data);
            if (data == '1') {
                alert("สำเร็จ");
            } else {
                alert("ผิดพลาด");
            }
        }
    });
}

function newsDelete(id,name,row) {

//    alert('deleteSite : '+data['website_id']);
    if (confirm("ต้องการลบ "+name+" หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Sites/NewsDelete'
            , data: {
                id: id
            }
            , success: function(data) {
                if (data = '1') {
//                    alert("ลบแล้ว");
                row.fadeOut(100,function(){
                            row.remove();
                        });
//                    row.remove();
//                    location.reload();
                } else {
                    alert("พิดพลาด");
                }
            }
        });
    }
    return false;
}

//knowledgeDelete
function knowledgeDelete(id,name,row) {

//    alert('deleteSite : '+data['website_id']);
    if (confirm("ต้องการลบ "+name+" หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Sites/KnowledgeDelete'
            , data: {
                id: id
            }
            , success: function(data) {
                if (data = '1') {
//                    alert("ลบแล้ว");
                row.fadeOut(100,function(){
                            row.remove();
                        });
//                    row.remove();
//                    location.reload();
                } else {
                    alert("พิดพลาด");
                }
            }
        });
    }
    return false;
}

function portfolioSave(data) {
    $.ajax({
        url: 'index.php?r=Sites/PortfolioInsert',
        data: data,
        type: "POST",
        success: function(data) {
            
            if (data == 'success') {
                alert("สำเร็จ");
            } else {
                alert("ผิดพลาด");
            }
        }
    });
}

function portfolioDelete(id,name,row) {

//    alert('deleteSite : '+data['website_id']);
    if (confirm("ต้องการลบ "+name+" หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Sites/PortfolioDelete'
            , data: {
                id: id
            }
            , success: function(data) {
                if (data = '1') {
//                    alert("ลบแล้ว");
                row.fadeOut(100,function(){
                            row.remove();
                        });
//                    row.remove();
//                    location.reload();
                } else {
                    alert("พิดพลาด");
                }
            }
        });
    }
    return false;
}
function userDelete(id,name,row) {

//    alert('deleteSite : '+data['website_id']);
    if (confirm("ต้องการลบ "+name+" หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Sites/UserDelete'
            , data: {
                id: id
            }
            , success: function(data) {
                if (data = '1') {
//                    alert("ลบแล้ว");
                row.fadeOut(100,function(){
                            row.remove();
                        });
//                    row.remove();
//                    location.reload();
                } else {
                    alert("พิดพลาด");
                }
            }
        });
    }
    return false;
}

//publishedSave
function publishedSave(data) {
    $.ajax({
        url: 'index.php?r=Sites/PublishedInsert',
        data: data,
        type: "POST",
        success: function(data) {
//            alert(data);
            if (data == '1') {
                alert("เพิ่มข่าวใหม่ เรียบร้อย");
//                location.reload();
            } else {
                alert("ผิดพลาด");
            }
        }
    });
}

//pubishedDelete
function pubishedDelete(id,name,row) {

//    alert('deleteSite : '+data['website_id']);
    if (confirm("ต้องการลบ "+name+" หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Sites/PubishedDelete'
            , data: {
                id: id
            }
            , success: function(data) {
                if (data = '1') {
//                    alert("ลบแล้ว");
                row.fadeOut(100,function(){
                            row.remove();
                        });
//                    row.remove();
//                    location.reload();
                } else {
                    alert("พิดพลาด");
                }
            }
        });
    }
    return false;
}

//webboardSave
function webboardSave(data) {
    $.ajax({
        url: 'index.php?r=Sites/WebboardInsert',
        data: data,
        type: "POST",
        success: function(data) {
//            alert(data);
            if (data == '1') {
                alert("สำเร็จ");
//                location.reload();
                  location.href = "index.php?r=Sites/Webboards&id="+$("#website_id").val();
            } else {
                alert("ผิดพลาด");
            }
        }
    });
}

function webboardDelete(id,name,row) {

//    alert('deleteSite : '+data['website_id']);
    if (confirm("ต้องการลบ "+name+" หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Sites/WebboardDelete'
            , data: {
                id: id
            }
            , success: function(data) {
                if (data = '1') {
//                    alert("ลบแล้ว");
                row.fadeOut(100,function(){
                            row.remove();
                        });
//                    row.remove();
//                    location.reload();
                } else {
                    alert("พิดพลาด");
                }
            }
        });
    }
    return false;
}

//replySave
function replySave(data) {
    alert(data);
    $.ajax({
        url: 'index.php?r=Sites/ReplyInsert',
        data: data,
        type: "POST",
        success: function(data) {
            return data;
        }
    });
}

//galleryDelete
function galleryDelete(id,name,row) {

//    alert('deleteSite : '+data['website_id']);
    if (confirm("ต้องการลบ "+name+" หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Sites/GalleryDelete'
            , data: {
                id: id
            }
            , success: function(data) {
                if (data = '1') {
//                    alert("ลบแล้ว");
                row.fadeOut(100,function(){
                            row.remove();
                        });
//                    row.remove();
//                    location.reload();
                } else {
                    alert("พิดพลาด");
                }
            }
        });
    }
    return false;
}

function contactAdminUpdate(data){
    //ContactAdminUpdate
//    alert(data);
    $.ajax({
        url: 'index.php?r=Sites/ContactAdminUpdate',
        data: data,
        type: "POST",
        success: function(data) {
//            alert(data);
            if (data == '1') {
                alert("บันทึกข้อมูลติดต่อผู้ดูแลระบบ เรียบร้อย");
            } else {
                alert("ผิดพลาด");
            }
        }
    });
}






