<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <title>เว็บฐานข้อมูลศิษย์เก่า</title>
        <!-- blueprint CSS framework -->
                
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/sb-admin/css/bootstrap.min.css" media="screen, projection" />

    <!-- MetisMenu CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb-admin/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb-admin/css/sb-admin-2.css" rel="stylesheet" />

    <!-- Custom Fonts -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb-admin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <?php
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb-admin/js/jquery-1.11.0.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb-admin/js/bootstrap.min.js");
        
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery.validate.min.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb-admin/js/plugins/metisMenu/metisMenu.min.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb-admin/js/sb-admin-2.js");

//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/Script.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/websites.js");
        
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/cropit/jquery.cropit.js");  
	
        ?>
</head>
<body>
<div class="container" id="page">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
                
	<?php echo $content; ?>
	
</div><!-- page -->
<!--<footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 footer-below">
                        <hr>
                            <p>Copyright © RMUTI | <a href="">Privacy Policy</a> | <a href="">Terms of Use</a></p>
                    </div>
                </div>
            </div>
        </footer>-->
</body>
</html>


