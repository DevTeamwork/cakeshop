<!-- banner -->
<div class="container">
    <!--<div class="img-slider">-->
        <!----start-slider-script---->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/responsiveslides.min.js"></script>
        <script>
            // You can also use "$(window).load(function() {"
            $(function () {
                // Slideshow 4
                $("#slider4").responsiveSlides({
                    auto: true,
                    pager: true,
                    nav: true,
                    speed: 500,
                    namespace: "callbacks",
                    before: function () {
                        $('.events').append("<li>before event fired.</li>");
                    },
                    after: function () {
                        $('.events').append("<li>after event fired.</li>");
                    }
                });

            });
        </script>
        <!----//End-slider-script---->
        <!-- Slideshow 4 -->
        <!--<div  id="top" class="callbacks_container">-->
            <!--<ul class="rslides" id="slider4">-->
<!--                <li>
                    <img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/slide.jpg" class="img-responsive" alt="">
                    <div class="slider-caption">
                        <div class="slider-caption-left text-center">
                            <h1>ARE YOU LOOKING FOR SWEET, STYLISH AND DELECIOUS BIRTHDAY CAKES?</h1>
                            <p>DON'T WORRY, WE CAN HELP YOU! CHECK OUR BEST CAKE SECTION.</p>
                            <a class="buy-btn" href="#">Buy Now</a>
                        </div>
                        <div class="slider-caption-right">
                            <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/iteam.png" class="img-responsive" title="name" /></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                     share-on 
                    <div class="share-on">
                        <div class="share-on-grid">
                            <div class="share-on-grid-left">
                                <h3>Share On</h3>
                            </div>
                            <div class="share-on-grid-right">
                                <a href="#"><span class="facebook"> </span></a>
                                <a href="#"><span class="twitter"> </span></a>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                     share-on 
                </li>-->
<!--                <li>
                    <img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/slide.jpg" class="img-responsive" alt="">
                    <div class="slider-caption">
                        <div class="slider-caption-left text-center">
                            <h1>ARE YOU LOOKING FOR SWEET, STYLISH AND DELECIOUS BIRTHDAY CAKES?</h1>
                            <p>DON'T WORRY, WE CAN HELP YOU! CHECK OUR BEST CAKE SECTION.</p>
                            <a class="buy-btn" href="#">Buy Now</a>
                        </div>
                        <div class="slider-caption-right">
                            <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/iteam.png" class="img-responsive" title="name" /></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                     share-on 
                    <div class="share-on">
                        <div class="share-on-grid">
                            <div class="share-on-grid-left">
                                <h3>Share On</h3>
                            </div>
                            <div class="share-on-grid-right">
                                <a href="#"><span class="facebook"> </span></a>
                                <a href="#"><span class="twitter"> </span></a>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                     share-on 
                </li>
                <li>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/slide.jpg" class="img-responsive" alt="">
                    <div class="slider-caption">
                        <div class="slider-caption-left text-center">
                            <h1>ARE YOU LOOKING FOR SWEET, STYLISH AND DELECIOUS BIRTHDAY CAKES?</h1>
                            <p>DON'T WORRY, WE CAN HELP YOU! CHECK OUR BEST CAKE SECTION.</p>
                            <a class="buy-btn" href="#">Buy Now</a>
                        </div>
                        <div class="slider-caption-right">
                            <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/iteam.png" class="img-responsive" title="name" /></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                     share-on 
                    <div class="share-on">
                        <div class="share-on-grid">
                            <div class="share-on-grid-left">
                                <h3>Share On</h3>
                            </div>
                            <div class="share-on-grid-right">
                                <a href="#"><span class="facebook"> </span></a>
                                <a href="#"><span class="twitter"> </span></a>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                     share-on 
                </li>
                <li>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/slide.jpg" class="img-responsive" alt="">
                    <div class="slider-caption">
                        <div class="slider-caption-left text-center">
                            <h1>ARE YOU LOOKING FOR SWEET, STYLISH AND DELECIOUS BIRTHDAY CAKES?</h1>
                            <p>DON'T WORRY, WE CAN HELP YOU! CHECK OUR BEST CAKE SECTION.</p>
                            <a class="buy-btn" href="#">Buy Now</a>
                        </div>
                        <div class="slider-caption-right">
                            <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/iteam.png" class="img-responsive" title="name" /></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                     share-on 
                    <div class="share-on">
                        <div class="share-on-grid">
                            <div class="share-on-grid-left">
                                <h3>Share On</h3>
                            </div>
                            <div class="share-on-grid-right">
                                <a href="#"><span class="facebook"> </span></a>
                                <a href="#"><span class="twitter"> </span></a>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                     share-on 
                </li>-->
<!--            </ul>-->
        <!--</div>-->
        <!--<div class="clearfix"> </div>-->
    <!--</div>-->
    <!-- /banner -->
</div>
<!-- top-grids -->
<div class="top-grids">
    <div class="container">
        <?php foreach ($products as $product) : ?>
        <div class="col-md-4 top-grid">
            <div class="top-grid-head">
                <h3><?php echo $product['name']; ?></h3>
            </div>
            <div class="top-grid-info">
                <!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/img1.jpg" class="img-responsive" title="name"/>-->
                <img src="<?php echo $product['photo']; ?>" height="250px">
                <br><br>
                <span>ราคา <?php echo number_format($product['price']); ?> บาท</span>
                <div class="clearfix"> </div>
                <a class="btn" href="index.php?r=Frontend/selectSendDate&product_id=<?php echo $product['product_id']; ?>">สั่งซื้อ</a>
            </div>
        </div>
        <?php endforeach; ?>
        
    </div>
    <!-- top-grids-bg -->
    <div class="top-grids-bg">
        <span> </span>
    </div>
    <!-- top-grids-bg -->
</div>
<!-- top-grids -->
<!-- bottom-grids -->
<div class="bottom-grids">
    <div class="container">
        
        
        <div class="clearfix"> </div>
    </div>
</div>
<!-- bottom-grids -->
<!-- /container -->