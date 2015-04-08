<?php
$website_id = $websites->website_id;
$site_name = $websites->name;
$site_university = $websites->university;
$site_banner = $websites->banner;
$site_logo = $websites->logo;
?>

<?php
    $this->renderPartial('_configWebsites', array("websites" => $websites,'is_admin' =>$is_admin));
?>
<div class="container container-jp">
    <!--left--> 
    <div class="row">	
        <div class="col-sm-3 boxmenu-jp">
            <div class="page-header">
                <label>สถานะ : <?php
                    if ($userid != null) {
                        if ($is_admin == 1) {
                            echo 'ผู้ดูแลระบบ';
                        } else {
                            echo 'สมาชิก';
                        }
                    } else {
                        echo 'ผู้เยี่ยมชม';
                    }
                    ?></label>
            </div>
            <?php
            if ($userid == '') {
                $this->renderPartial('formLogin', array("websites" => $websites));
            }
            ?>
            <div class="nav nav-pills nav-stacked">
                <ul class="nav nav-pills nav-stacked" id="side-menu">
                    <?php
                    echo '<li><a href="index.php?r=Sites/Index&id=' . $website_id . '"><i class="fa fa-home fa-fw"></i> หน้าหลัก</a></li>';
                    if ($websites->sel_register == 'true') {
                        if ($userid != null) {
                            if ($is_admin != 1) {
                                echo '<li><a href="index.php?r=Sites/UserProfile&id=' . $userid . '"><i class="fa fa-user fa-fw"></i> ข้อมูลส่วนตัว</a></li>';
                                echo '<li><a href="index.php?r=Sites/UserProfileEdit&id=' . $userid . '"><i class="fa fa-edit fa-fw"></i> แก้ไขข้อมูลส่วนตัว</a></li>';
                            }
                        } else {
                            if ($is_admin != 1) {
                                echo '<li><a href="index.php?r=Sites/RegisterForm&id=' . $website_id . '"><i class="fa fa-user fa-fw"></i>สมัครสมาชิก</a></li>';
                            }
                        }
                    }
//                    if ($websites->sel_news == 'true') {
//                        echo '<li><a href="index.php?r=Sites/News&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าววันนี้</a></li>';
//                    }
                    if ($websites->sel_webboad == 'true') {
                        echo '<li class="active"><a href="index.php?r=Sites/Webboards&id=' . $website_id . '"><i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า</a></li>';
                    }
