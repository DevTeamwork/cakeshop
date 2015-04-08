<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" id="menuAdmin">
<!--                <li>
                    <a href="index.php">
                        <i class="glyphicon glyphicon-home"></i> 
                        หน้าหลัก
                    </a>
                </li>   -->
                <li>
                    <a href="index.php?r=websites/create">
                        <i class="glyphicon glyphicon-new-window"></i> 
                        สร้างไซต์
                    </a>
                </li>               
                <li>
                    <a href="index.php?r=websites/All">
                        <i class="glyphicon glyphicon-tasks"></i> 
                        เว็บไซต์ทั้งหมด
                    </a>
                </li>
            </ul>
            <ul class="nav pull-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">คุณคือ: <?php echo $username; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--<li><a href="#"><i class="fa fa-image fa-fw"></i> เปลี่ยนรูปประจำตัว</a></li>-->
                        <!--<li><a href="#"><i class="fa fa-edit fa-fw"></i> แก้ไขข้อมูลส่วนตัว</a></li>-->
                        <!--<li class="divider"></li>-->
                        <li><a href="index.php?r=Websites/Logout"><i class="fa fa-sign-out fa-fw"></i> ออกจากระบบ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav> <!-- mainmenu -->
<p></p>

