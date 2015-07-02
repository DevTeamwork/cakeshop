<style>
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
	-moz-box-shadow:inset 0px 1px 0px 0px #caefab;
	-webkit-box-shadow:inset 0px 1px 0px 0px #caefab;
	box-shadow:inset 0px 1px 0px 0px #caefab;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77d42a), color-stop(1, #5cb811));
	background:-moz-linear-gradient(top, #77d42a 5%, #5cb811 100%);
	background:-webkit-linear-gradient(top, #77d42a 5%, #5cb811 100%);
	background:-o-linear-gradient(top, #77d42a 5%, #5cb811 100%);
	background:-ms-linear-gradient(top, #77d42a 5%, #5cb811 100%);
	background:linear-gradient(to bottom, #77d42a 5%, #5cb811 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77d42a', endColorstr='#5cb811',GradientType=0);
	background-color:#77d42a;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #268a16;
	display:inline-block;
	cursor:pointer;
	color:#306108;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:10px 16px;
	text-decoration:none;
	text-shadow:0px 1px 0px #aade7c;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #5cb811), color-stop(1, #77d42a));
	background:-moz-linear-gradient(top, #5cb811 5%, #77d42a 100%);
	background:-webkit-linear-gradient(top, #5cb811 5%, #77d42a 100%);
	background:-o-linear-gradient(top, #5cb811 5%, #77d42a 100%);
	background:-ms-linear-gradient(top, #5cb811 5%, #77d42a 100%);
	background:linear-gradient(to bottom, #5cb811 5%, #77d42a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5cb811', endColorstr='#77d42a',GradientType=0);
	background-color:#5cb811;
}
.myButton:active {
	position:relative;
	top:1px;
}


.btnBuy {
	-moz-box-shadow:inset 0px 1px 0px 0px #bee2f9;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bee2f9;
	box-shadow:inset 0px 1px 0px 0px #bee2f9;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #63b8ee), color-stop(1, #468ccf));
	background:-moz-linear-gradient(top, #63b8ee 5%, #468ccf 100%);
	background:-webkit-linear-gradient(top, #63b8ee 5%, #468ccf 100%);
	background:-o-linear-gradient(top, #63b8ee 5%, #468ccf 100%);
	background:-ms-linear-gradient(top, #63b8ee 5%, #468ccf 100%);
	background:linear-gradient(to bottom, #63b8ee 5%, #468ccf 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#63b8ee', endColorstr='#468ccf',GradientType=0);
	background-color:#63b8ee;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #3866a3;
	display:inline-block;
	cursor:pointer;
	color:#14396a;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:10px 13px;
	text-decoration:none;
	text-shadow:0px 1px 0px #7cacde;
}
.btnBuy:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #468ccf), color-stop(1, #63b8ee));
	background:-moz-linear-gradient(top, #468ccf 5%, #63b8ee 100%);
	background:-webkit-linear-gradient(top, #468ccf 5%, #63b8ee 100%);
	background:-o-linear-gradient(top, #468ccf 5%, #63b8ee 100%);
	background:-ms-linear-gradient(top, #468ccf 5%, #63b8ee 100%);
	background:linear-gradient(to bottom, #468ccf 5%, #63b8ee 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#468ccf', endColorstr='#63b8ee',GradientType=0);
	background-color:#468ccf;
}
.btnBuy:active {
	position:relative;
	top:1px;
}


.btnCalculate {
	-moz-box-shadow:inset 0px 1px 0px 0px #fff6af;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fff6af;
	box-shadow:inset 0px 1px 0px 0px #fff6af;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffec64), color-stop(1, #ffab23));
	background:-moz-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-webkit-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-o-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-ms-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffec64', endColorstr='#ffab23',GradientType=0);
	background-color:#ffec64;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #ffaa22;
	display:inline-block;
	cursor:pointer;
	color:#333333;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:10px 17px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffee66;
}
.btnCalculate:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffab23), color-stop(1, #ffec64));
	background:-moz-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:-webkit-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:-o-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:-ms-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffab23', endColorstr='#ffec64',GradientType=0);
	background-color:#ffab23;
}
.btnCalculate:active {
	position:relative;
	top:1px;
}



</style>
<div class="biseller-info">
    <div class="container">
        <h2>ตะกร้าสินค้า</h2>
        <form method="post" action="index.php?r=cart/calculateItem">
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
                        <td style="text-align: center;">
                            <input type="text" name="qty[]" style="width: 50px; text-align: center;"
                                   value="<?php echo $my_cart[$i]['product_qty']; ?>">
                        </td>
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
        
        <div align="center">
            <input type="button" class="myButton" onclick="window.location.href='index.php?r=frontend/products';" value="เลือกซื้อสินค้าต่อ">
            <?php if (count($my_cart) > 0) : ?>
                <button type="submit" class="btnCalculate">คำนวนใหม่</button>
                <?php if(!empty(Yii::app()->session["user_id"])) : ?>
                <input type="button" class="btnBuy" onclick="window.location.href='index.php?r=cart/showOrderCart';" value="ยืนยันการสั่งซื้อ">
                <?php else : ?>
                กรุณา <a style="color: #468ccf;" href="index.php?r=frontend/login">เข้าสู่ระบบ</a> ก่อนการสั่งซื้อสินค้า
                <?php endif; ?>
            <?php endif; ?>
        </div>
       
        </form>
    </div>
</div>
