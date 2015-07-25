<style type="text/css">
    .table-form tr td {
        padding: 5px;
    }
    
    .table-form tr td:first-child {
        text-align: right;
    }
    
 </style>
 
 <script type="text/javascript">
     function checkForm() {
         
         if ($('#pay_price').val() == "") {
             alert("กรุณาใส่จำนวนเงิน");
             $('#pay_price').focus();
             return false;
         } else if ($('#slip_image').val() == "") {
             alert("กรุณาเลือกรูปสลิป");
             $('#slip_image').focus();
             return false;
         }
         return true;
     }
 </script>
    
<div class="biseller-info">
    <div class="container">

        <h1>ฟอร์มแจ้งชำระเงิน</h1>
        <form method="post" action="index.php?r=frontend/savePayment" enctype="multipart/form-data" onsubmit="return checkForm()">
            <table class="table-form" align="center">
                <tr>
                    <td>หมายเลขใบสั่งซื้อ :</td>
                    <td><input type="text" value="<?php echo $order['order_id']; ?>" disabled="disabled"></td>
                </tr>
                <tr>
                    <td>ชื่อ-นามสกุล :</td>
                    <td><input type="text" name="name" value="<?php echo $user['firstname'] . ' ' . $user['lastname']; ?>" size="50"></td>
                </tr>
               <tr>
                    <td>อีเมล์ :</td>
                    <td><input type="text" name="email" value="<?php echo $user['email']; ?>" size="50"></td>
                </tr>
               <tr>
                    <td>เบอร์โทรศัพท์ :</td>
                    <td><input type="text" name="tel" value="<?php echo $user['tel']; ?>" size="30"></td>
                </tr>
                <tr>
                    <td>ชำระเงินเข้าบัญชี :</td>
                    <td>
                        <select name="bank_id" style="width: 300px;">
                            <?php foreach ($banks as $bank) : ?>
                            <option value="<?php echo $bank['bank_id']; ?>"><?php echo $bank['bank_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ชำระเงินที่สาขา :</td>
                    <td><input type="text" name="bank_branch" value="" size="35"></td>
                </tr>
                <tr>
                    <td>จำนวนเงิน :<span style="color: red;">*</span></td>
                    <td><input type="text" id="pay_price" name="pay_price" value="" size="10"> บาท</td>
                </tr>
                <tr>
                    <td>วันที่ชำระเงิน  :</td>
                    <td><input type="text" name="pay_date" value="" size="20"></td>
                </tr>
                <tr>
                    <td>เวลาโดยประมาณ :</td>
                    <td><input type="text" name="pay_time" value="" size="20"></td>
                </tr>
                 <tr>
                    <td>หมายเหตุ :</td>
                    <td><input type="text" name="comment" value="" size="50"></td>
                </tr>
                 <tr>
                     <td>รูปใบสลิป :<span style="color: red;">*</span></td>
                    <td><input type="file" id="slip_image" name="slip_image"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>"</td>
                    <td><button type="submit">ส่งรายการชำระเงิน</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>

