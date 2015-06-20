<style>
    .header-title {
        font-size: 22px;
        color: #330033;
        
    }
    
    .table-data {
        width: 100%;
        border-collapse: collapse;
    }
    
    .table-data tr th {
        text-align: center;
        font-weight: 700;
        padding: 5px;
        background: #00405d;
        color: #ffffff;
    }
    
    .table-data tr td {
        padding: 5px;
    }
    
    .total-price {
        margin-top: 20px;
        font-weight: 700;
        text-align: right;
        font-size: 18px;
        
    }
    
    .total-price .price {
        color: red;
        padding: 0 5px;
    }
    
    .myButton {
	-moz-box-shadow: 0px 0px 0px 2px #9fb4f2;
	-webkit-box-shadow: 0px 0px 0px 2px #9fb4f2;
	box-shadow: 0px 0px 0px 2px #9fb4f2;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #7892c2), color-stop(1, #476e9e));
	background:-moz-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:-webkit-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:-o-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:-ms-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:linear-gradient(to bottom, #7892c2 5%, #476e9e 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#7892c2', endColorstr='#476e9e',GradientType=0);
	background-color:#7892c2;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:23px;
	padding:15px 49px;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
        margin-top: 80px;
    }
    .myButton:hover {
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #476e9e), color-stop(1, #7892c2));
        background:-moz-linear-gradient(top, #476e9e 5%, #7892c2 100%);
        background:-webkit-linear-gradient(top, #476e9e 5%, #7892c2 100%);
        background:-o-linear-gradient(top, #476e9e 5%, #7892c2 100%);
        background:-ms-linear-gradient(top, #476e9e 5%, #7892c2 100%);
        background:linear-gradient(to bottom, #476e9e 5%, #7892c2 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#476e9e', endColorstr='#7892c2',GradientType=0);
        background-color:#476e9e;
    }
    .myButton:active {
            position:relative;
            top:1px;
    }
    
    .btnCart1 {
        margin-top: 10px;
	-moz-box-shadow:inset 0px 1px 0px 0px #fce2c1;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fce2c1;
	box-shadow:inset 0px 1px 0px 0px #fce2c1;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffc477), color-stop(1, #fb9e25));
	background:-moz-linear-gradient(top, #ffc477 5%, #fb9e25 100%);
	background:-webkit-linear-gradient(top, #ffc477 5%, #fb9e25 100%);
	background:-o-linear-gradient(top, #ffc477 5%, #fb9e25 100%);
	background:-ms-linear-gradient(top, #ffc477 5%, #fb9e25 100%);
	background:linear-gradient(to bottom, #ffc477 5%, #fb9e25 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffc477', endColorstr='#fb9e25',GradientType=0);
	background-color:#ffc477;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #eeb44f;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:23px;
	font-weight:bold;
	padding:15px 54px;
	text-decoration:none;
	text-shadow:0px 1px 0px #cc9f52;
    }
    .btnCart1:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fb9e25), color-stop(1, #ffc477));
	background:-moz-linear-gradient(top, #fb9e25 5%, #ffc477 100%);
	background:-webkit-linear-gradient(top, #fb9e25 5%, #ffc477 100%);
	background:-o-linear-gradient(top, #fb9e25 5%, #ffc477 100%);
	background:-ms-linear-gradient(top, #fb9e25 5%, #ffc477 100%);
	background:linear-gradient(to bottom, #fb9e25 5%, #ffc477 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fb9e25', endColorstr='#ffc477',GradientType=0);
	background-color:#fb9e25;
}
    .btnCart1:active {
	position:relative;
	top:1px;
    }


</style>
<div class="biseller-info">
    <div class="container">
        
        <form method="post" action="index.php?r=cart/saveOrder">
        <div class="col span_2_of_3">
            <div class="contact-form">
                <p class="header-title">ข้อมูลลูกค้า</p>
                <div>
                    <span><label>ชื่อ-นามสกุล</label></span>
                    <span><input name="customer_name" type="text" class="textbox" 
                                 value="<?php echo $customer->firstname ."&nbsp;" . $customer->lastname; ?>"></span>
                </div>

                 <div>
                    <span><label>เบอร์โทร</label></span>
                    <span><input name="customer_tel" type="text" class="textbox" value="<?php echo $customer->tel; ?>"></span>
                </div>

                <div>
                    <span><label>ที่อยู่</label></span>
                    <span><textarea name="customer_address"><?php echo $customer->address; ?></textarea></span>
                </div>
                <input type="hidden" name="customer_id" value="<?php echo $customer->user_id; ?>">
             </div>
        </div>

            <div class="col span_1_of_3" style="text-align: center;">
            <button type="submit" class="myButton">ยืนยันใบสั่งซื้อ</button>
            <input type="button" class="btnCart1" onclick="window.location.href='index.php?r=Cart/showCart';" value="ตะกร้าสินค้า">
        </div>
        </form>
        <div style="clear: both"></div>
        <table class="table-data" border="1">
            <thead>
                <tr>
                    <th style="width: 100px;">รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th style="width: 160px;">ราคา (บาท)</th>
                    <th>จำนวน</th>
                    <th style="width: 160px;">รวม (บาท)</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php $my_cart = Yii::app()->session['my_cart']; $total = 0; ?>
                <?php if (count($my_cart) > 0) : ?>
                <?php for ($i = 0; $i < count($my_cart); $i++) : ?>
                <?php $total += $my_cart[$i]['product_qty'] * $my_cart[$i]['product_price']; ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $my_cart[$i]['product_id']; ?></td>
                        <td><?php echo $my_cart[$i]['product_name']; ?></td>
                        <td style="text-align: center;"><?php echo $my_cart[$i]['product_price']; ?></td>
                        <td style="text-align: center;"><?php echo $my_cart[$i]['product_qty']; ?></td>
                        <td style="text-align: right;">
                            <?php echo number_format($my_cart[$i]['product_qty'] * $my_cart[$i]['product_price'], 2, ".", ","); ?>
                        </td>
                        <td style="text-align: center;">
                            <a href="index.php?r=cart/deleteCart&product_id=<?php echo $my_cart[$i]['product_id']; ?>">ลบ</a>
                        </td>
                    </tr>
                <?php endfor; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" style="text-align: center; font-weight: bold; color: red; padding: 20px;">
                            ไม่มีสินค้าในตะกร้า
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <div class="total-price">
            ราคารวม <span class="price"><?php echo number_format($total, 2, ".", ","); ?></span> บาท
        </div>

    </div>
</div>