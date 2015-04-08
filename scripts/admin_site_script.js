/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var content_layout = $("#content");
$(function () {
    //click product
    $("#products").on("click", function () {
        console.log("produc");
        $.ajax({
            url: 'index.php?r=Products/index',
            type: "GET",
            success: function (data) {
                $("#content").html(data);
            }
        });
    });
    $("#product_add").on("click", function () {
        console.log("produc");
        $.ajax({
            url: 'index.php?r=Products/add',
            type: "GET",
            success: function (data) {
                $("#content").html(data);
            }
        });
    });
    $("#product_category").on("click", function () {
        console.log("product");
        $.ajax({
            url: 'index.php?r=Products/category',
            type: "GET",
            success: function (data) {
                $("#content").html(data);
            }
        });
    });
});




