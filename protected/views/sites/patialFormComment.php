
<div class="content">
    <input type="hidden" id='website_id' name="website_id" value="<?php echo $websites->website_id; ?>">
    <input type="hidden" id="webboard_id" name="webboard_id" value="<?php echo $model->id; ?>"/>
    <input type='hidden' id='userid' name='userid' value="<?php echo $userid; ?>" />
    <!--<p><label>ชื่อผู้ใช้</label>-->
        <input type='hidden' disabled="true" id='username' name='username' 
               value="<?php echo $username;?>" />  
    <!--</p>-->
    <text id="textError" class="hide" style="color: red;">* กรุณากรอบข้อความ</text>
    <p><textarea id="editor1" name="editor1" class="required" placeholder="กรอกข้อความ" value="กรอกข้อความ">
        </textarea></p>
    <p>
        <button id="addComment" name="addComment" class="btn btn-primary">
            <i class="fa fa-save fa-fw"></i> ส่งข้อความ
        </button>
    <?php 
//    echo "แสดง".$username;
    if($username == '')
        echo '<div class="alert alert-warning alert-dismissable" id="account_warring">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            ต้องการแสดงความคิดเห็น <a href="index.php?r=Sites/RegisterForm&id="'.$websites->website_id.'"><i class="fa fa-user fa-fw"></i>สมัครสมาชิก</a>เลย
        </div>';
     ?>
</p>
</div>

