
<?php
    if($websites->logo != NULL)
        $logoSrc = Yii::app()->request->baseUrl."/uploads/".$websites->logo;
    else{
        $logoSrc =  Yii::app()->request->baseUrl."/images/UploadLight.png";
    }
    
//    if($websites->banner != NULL)
//        $bannerSrc = Yii::app()->request->baseUrl."/uploads/".$websites->banner;
//    else{
//        $bannerSrc =  Yii::app()->request->baseUrl."/images/bk-eco.jpg";
//    }
    
    $bannerSrc =  Yii::app()->request->baseUrl."/images/bk-eco.jpg";
    
?>
<header>
    <div class="row">
        <div class="cycle" 
             style="cursor:auto;
             background-position: -3433.07338713127px 50%;
             background-image: url(<?php echo $bannerSrc ?>);">
            <h5 class="text-right"><?php echo $websites->name; ?> <small><?php echo $websites->university; ?></small></h5>
            <div class="container">
                <div class="col-md-3">                                      
                    <img id="imageLogo" style="width: 180px; height: 245px; padding-left: 20px; padding-bottom: 10px; position: absolute;"
                         src="<?php echo $logoSrc ?>" />
                </div>
                <div class="col-md-9">

                    <div class="row" style="padding-top: 60px; padding-left: 20px; padding-bottom: 10px; position: initial;">
                        <h2 class="text-left"><?php echo $websites->name; ?> </br> 
                            <small><?php echo $websites->university; ?></small></h2>
                    </div>
                    <!--<p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>-->
                </div>
            </div>
        </div>
    </div> 
</header>

