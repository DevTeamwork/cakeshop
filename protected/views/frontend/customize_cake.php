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
        padding: 10px;
    }
</style>
<script type="text/javascript">
    $(function() {
        
    });
    
    function changeCake(url) {
        $('#main-cake').attr('src', url);
    }
    
    function redirectToCart() {
        var greeting = $('#greeting_text').val();
        window.location.href = 'index.php?r=Cart/addToCart&product_id=<?php echo $product['product_id']; ?>&greeting=' + greeting;
    }
</script>
<div class="biseller-info">
    <div class="container">
        <h1>ปรับแต่งหน้าเค้ก</h1>
        
        <div id="panel-left" style="text-align: center;">
            <img id="main-cake" src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/11.jpg" width="350" />
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
            <table width="100%" id="select-cake">
                <tr>
                    <td><img onclick="changeCake(this.src)" src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/11.jpg" width="100px" /></td>
                    <td><img onclick="changeCake(this.src)" src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/cake/c2.jpg" width="100px"></td>
                    <td><img onclick="changeCake(this.src)" src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/cake/c3.jpg" width="100px"></td>
                    <td><img onclick="changeCake(this.src)" src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/cake/c4.jpg" width="100px"></td>
                </tr>
                <tr>
                    <td><img onclick="changeCake(this.src)" src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/cake/c5.jpg" width="100px"></td>
                    <td><img onclick="changeCake(this.src)" src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/cake/c1.jpg" width="100px"></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div class="contact-form">
                <h4>คำอวยพร</h4>
                <textarea id="greeting_text"></textarea>
            </div>
        </div>
        
    </div>
</div>
