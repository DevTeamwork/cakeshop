<style type="text/css">
    .table-order {
        width:100%;
    }
    .table-order thead tr th, .table-order tbody tr td {
        border: 1px solid #ccc;
        padding: 5px;
    }
    
    .table-order thead tr th {
        background-color: #DF0174;
        color: #FFF;
        
    }
    
    .info {
        margin-top: 10px;
        background-color: #B7D6E7;
        padding: 5px;
        
    }
 </style>
    
<div class="biseller-info">
    <div class="container">
        
        <?php if(Yii::app()->user->hasFlash('success')):?>
            <div class="info">
                <?php echo Yii::app()->user->getFlash('success'); ?>
            </div>
        <?php endif; ?>
        
        <h1>แจ้งชำระเงิน</h1>
        <?php if (empty($message)) : ?>
        <div>รายการใบสั่งซื้อที่ค้างชำระ</div>
        <table class="table-order">
            <thead>
                <tr>
                    <th>รหัสใบสั่งซื้อ</th>
                    <th>ผู้ซื้อ</th>
                    <th>วันที่สั่งซื้อ</th>
                    <th>จำนวนเงิน</th>
                    <th>ชำระเงิน</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($orders) > 0) : ?>
                <?php foreach($orders as $order) : ?>
                <tr>
                    <td style="text-align: center;"><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['firstname'] . " " . $order['lastname']; ?></td>
                    <td style="text-align: center;"><?php echo $order['order_date']; ?></td>
                    <td style="text-align: right;"><?php echo number_format($order['price'], 2); ?></td>
                    <td style="text-align: center;"><a style="color: #0066cc;" href="index.php?r=frontend/paymentForm&order_id=<?php echo $order['order_id']; ?>">ชำระเงิน</a></td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="5" style="text-align: center; color: red;">ไม่มีรายการใบสั่งซื้อ</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
        <?php else : ?>
        <center><?php echo $message; ?></center>
        <?php endif; ?>
        
    </div>
</div>

