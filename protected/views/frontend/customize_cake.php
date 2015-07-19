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
</style>
<script type="text/javascript">
    $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        
        
        
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
            
            var image = $('<img src="'+src+'" width="30px">').get(0);
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
            <img id="main-cake" src="<?php echo $product['photo_emty']; ?>" width="350" />
            <!--</canvas>-->
            <div class="biseller-name" style="margin-top: 10px;">
                <h4><?php echo $product['name']; ?></h4>
                <p>ราคา <?php echo $product['price']; ?> บาท</p>
                <a href="javascript:redirectToCart()">
                    <button class="add2cart">
                        <span>| หยิบใส่ตะกร้า</span>
                    </button>
                </a>
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
                    </td>
                    <?php if ($i % 4 == 0) : ?>
                    </tr><tr>
                    <?php $i++; endif; ?>
                
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
