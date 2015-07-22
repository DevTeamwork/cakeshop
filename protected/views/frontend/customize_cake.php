<style type="text/css">
    #panel-left {
        width: 50%;
        float: left;
    }

    #panel-right {
        width: 50%;
        float:right;
        padding-left: 5px;
    }

    img {
        cursor: pointer;
    }

    #select-cake tr td {
        text-align: center;
        padding: 20px;
    }
    .cycle-yely{
    }
    .c360{
        left: 499px;
        top: 409px;
        position: absolute;
    }
    .c45{
        left: 472px;
        top: 330px;
        position: absolute;

    }
    .c90{
        left: 369px;
        top: 300px;
        position: absolute;
    }
    .c135{
        left: 275px;
        top: 340px;
        position: absolute;
    }
    .c180{
        left: 255px;
        top: 409px;
        position: absolute;
    }
    .c225{
        left: 290px;
        top: 490px;
        position: absolute;
    }
    .c270{
        left: 365px;
        top: 520px;
        position: absolute;
    }
    .c315{
        left: 455px;
        top: 489px;
        position: absolute;
    }
    /* block 2 */
    .c1360{
        left: 490px;
        top: 452px;
        position: absolute;
    }
    .c145{
        left: 492px;
        top: 368px;
        position: absolute;

    }
    .c190{
        left: 424px;
        top: 300px; 
        position: absolute;
    }
    .c1135{
        left: 315px;
        top: 310px;
        position: absolute;
    }
    .c1180{
        left: 255px;
        top: 370px;
        position: absolute;
    }
    .c1225{
        left: 265px;
        top: 450px;
        position: absolute;
    }
    .c1270{
        left: 320px;
        top: 510px;
        position: absolute;
    }
    .c1315{
        left: 415px;
        top: 509px;
        position: absolute;
    }
    
    /* block 3 */
    .c2360{
        left: 425px;
        top: 442px;
        position: absolute;
    }
    .c245{
        left: 432px;
        top: 388px;
        position: absolute;

    }
    .c290{
        left: 384px;
        top: 360px; 
        position: absolute;
    }
    .c2135{
        left: 335px;
        top: 380px;
        position: absolute;
    }
    .c2180{
        left: 325px;
        top: 425px;
        position: absolute;
    }
    .c2225{
        left: 365px;
        top: 460px;
        position: absolute;
    }
    
</style>
<script type="text/javascript">


    $(function () {
        var timeStr = parseInt($('#time').val());
        var date = new Date();
        var today = date.getFullYear() + "-" + ((date.getMonth().toString().length == 1 ? '0' : '') + (parseInt(date.getMonth()) + 1)) + "-" +date.getDate();
        var array = [today];
        for (var i = 0; i < timeStr; i++) {
            var today1 = date.getFullYear() + "-" + ((date.getMonth().toString().length == 1 ? '0' : '') + (parseInt(date.getMonth()) + 1)) + "-" + (date.getDate() + (i + 1));
            array.push(today1);
        }
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            beforeShowDay: function(date){
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                return [ array.indexOf(string) == -1 ]
            }
        });

        //set initial state.
//        $('#textbox1').val($(this).is(':checked'));

        $('.yely').hide();
        $('.orange').hide();
        $('.bery').hide();

