<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title>เว็บฐานข้อมูลศิษย์เก่า</title>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/bootstrap.min.css"/>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/plugins/timeline.css" rel="stylesheet" />

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/sb-admin-2.css" rel="stylesheet" />

<!--<link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/plugins/morris.css" rel="stylesheet" />-->
<!--<link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet"  type="text/css"/>-->

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet"  type="text/css"/>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/fonts/thsarabunnew.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/jquery-step/css/jquery.steps.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/SimpleCropper/css/jquery.Jcrop.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/sb_admin/css/plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/BootstrapImageGallery/css/bootstrap-image-gallery.css" rel="stylesheet" type="text/css"/>
        <style>
            body{ 
                font-family: 'THSarabunNew', sans-serif; 

            }
            .type{ 
                font-family: 'THSarabunNew', sans-serif; height: 5em; width: 98%;font-size: 1em;clear: both;margin: 20px auto 10px;padding: 5px 1%; 
            }

            #banner.home-page {
                margin-top: 1em;
                margin-bottom: 0em;
                /*padding-top: 20px;
                height: 50%;*/
            }
            .home-page {
                /*background-color: #eeeeee;*/
            }

            .home-three {
                /*text-align: center;*/
                background-color: #f8f8f8;
            }

            #inner-content {
                margin-left: -15px;
                margin-right: -15px;
            }

            .jumbotron {
                padding-top: 2em;
                padding-bottom: 0em; 
            }

            .col-lg-9 {
                margin-top: 2em;
            }

            /*            .stars {
                            margin:20px auto 1px;    
                        }*/
            #info + .readmore-js-toggle { 
                padding-bottom: 1.5em; 
                border-bottom: 1px solid #999;
                font-weight: bold;
            }

            .navbar-sm {min-height:30px}
            .navbar-sm .navbar-brand,
            .navbar-sm .navbar-nav>li>a {padding-top:5px; padding-bottom:5px}
            .navbar-sm .navbar-brand {height: 30px}
            .navbar-sm .navbar-toggle {margin: 3px 9px 3px 0px; padding: 4px 4px 4px 4px;}
            .navbar-sm .navbar-toggle .icon-bar {width: 16px;}

            .img-thumbnail {
                display: inline-block;
                width: 100% \9;
                max-width: 30%;
                /*height: auto;*/
                padding: 4px;
                line-height: 1.42857143;
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 4px;
                -webkit-transition: all .2s ease-in-out;
                -o-transition: all .2s ease-in-out;
                transition: all .2s ease-in-out;
            }

            /*browser image*/

            .custom-file{
                position: relative;
                    overflow: hidden;
                    margin: 10px;
            }
            .custom-file #bannerUpload {
                position: absolute;
                    top: 0;
                    right: 0;
                    margin: 0;
                    padding: 0;
                    font-size: 20px;
                    cursor: pointer;
                    opacity: 0;
                    filter: alpha(opacity=0);
            }

            .custom-file #uploaderLogo {
                position: absolute;
                    top: 0;
                    right: 0;
                    margin: 0;
                    padding: 0;
                    font-size: 20px;
                    cursor: pointer;
                    opacity: 0;
                    filter: alpha(opacity=0);
            }

            image-preview{
                width: 180px;
                height: 260px;
            }
            .required{
                color:red;
            }
            .error{
                color: red;
            }

            .jumbotron{
                background-image: none;
                background-color: transparent;
            }
            // hover image
            div.show-image {
    position: relative;
    float:left;
    margin:5px;}

div.show-image:hover input
  {
  display: block;
  }

