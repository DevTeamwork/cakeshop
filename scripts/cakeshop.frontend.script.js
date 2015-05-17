/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function login(data) {
//    console.log(data);
    $.ajax({
        url: 'index.php?r=Frontend/CheckLogin',
        type: 'POST',
        data: data,
        success: function(data) {
//            console.log(data);
            var obj = jQuery.parseJSON(data);
//            console.log(obj);
            if (obj.rote == 'admin') {
//                alert("admin");
                window.location.href = "index.php?r=Site/index";
            } else {
                window.location.href = "index.php?r=Frontend/index";
//                alert("User");
            }
        }
    });

    return false;
}