//        $('#checkbox1').change(function() {
//            if($(this).is(":checked")) {
////                var returnVal = confirm("Are you sure?");
//                $('.yely').show();
//                $(this).attr("checked", returnVal);
//            }else{
//                 $('.yely').hide()();
//            }    
//        });

        $('input[type=checkbox]').each(function() {
           var id = $(this).attr('id');
           var no = id.split('-')[1];
           var className = '.yely';
            if (parseInt(no) == 2) {
                className = '.orange';
            } else if (parseInt(no) == 3) {
                className = '.bery';
            }
            
            
            
            
                
           $(this).change(function() {
            if($(this).is(":checked")) {
                
                var returnVal = confirm("Are you sure?");
                $(className).show();
                $(this).attr("checked", returnVal);
                var toppingArr = document.getElementById('topping_id_arr').value;
                if (toppingArr.length == 0) {
                    toppingArr = id.split('-')[0];
                } else {
                    toppingArr += "," + id.split('-')[0];
                }
                document.getElementById('topping_id_arr').value = toppingArr;
            }else{
                $(className).hide();
                var toppingArr = document.getElementById('topping_id_arr').value;
                if (toppingArr.length == 0) {
                    toppingArr = '';
                } else {
                    var topTemp = toppingArr.split(",");
                    var indexSearch = topTemp.indexOf(id.split('-')[0]);
                    if (indexSearch > -1) {
                        topTemp.splice(indexSearch, 1); 
                    }
                }
                document.getElementById('topping_id_arr').value = topTemp.toString();
            }    
        });
        
        });

    });

    function changeCake(url) {
        $('#main-cake').attr('src', url);
    }

    function redirectToCart() {
        var greeting = $('#greeting_text').val();
        var send_date = $('#datepicker').val();
        var topping_id = $('#topping_id_arr').val();
        window.location.href = 'index.php?r=Cart/addToCart&product_id=<?php echo $product['product_id']; ?>&greeting=' + greeting + '&send_date=' + send_date + '&topping_id=' + topping_id;
    }

    function drawImage(id, src) {
        var rowCount = parseInt(document.getElementById('row_count').value);
        var countItem = parseInt(document.getElementById('count_item').value);
        if (rowCount < 4 && countItem <= 8) {

            if (countItem == 0) {
                countItem = 1;
            } else {
                countItem += 1;
            }
            document.getElementById('count_item').value = countItem;
            var mainCake = document.getElementById('main-cake');
            var rowCount = parseInt(document.getElementById('row_count').value);
            var left = parseInt(document.getElementById('item_left').value);
            var top = parseInt(document.getElementById('item_top').value);

            if (countItem == 1) {
                left = (mainCake.offsetLeft + 60);
                top = (mainCake.offsetTop + 70);

            } else if (countItem > 1 && countItem <= 8) {
                left += 30;
                if (rowCount == 3 && countItem == 8) {
                    document.getElementById('row_count').value = 4;
                }
            } else {

                rowCount += 1;
                top += 50;
                left = (mainCake.offsetLeft + 60);
                document.getElementById('count_item').value = 1;
                document.getElementById('row_count').value = rowCount;


            }
            document.getElementById('item_left').value = left;
            document.getElementById('item_top').value = top;

            var image = $('<img src="' + src + '" width="30px">').get(0);
            image.style.left = left + 'px';
            image.style.top = top + 'px';
            image.style.position = "absolute";
            document.getElementById('panel-left').appendChild(image);

            var toppingArr = document.getElementById('topping_id_arr').value;
            if (toppingArr.length == 0) {
                toppingArr = id;
            } else {
                toppingArr += "," + id;
            }
            document.getElementById('topping_id_arr').value = toppingArr;

        }
    }


</script>
<input type="hidden" id="row_count" value="1">
<input type="hidden" id="item_top">
<input type="hidden" id="item_left">
<input type="hidden" id="count_item" value="0">
<input id="topping_id_arr" type="hidden" name="topping_id" >
<div class="biseller-info">
    <div class="container">
        <h1>ปรับแต่งหน้าเค้ก</h1>

        <div id="panel-left" style="text-align: center;">
             <!--<canvas id="myCanvas" width="350" height="300"style="border:1px solid #d3d3d3;">-->
            <img id="main-cake" src="/cakeshop/images/products/fruit_burned.png" width="350">
            <!--</canvas>-->
            <div class="biseller-name" style="margin-top: 10px;">
                <h4><?php echo $product['name']; ?></h4>
                <p>ราคา <?php echo $product['price']; ?> บาท</p>
                <a href="javascript:redirectToCart()">
                    <button class="add2cart">
                        <span>| หยิบใส่ตะกร้า</span>
                    </button>
                </a>
                <input type="hidden" id="time" value="<?php echo $product['time']; ?>">
            </div>
            <div class="yely">
               <img class="c360" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c45" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c90" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c135" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c180" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c225" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c270" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c315" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px" >
               
               
            </div>
            
            <div class="orange">
               <img class="c1360" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c145" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c190" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c1135" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c1180" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c1225" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c1270" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c1315" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px" >
            </div>
            
            <div class="bery">
                <img class="c2360" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c245" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c290" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c2135" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c2180" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
               <img class="c2225" src="<?php echo Yii::app()->request->baseUrl; ?>/images/toppings/download_burned.png" width="30px">
            </div>

        </div>

        <div id="panel-right">
            
            <table id="select-cake">
                <?php $i = 1; ?>
                <tr>
                    <?php foreach ($toppings as $topping) : ?>
                        <td>
                            <div><img onclick="drawImage(this.id, this.src)" id="<?php echo $topping['toping_id']; ?>" src="<?php echo Yii::app()->request->baseUrl . $topping['toping_url']; ?>" 
                                      width="60px" ></div>
                            <div style="font-size: 14px;"><?php echo $topping['toping_name']; ?></div>
                            <div><input id="<?php echo $topping['toping_id']; ?>-<?php echo $i; ?>" type="checkbox" value="<?php echo $topping['toping_id']; ?>"></div>
                        </td>
                        <?php if ($i % 4 == 0) : ?>
                        </tr><tr>
                            <?php 
                        endif;$i++; ?>
                            

<?php endforeach; ?>
                </tr>

<!--                <tr>
    <td><img onclick="changeCake(this.src)" src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/cake/c5.jpg" width="100px"></td>
    <td><img onclick="changeCake(this.src)" src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/cake/c1.jpg" width="100px"></td>
    <td></td>
    <td></td>
</tr>-->
            </table>
            <div class="contact-form">
                <h4>คำอวยพร</h4>
                <textarea id="greeting_text"></textarea>
            </div>

            <div>วันที่ส่งสินค้า</div>
            <div id="datepicker"></div>
        </div>

    </div>
</div>
