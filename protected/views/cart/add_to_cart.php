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
</style>
<div class="biseller-info">
    <div class="container">
        <h2>ตะกร้าสินค้า</h2>

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

    </div>
</div>
