/* 
 * register
 * login
 * create website
 * edit website
 */

function createWebsite(data) {
    $.ajax({
        url: 'index.php?r=Websites/WebsiteInsert',
        type: 'POST',
        data: data,
        success: function(data) {
//            alert(data);
            if (data == '1') {
                alert("บันทึกแล้ว");
                location.href = "index.php?r=websites/All";
            } else {
                alert(data);
            }
        }
    });

    return false;
}
function websiteDelete(id,name,row) {

//    alert('deleteSite : '+data['website_id']);
    if (confirm("ต้องการลบ "+name+" หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Websites/Delete'
            , data: {
                id: id
            }
            , success: function(data) {
                if (data = '1') {
//                    alert("ลบแล้ว");
                    row.remove();
//                    location.reload();
                } else {
                    alert("พิดพลาด");
                }
            }
        });
    }
    return false;
}


function register(data) {
//       console.log("data : "+data);
//        alert('Register');
    $.ajax({
        url: 'index.php?r=WebSites/Register',
        data: data,
        type: "POST",
        success: function(data) {
            if (data == '1') {
                alert("สมัครสมาชิกสำเร็จ..");
                $('#signupbox').hide();
                $('#loginbox').show();
                $('#forgotbox').hide();
            }
        }
    });
}

function mainpageLayout() {
    $.ajax({
        url: 'index.php?r=WebSites/MainPageLayout',
        success: function(data) {
            $('#page').html(data);
        }
    });
}
function UsersListLayout(id) {
//    alert(id);
    $.ajax({
        url: 'index.php?r=WebSites/UsersListLayout',
        data: {
            id: id
        },
        success: function(data) {
            $('#page').html(data);
        }
    });
}

function portfolioSave(data) {
    $.ajax({
        url: 'index.php?r=Manager/PortfolioInsert',
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

function portfolioDelate(id) {
    if (confirm("ต้องการลบ " + id + " หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Manager/PortfolioDelete&id=' + id
            , data: {
                id: id
            }
            , success: function(data) {
                if (data == 'success') {
                    location.reload();
                } else {
                    alert("ผิดพลาด");
                }

            }
        });
    }
}
function newsDelete(id) {
    if (confirm("ต้องการลบ " + id + " หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Manager/NewsDelete&id=' + id
            , data: {
                id: id
            }
            , success: function(data) {
                if (data == 'success') {
                    location.reload();
                } else {
                    alert("ผิดพลาด");
                }

            }
        });
    }
}

function knowledgeDelete(id) {
    if (confirm("ต้องการลบ " + id + " หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Manager/KnowledgeDelete&id=' + id
            , data: {
                id: id
            }
            , success: function(data) {
                if (data == 'success') {
                    location.reload();
                } else {
                    alert("ผิดพลาด");
                }

            }
        });
    }
}