div.show-image input {
    position:absolute;
    top:0;
    left:0;
    display:none;
}

        </style>

        <?php
        date_default_timezone_set("Asia/Bangkok");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/jquery.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery.validate.min.js");
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/banner.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/bootstrap.min.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/metisMenu/metisMenu.min.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/sb-admin-2.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/ckeditor/ckeditor.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/ckeditor/adapters/jquery.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/websites.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/formValidateSites.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/jquery-step/jquery.steps.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/SimpleCropper/scripts/jquery.Jcrop.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/SimpleCropper/scripts/jquery.SimpleCropper.js");
//                Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/checkboxs.js");
//                Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/ckeditorScript.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/readmore/readmore.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/scripts/readmoreScript.js");
//                Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/dataTables/js/jquery.dataTables.js");
//                    <!-- DataTables JavaScript -->
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/jquery.dataTables.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/sb_admin/js/plugins/dataTables/dataTables.bootstrap.js");

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/DragAvatar/resample.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/DragAvatar/avatar.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/bootstrap_filestyle/bootstrap-filestyle.min.js");
        ?>
        <!--<script src="http://templateplanet.info/tooltip.js"></script>-->
                    <script>

            $(function() {
//                $(":file").filestyle({input: false});
                $('[data-toggle="tooltip"]').tooltip();
                
                //btnChangeBanner
                $("#bannerUpload").on('change', function(event) {
                    var files = event.target.files;
                    //check file 
                    console.log(files);
                    var file_list = event.target.files;

                    for (var i = 0, file; file = file_list[i]; i++) {
                        var sFileName = file.name;
                        var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
                        var iFileSize = file.size;
                        var iConvert = (file.size / 10485760).toFixed(2);

                        if (!(sFileExtension === "pdf" || sFileExtension === "doc" || sFileExtension === "docx") || iFileSize > 10485760) {

                            var reader = new FileReader();
                            reader.onload = function(event) {
                                $.ajax({
                                    url: 'index.php?r=Websites/SaveBanner',
                                    type: 'POST',
                                    data: {
                                        image: event.target.result,
                                        website_id: $('#site_id').val()
//                                file_type : file_type
                                    },
                                    success: function(data) {
//                                alert(data);
                                        if (data != '-1') {
                                            $('#banner').css('background-image', 'url(' + data + ')');
                                            $('#imageBanner').css('background-image', 'url(' + data + ')');
                                        }
                                    }
                                });
                            };
                            reader.onerror = function(event) {
                                alert("I AM ERROR: " + event.target.error.code);
                            };
                            reader.readAsDataURL(files[0]);

                        } else {
                            alert('error!,แนะนำให้ใส่เป็นรูปนามสกุล .png');
                        }
                    }




//                    $('#banner').css('background-image', 'url(' + '../images/'+files[0].name + ')');
                });

                $("#uploaderLogo").on('change', function(event) {
                    var files = event.target.files;
                    //check file 

                    var file_list = event.target.files;
                    console.log(file_list);

                    for (var i = 0, file; file = file_list[i]; i++) {
                        var sFileName = file.name;
                        var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
                        var iFileSize = file.size;
                        var iConvert = (file.size / 10485760).toFixed(2);

                        if (!(sFileExtension === "pdf" || sFileExtension === "doc" || sFileExtension === "docx") || iFileSize > 10485760) {
//                     txt = "File type : " + sFileExtension + "\n\n";
//                     txt += "Size: " + iConvert + " MB \n\n";
//                     txt += "Please make sure your file is in pdf or doc format and less than 10 MB.\n\n";
//                     alert(txt);

                            var reader = new FileReader();
                            reader.onload = function(event) {
//                        $('#banner').css('background-image', 'url(' + event.target.result + ')');
//                        $('#imageBanner').css('background-image', 'url(' + event.target.result + ')');
                                $.ajax({
                                    url: 'index.php?r=Websites/SaveLogo',
                                    type: 'POST',
                                    data: {
                                        image: event.target.result,
                                        website_id: $('#site_id').val()
                                    },
                                    success: function(data) {
                                        if (data != '-1') {
//                                            $('#imageLogo').css('background-image', 'url(' + data + ')');
                                            $('#imageLogo').attr("src", data);
//                                            $('#imageBanner').css('background-image', 'url(' + data + ')');
                                        }
                                    }
                                });
                            };
                            reader.onerror = function(event) {
                                alert("I AM ERROR: " + event.target.error.code);
                            };
                            reader.readAsDataURL(files[0]);

                        } else {
                            alert('error!,แนะนำให้ใส่เป็นรูปนามสกุล .png');
                        }
                    }




//                    $('#banner').css('background-image', 'url(' + '../images/'+files[0].name + ')');
                });
            
//                $('.custom-file').on('hover',function (){
//                    $('.alert').show();
//                });
    });



            UPLOADCARE_PUBLIC_KEY = 'c98de6eebafe525a214d';
        </script>
    </head>

    <?php
