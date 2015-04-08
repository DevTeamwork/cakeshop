<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title>เว็บฐานข้อมูลศิษย์เก่า</title>
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap-theme.css" media="print" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/jquery-ui/jquery-ui.css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/jquery-step/css/jquery.steps.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/startbootstrap.css" rel="stylesheet" />

        <!-- CUSTOM STYLElinS-->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/sb-admin-2.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/fonts/thsarabunnew.css" rel="stylesheet" type="text/css"/>
        <style>
            body{ 
                font-family: 'THSarabunNew', sans-serif;
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);
                background-color: #ec971f;

            }
            // joke insert
            .type{ font-family: 'THSarabunNew', sans-serif; height: 5em; width: 98%;font-size: 1em;clear: both;margin: 20px auto 10px;padding: 5px 1%; }

        </style>

        <?php
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery-ui/jquery-ui.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/bootstrap/js/bootstrap.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/Script.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery-step/jquery.steps.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery.validate.min.js");

//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb-admin/js/plugins/metisMenu/metisMenu.min.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb-admin/js/sb-admin-2.js");

        //gallerys
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery.fancybox.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/ckeditor/ckeditor.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/ckeditor/adapters/jquery.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/cropit/jquery.cropit.js"); 
//               
//        jquery.cropit.js
         Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/SimpleCropper/scripts/jquery.Jcrop.js"); 
         Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/SimpleCropper/scripts/jquery.SimpleCropper.js"); 
        
         Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/webmaster.js");
         
                 Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/jquery.dataTables.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/dataTables.bootstrap.js");
         
         ?>
    </head>

    <body>
        <div class="container" id="page">
            
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>
                <div class="container">
                        <?php echo $content; ?>                      
                </div>
<!--                <div class="" style="padding-top: 20px;">
                <?php// echo $content; ?>
            </div>-->


            <div class="clear"></div>

            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 footer-below">
                            <hr>
                                <!--<p>Copyright © TEC RMUTI | <a href="">Privacy Policy</a> | <a href="">Terms of Use</a></p>-->
                        </div>
                    </div>
                </div>
            </footer>

        </div><!-- page -->

    </body>
</html>
