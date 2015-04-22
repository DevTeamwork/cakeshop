/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function bank_save(data) {
//    console.log(data);
    $.ajax({
        url: 'index.php?r=Banks/Save',
        type: 'POST',
        data: data,
        success: function(data) {
            if (data == '1') {
                alert("บันทึกแล้ว");
                location.reload();
            } else {
                alert(data);
            }
        }
    });

    return false;
}

function bank_delete(id,name,row) {

//    alert('deleteSite : '+data['website_id']);
    if (confirm("ต้องการลบ "+name+" หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Banks/Delete'
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

function category_save(data) {
//    console.log(data);
    $.ajax({
        url: 'index.php?r=Products/CategorySave',
        type: 'POST',
        data: data,
        success: function(data) {
            if (data == '1') {
//                alert("บันทึกแล้ว");
                location.reload();
            } else {
                alert(data);
            }
        }
    });

    return false;
}

//
function category_delete(id,name,row) {

//    alert('deleteSite : '+data['website_id']);
    if (confirm("ต้องการลบ "+name+" หรือไม่?")) {
        $.ajax({
            url: 'index.php?r=Products/CategoryDelete'
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


