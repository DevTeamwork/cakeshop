<form id="form" class="form-horizontal" role="form">
    <input type="hidden" id='website_id' name="website_id" value="<?php echo $model->website_id; ?>">
    <input type="hidden" id='id' name="id" value="<?php echo $model->id; ?>">
    <div style="margin-bottom: 25px; width: 80%;" class="input-group">              
        <h4><span class="label label-default">หัวข้อ/ชื่อเรื่อง</span></h4>
        <input id="title" type="text" class="form-control" name="title" value="<?php echo $model->title; ?>" placeholder="หัวข้อ/ชื่อเรื่อง">                                        
    </div>

    <div style="margin-bottom: 25px" class="input-group">
        <!--<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>-->

        <h4><span class="label label-default">เนื้อหา/รายละเอียด</span></h4>
        <!--<input id="detail" type="text" class="form-control" name="detail" placeholder="password">-->
        <textarea id="editor1" name="editor1" style="padding-left: 0;padding-right: 0;" class="required">
         <?php echo $model->detail; ?>
        </textarea>
    </div>
    <div style="margin-top:20px" class="form-group">
        <div class="col-sm-12 controls">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save fa-fw"></i> บันทึก
            </button>
        </div>
    </div>
</form>



