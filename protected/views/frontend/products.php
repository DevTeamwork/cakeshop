<!-- service -->
<div class="biseller-info">
    <div class="container">
        <h3 class="new-models">รายการสินค้า</h3>
        <ul id="flexiselDemo3">

            <?php foreach ($products as $product) : ?>

                <li>
                    <div class="biseller-column">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/11.jpg" alt="" class="veiw-img">
                        <div class="veiw-img-mark">
                            <!--<a href="singlepage.html">Quick view</a>-->
                        </div>
                        <div class="biseller-name">
                            <h4><?php echo $product['name']; ?></h4>
                            <p>ราคา <?php echo $product['price']; ?> บาท</p>
                        </div>
                        <a href="index.php?r=Frontend/customizeCake&product_id=<?php echo $product['product_id']; ?>">เลือกหน้าเค้ก</a>&nbsp;
                        <a href="index.php?r=Cart/addToCart&product_id=<?php echo $product['product_id']; ?>&greeting=">
                            <button class="add2cart">
                                <span>| Add to Cart</span>
                            </button>
                        </a>					
                    </div>
                </li>

            <?php endforeach; ?>

            <!--            <li>
                            <div class="biseller-column">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/12.jpg" alt="" class="veiw-img">
                                <div class="veiw-img-mark">
                                    <a href="singlepage.html">Quick view</a>
                                </div>
                                <div class="biseller-name">
                                    <h4>Printed Cake</h4>
                                    <p>$ 600.99</p>
                                </div>
                                <a href="singlepage.html"><button class="add2cart">
                                        <span>| Add to Cart</span>
                                    </button></a>					
                            </div>
                        </li>
            
                        <li>
                            <div class="biseller-column">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/13.jpg" alt="" class="veiw-img">
                                <div class="veiw-img-mark">
                                    <a href="singlepage.html">Quick view</a>
                                </div>
                                <div class="biseller-name">
                                    <h4>Forest Egg</h4>
                                    <p>$ 400.99</p>
                                </div>
                                <a href="singlepage.html"><button class="add2cart">
                                        <span>| Add to Cart</span>
                                    </button></a>
                            </div>
                        </li>
                        <li>
                            <div class="biseller-column">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/14.jpg" alt="" class="veiw-img">
                                <div class="veiw-img-mark">
                                    <a href="singlepage.html">Quick view</a>
                                </div>
                                <div class="biseller-name">
                                    <h4>Butter Scotch </h4>
                                    <p>$ 219.99</p>
                                </div>
                                <a href="singlepage.html"><button class="add2cart">
                                        <span>| Add to Cart</span>
                                    </button></a>
                            </div>
                        </li>-->
        </ul>
    </div>
</div>	

<script type="text/javascript">
    $(window).load(function () {
        $("#flexiselDemo3").flexisel({
            visibleItems: 4,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });

    });
</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>

<!--<div class="best-seller">
    <div class="container">
        <div class="biseller-info">
            <h3 class="new-models">varieties</h3>
            <ul id="flexiselDemo1">
                <li>
                    <div class="biseller-column">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/18.jpg" alt="">
                        <div class="veiw-img-mark">
                            <a href="singlepage.html">Quick view</a>
                        </div>
                        <div class="biseller-name">
                            <h4>Chocolate </h4>
                            <p>$ 200.99</p>
                        </div>
                        <a href="singlepage.html"><button class="add2cart">
                                <span>| Add to Cart</span>
                            </button></a>
                    </div>
                </li>
                <li>
                    <div class="biseller-column">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/15.jpg" alt="">
                        <div class="veiw-img-mark">
                            <a href="singlepage.html">Quick view</a>
                        </div>
                        <div class="biseller-name">
                            <h4>Birthday Cakes </h4>
                            <p>$ 180.99</p>
                        </div>
                        <a href="singlepage.html"><button class="add2cart">
                                <span>| Add to Cart</span>
                            </button></a>
                    </div>
                </li>
                <li>
                    <div class="biseller-column">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/16.jpg" alt="">
                        <div class="veiw-img-mark">
                            <a href="singlepage.html">Quick view</a>
                        </div>
                        <div class="biseller-name">
                            <h4>Flower Types </h4>
                            <p>$ 140.99</p>
                        </div>
                        <a href="singlepage.html"><button class="add2cart">
                                <span>| Add to Cart</span>
                            </button></a>
                    </div>
                </li>
                <li>
                    <div class="biseller-column">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/frontend/17.jpg" alt="">
                        <div class="veiw-img-mark">
                            <a href="singlepage.html">Quick view</a>
                        </div>
                        <div class="biseller-name">
                            <h4>Sheet Cake </h4>
                            <p>$ 150.99</p>
                        </div>
                        <a href="singlepage.html"><button class="add2cart">
                                <span>| Add to Cart</span>
                            </button></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>-->
<script type="text/javascript">
    $(window).load(function () {
        $("#flexiselDemo1").flexisel({
            visibleItems: 4,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });

    });
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flexisel.js"></script>

<div class="clearfix"></div>