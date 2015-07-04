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
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  
  function redirectToCart() {
        var send_date = $('#datepicker').val();
        window.location.href = 'index.php?r=Cart/addToCart&product_id=<?php echo $product['product_id']; ?>&greeting=&send_date=' + send_date;
    }
  </script>
<div class="biseller-info">
    <div class="container">
        <h1>เลือกวันที่ส่งสินค้า</h1>
        
        <div id="panel-left" style="text-align: center;">
            <img id="main-cake" src="<?php echo $product['photo']; ?>" width="350" />
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
            <div>วันที่ส่งสินค้า</div>
            <div id="datepicker"></div>
        </div>
        
    </div>
</div>

