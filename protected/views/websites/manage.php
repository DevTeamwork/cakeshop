
<script>
    $(function() {
        $('#menuUser').remove();
        
//        mainpageLayout();
        
        $('#side-menu').on('click', 'li', function() {
           $('li a').removeClass('active');
           $(this).find('a').addClass('active');
         });
         
    });
</script>
<!--<div class="header" id="header">
    <div class="jumbotron" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>./uploads/<?php echo $model->banner; ?>);">
        <div class="container">
            <div class="col-md-3">                                      
                <img style="width: 180px; height: 245px; padding-left: 20px; padding-bottom: 10px; position: absolute;"
                     src="<?php echo Yii::app()->request->baseUrl; ?>./uploads/<?php echo $model->logo; ?>" />
            </div>
            <div class="col-md-9">

                <div class="row" style="padding-top: 60px; padding-left: 20px; padding-bottom: 10px; position: initial;">
                    <h1><span id="title-page"><?php echo $model->name; ?></span></h1>
                    <p><?php echo $model->university; ?></p>
                </div>
                <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
            </div>
        </div>
    </div>
</div>-->
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $model->name; ?></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">   
        </ul>
        <!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav sidebar-nav" id="side-menu"> 
                    <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                    <li>
                        <a href="#" class="active" onclick="return mainpageLayout();"><i class="glyphicon glyphicon-home"></i> หน้าหลัก <span class="glyphicon arrow"></span></a>
                        <ul>
                            <li><a href="#">เข้าสู่ระบบ</a></li>
                            <li><a href="#">สมัครสมาชิก</a></li>
                            <li><a href="#">ข่าววันนี้</a></li>
                            <li><a href="#">กระดานข่าวศิษย์เก่า</a></li>
                            <li><a href="#">ผู้ชมทั้งหมด</a></li>
                            <li><a href="#">สมาชิกทั้งหมด</a></li>
                            <li><a href="#">สาระน่ารู้</a></li>
                        </ul>
                    </li>
                    
                    <?php
                        $webiste_id = $model->website_id;
                        if ($model->sel_listuser == 'true') {
                            
                            echo '<li><a href="#" onclick="return UsersListLayout('.$webiste_id.');" data-target-id="pagewrapper">
                                <i class="glyphicon glyphicon-list"></i> ทำเนียบศิษย์เก่า</a>
                                </li>';
                        }
                        if ($model->sel_portfolio == 'true') {
                            echo '<li><a href="#" onclick="return portfolioAdmin(<?php echo $website->website_id ?>)" data-target-id="pagewrapper">
                                            <i class="glyphicon glyphicon-list"></i> ผลงานศิษย์เก่า</a>
                                        </li>';
                        }
                        if ($model->sel_album == 'true') {
                            echo '<li><a href="#" onclick="return gallerys()" data-target-id="pagewrapper">
                                <i class="glyphicon glyphicon-picture"></i> อัลบั้มภาพศิษย์เก่า</a>
                            </li>';
                        }

                        if ($model->sel_published == 'true') {
                            echo ' <li><a href="#" data-target-id="pagewrapper" onclick="return publishedAdmin()">
                                <i class="glyphicon glyphicon-bullhorn"></i> ข่าวประชาสัมพันธ์ศิษย์เก่า</a>
                            </li>';
                        }
                        
                        if($model->sel_contact == 'true'){
                            echo '<li><a href="#" data-target-id="pagewrapper" onclick="return contactAdmin()">
                            <i class="glyphicon glyphicon-bullhorn"></i> ติดต่อ Admin</a>
                            </li>';
                        }
                        
                    ?>     

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <!-- Page Content -->
    <div id="page-wrapper">
        
    </div>
    <!-- /#page-wrapper -->
</div>