//    $logoSrc = Yii::app()->request->baseUrl . "/images/new-logo.png";
//    $bannerSrc = Yii::app()->request->baseUrl . "/images/bk-eco.jpg";
    ?>

    <body>
        <header class="header" role="banner">
            <nav role="navigation">
                <div class="navbar navbar-sm navbar-inverse navbar-fixed-top">
                    <div class="container">
                        <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <!--<a class="navbar-brand" href="http://bragthemes.com/demo/builder/" title="Builder" rel="homepage">Builder</a>-->

                        </div>

                        <!--                        <div class="navbar-collapse collapse navbar-responsive-collapse">
                                                    <ul id="menu-top" class="nav navbar-nav"><li id="menu-item-11" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-11"><a href="http://bragthemes.com/demo/builder/blog/">Blog</a></li>
                                                        <li id="menu-item-10" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10"><a href="http://bragthemes.com/demo/builder/shortcodes/">Shortcodes</a></li>
                                                        <li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-14"><a href="http://bragthemes.com/demo/builder/templates" class="dropdown-toggle" data-toggle="dropdown">Page Templates <b class="caret"></b></a>
                                                            <ul class="dropdown-menu">
                                                                <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12"><a href="http://bragthemes.com/demo/builder/full-width/">Full Width</a></li>
                                                                <li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13"><a href="http://bragthemes.com/demo/builder/sample-page/">Sample Page</a></li>
                                                                <li id="menu-item-45" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-45"><a href="http://bragthemes.com/demo/builder/author/admin/">Author Page</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>-->
                    </div>
                </div> 

            </nav>

        </header>
        <div id="banner" class="home-page" style=" background-image: url(./images/bk-eco.jpg);">
            <div class="container">
                <div id="inner-content" class="wrap clearfix">
                    <div class="jumbotron">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div>
                                        <center>
                                            <img class="img-responsive image-preview" id="imageLogo" src="./images/new-logo.png">
                                            <div class="custom-file btn btn-outline btn-primary" id="btnChangLogo" >
                                                เปลี่ยนโลโก้

                                                <input type="file" accept="image/jpeg" id="uploaderLogo">
                                            </div>
                                            
                                        </center>
                                    </div>
                                    
                                    <!--<div class="show-image">
                                        <img src="http://i.imgur.com/egeVq.png" />
                                        <input class="the-buttons" type="button" value=" Click " />
                                    </div>-->
                                                                        <!--<center><input type="file" class="jfilestyle" data-input="false" id="uploader"></center>-->
                                                                        <!--<center><input type="file" id="uploaderLogo"></center>-->
                                                                        <!--<center></center>-->
                                </div> 
                                <div class="col-lg-9">
                                    <input type="hidden" id="site_id" value="0"/>
                                    <h1 class="page-header" id="site_name">Hello, world!</h1>
                                    <p id="site_university">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                                    <div class="custom-file btn btn-outline btn-primary" >
                                        เปลี่ยนรูปแบนเนอร์
                                        <input type="file" accept="image/jpeg" id="bannerUpload">
                                    </div>
                                   
<!--                                    <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>การใส่รูปแบนเนอร์แนะนำ</strong>ให้ใส่รุปนามสกุล .jpg ขนาด 1920x639 พิกเซล
                                    </div>-->
<!--                                    <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>การใส่รูปโลโก้แนะนำ</strong> ให้ใส่รุปนามสกุล .jpg ขนาด 180x260 พิกเซล
                                    </div>-->
                                </div>
                            </div><!-- end .rowp
                        </div> <!-- end .container-->
                        </div> <!-- end .jumbotron-->
                    </div> <!-- end #inner-content -->
                </div> <!-- end .container-->
            </div>
        </div>

        <div class="container home-three">
            <div class="row">
                <?php echo $content; ?> 	
            </div>  <!--end .row-->
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 footer-below">
                        <hr>
                        <!--<p>สร้างโดย: © <a href="../dreamdata/index.php?r=Websites/">DreamData.com</a></p>-->
                    </div>
                </div>
            </div>
        </footer>

    </body>

</html>



