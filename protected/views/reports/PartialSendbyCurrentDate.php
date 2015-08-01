<table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>#</th>
                <!--<th>order_detail_id</th>-->
                <th>เลขที่บิล</th>
                <th>สินค้า</th>
                <th>จำนวน</th>
                <th>ราคา</th>
                <th>ชื่อ-สกุล</th>
                <th>ชื่อเล่น</th>
                <th>ที่อยู่</th>
                <th>เบอร์โทร</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rank = 0;
            foreach ($model as $model):
//                $id = $model['order_detail_id'];
                $order_id = $model['order_id'];
                $order_qty = $model['order_qty'];
                $product_price = $model['product_price'];
                $product_id = $model['product_id'];
                $product_name= $model['name'];
                $email = $model['email'];
                $address = $model['addess'];
                $firstname = $model['firstname'];
                $lastname = $model['lastname'];
                $nickname = $model['nickname'];
                $tel = $model["tel"];
                $rank += 1;
                ?>
                <tr>
                    <td><?php echo $rank; ?></td>
                    <!--<td><?php echo $id; ?></td>-->
                    <td><?php echo $order_id; ?></td>
                    <td><?php echo $product_id.'::'.$product_name; ?></td>
                    <td><?php echo $order_qty; ?></td> 
                    <td><?php echo $product_price; ?></td>  
                    <td><?php echo $firstname.' '.$lastname; ?></td>
                    <td><?php echo $nickname; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $tel; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<script>
    $(document).ready(function() {

        var languageObj = {
            "emptyTable": "ไม่มีข้อมูล",
            "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
            "infoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
            "infoFiltered": "(ค้นหา จาก _MAX_ แถว)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "แสดง _MENU_ แถว",
            "loadingRecords": "โหลด...",
            "processing": "กำลังทำงาน...",
            "search": "ค้นหา:",
            "zeroRecords": "ไม่มีคำที่ค้นหา",
            "paginate": {
                "first": "แรก",
                "last": "สุดท้าย",
                "next": "ถัดไป",
                "previous": "ก่อนหน้า"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        };

        $('#dataTables-example').dataTable({
            "language": languageObj
        });
    });
</script>