//                    if ($websites->sel_knowledge == 'true') {
//                        echo '<li><a href="index.php?r=Sites/Knowledges&id=' . $website_id . '"><i class="fa fa-book fa-fw"></i> สาระน่ารู้</a></li>';
//                    }

                    if ($websites->sel_listuser == 'true') {
                        echo ' <li>
                        <a href="index.php?r=Sites/Users&id=' . $website_id . '"><i class="fa fa-graduation-cap fa-fw"></i> ทำเนียบศิษย์เก่า</a>
                    </li>';
                    }
                    if ($websites->sel_portfolio == 'true') {
                        echo '<li>
                        <a href="index.php?r=Sites/Portfolios&id=' . $website_id . '"><i class="fa fa-briefcase fa-fw"></i> ผลงานศิษย์เก่า</a>
                    </li>';
                    }
                    if ($websites->sel_album == 'true') {
                        echo '<li>
                        <a href="index.php?r=Sites/Gallerys&id=' . $website_id . '"><i class="fa fa-file-image-o fa-fw"></i> อัลบั้มภาพศิษย์เก่า</a>
                    </li>';
                    }

                    if ($websites->sel_published == 'true') {
                        echo '<li>
                        <a href="index.php?r=Sites/Published&id=' . $website_id . '"><i class="fa fa-newspaper-o fa-fw"></i> ข่าวสารจากผู้ดูแลระบบ</a>
                    </li>';
                    }

                    if ($websites->sel_contact == 'true') {
                        echo '<li>
                        <a href="index.php?r=Sites/ContactAdmin&id=' . $website_id . '"><i class="fa fa-twitch fa-fw"></i> ติดต่อผู้ดูแลระบบ</a>
                    </li>';
                    }
                    if($userid != null){
                            echo '<li><a href="#" onclick="return logout();"><i class="fa fa-sign-out"> ออกจากระบบ</i></a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div><!--/left-->

        <!--center-->
        <div class="col-sm-9">     
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-briefcase fa-fw"></i> ผลงานศิษย์เก่า</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">  
                    <?php
                    $tile = $model->title;
                    $detail = $model->detail;
                    $postdated = $model->postdated;
                    $view = $model->view;
                    $reply = $model->reply;
                    ?> 
                    <p></p>
                    <ol class="breadcrumb">
                        <li><a href="index.php?r=Sites/Webboards&id=<?php echo $websites->website_id; ?>"><i class="fa fa-comments-o fa-fw"></i> กระดานข่าวศิษย์เก่า</a></li>
                        <li class="active"><?php echo $tile ?></li>
                    </ol>    
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2><?php echo $tile; ?></h2><hr>
                                    <p><?php echo $detail; ?></p>
                                    <!--<p class="lead"><button class="btn btn-default">อ่านทั้งหมด</button></p>-->
                                    <!--<p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>-->
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-calendar"></i> <?php echo $postdated ?></a></li>
                                        <li><a href="#"><i class="glyphicon glyphicon-comment"></i><?php echo ' ' . $reply; ?> ตอบ</a></li>
                                        <li><a href="#"><i class="glyphicon glyphicon-eye-open"></i><?php echo ' ' . $view; ?> ดู</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>            
                    <div class=" panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            ความคิดเห็นเกี่ยวกับ : <?php echo $tile ?>
                            <div class="btn-group pull-right">
                                <!--<button>สมัครสมาชิก</button>-->
                            </div>
                            <br>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                เงื่อนไข การร่วมแสดงความคิดเห็น!
                                ข้อความที่ท่านได้อ่าน เกิดจากการเขียนโดยสาธารณชน และส่งขึ้นมาแบบอัตโนมัติ เจ้าของเว็บบอร์ดไม่รับผิดชอบต่อข้อความใดๆ ทั้งสิ้น เพราะไม่สามารถระบุได้ว่าเป็นความจริงหรือ ชื่อผู้เขียนที่ได้เห็นคือชื่อจริง ผู้อ่านจึงควรใช้วิจารณญาณ... <!--<a href="#" class="alert-link">Alert Link</a>-->.
                            </div>
                            <ul class="chat" id="chat-list">

                                <?php
                                foreach ($replys as $reply):
                                    $id = $reply['reply_id'];
                                    $title = $reply['title'];
                                    $detail = $reply['detail'];
                                    $username = $reply['username'];
                                    $postdate = $reply['postdated'];
                                    $posttime = $reply['posttime'];
                                    ?>
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="./images/avatar.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"><?php echo  $username; ?></strong> 
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> <?php echo $postdate ?>
                                                </small>
                                            </div>
                                            <p>
                                                <?php echo $detail ?>
                                            </p>
                                        </div>

                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?php
                            $this->renderPartial('patialFormComment', array(
                                'websites' => $websites,
                                'model' => $model,
                                'userid' => $userid,
                                'username' => $username,
                                'is_admin'=>$is_admin
                            ));
                            ?>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!--               <div class="well">
                    <?php //$this->renderPartial('formComment',array('websites'=>$websites,'model'=>$model));  ?>
                                    </div>-->
                    <nav>
                        <ul class="pager">
                            <li class="previous"><a href="index.php?r=Sites/Webboards&id=<?php echo $websites->website_id; ?>">&larr; กลับ</a></li>
                            <!--<li class="next"><a href="#">ถัดไป &rarr;</a></li>-->
                        </ul>
                    </nav>

                </div><!--/center-->
            </div><!--/container-fluid-->
        </div>
    </div><!--/container-fluid-->
</div>
<script>
    
    CKEDITOR.disableAutoInline = true;
    
    function CKupdate(){
        for ( instance in CKEDITOR.instances ){
            CKEDITOR.instances[instance].updateElement();
        }
        CKEDITOR.instances[instance].setData('');
    }
    
    $(function() {
        
        var config = {
            toolbarLocation: 'bottom',
            height: '100px',
            width: '100%',
//        uiColor: '#ffff',,
//     allowedContent: true,
//     extraPlugins : 'filebrowser',
            toolbar:
                    [
                        ['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-', 'Undo', 'Redo', '-', 'SelectAll'],
                        ['UIColor'], ['colors']
                    ],
            toolbarGroups: [
                //{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
                //{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                //{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                //{ name: 'forms' }, 
                {name: 'styles'},
                {name: 'colors'},
                //{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                //{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
                //{ name: 'links' },
//		{ name: 'insert' }
                //{ name: 'tools' },
                //{ name: 'others' },
                //{ name: 'about' },
                //{name: 'video'}
//        {name:'filebrowser'}
            ]
        };

        var editor = $('#editor1').ckeditor(config);

        if($('#userid').val() == ""){
            $('#addComment').attr('disabled','disabled');
        }
        $('#addComment').change(function() {
            var msg = $('#editor1').val();
            if (msg != '') {
                $('#textError').removeClass('show');
                $('#textError').addClass('hide');
            } else {
                $('#textError').removeClass('hide');
                $('#textError').addClass('show');
            }
        });
        $('#addComment').click(function() {

            var userid = $('#userid').val();
            var username = $('#username').val();
            var msg = $('#editor1').val();
            var website_id = $('#website_id').val();
            var webborad_id = $('#webboard_id').val();
            if (msg != '') {
                var fullDate = new Date()
                //convert month to 2 digits
                var twoDigitMonth = ((fullDate.getMonth().length + 1) === 1) ? (fullDate.getMonth() + 1) : '' + (fullDate.getMonth() + 1);
                var currentDate = fullDate.getDate() + "-" + twoDigitMonth + "-" + fullDate.getFullYear();
                var currentTime = fullDate.getHours() + ":" + fullDate.getMinutes() + ":" + fullDate.getSeconds();

                var postdate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + fullDate.getDate();
                var posttime = currentTime;

//            console.log("msg :"+msg);
//            console.log("userid :"+userid);
//            console.log("username :"+username);
//            console.log("website_id : "+website_id);
//            console.log("webborad_id :"+webborad_id);
//          
                var jsonData = {
                    editor1: msg,
                    userid: userid,
                    website_id: website_id,
                    webboard_id: webborad_id,
                    postdated: postdate,
                    posttime: posttime
                };

//                console.log("jsonData : " + JSON.stringify(jsonData));

                $.ajax({
                    url: 'index.php?r=Sites/ReplyInsert',
                    data: jsonData,
                    type: "POST",
                    success: function(data) {
//                   console.log("result :"+data);
                        if (data == 1) {
                            console.log("result :" + data);
                            $('#chat-list').append('<li class="left clearfix">' +
                                    '<span class="chat-img pull-left">' +
                                    '<img src="./images/avatar.png" alt="User Avatar" class="img-circle" />' +
                                    '</span>' +
                                    '<div class="chat-body clearfix">' +
                                    '  <div class="header">' +
                                    '     <strong class="primary-font">' + username + '</strong> ' +
                                    '     <small class="pull-right text-muted">' +
                                    '         <i class="fa fa-clock-o fa-fw"></i>' + currentDate +
                                    '     </small>' +
                                    ' </div>' +
                                    ' <p>' + msg +
                                    ' </p>' +
                                    '</div>' +
                                    '</li>');

                            $('#textError').removeClass('show');
                            $('#textError').addClass('hide');
//                        var msg = $('#editor1').text('');
                            CKupdate();
                        } else {
                            ;
                        }
                    }
                });


            } else {
                $('#textError').removeClass('hide');
                $('#textError').addClass('show');
            }
        });
    });
</script>



