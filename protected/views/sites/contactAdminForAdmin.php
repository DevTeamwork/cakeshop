
                        <form id="form" class="form-horizontal" role="form">
                            <input type="hidden" id='website_id' name="website_id" value="<?php echo $websites->website_id ?>">
<!--                            <div style="margin-bottom: 25px; width: 80%;" class="input-group">              
                                <h4><span class="label label-default">หัวข้อ/ชื่อเรื่อง</span></h4>
                                <input id="title" type="text" class="form-control" name="title" value="" placeholder="หัวข้อ/ชื่อเรื่อง">                                        
                            </div>-->
                            <div style="margin-bottom: 25px">
                                <!--<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>-->

                                <h4><span class="label label-default">ข้อมูลสำหรับติดต่อผู้ดูแลระบบ</span></h4>
                                <!--<input id="detail" type="text" class="form-control" name="detail" placeholder="password">-->
                                <textarea id="editor1" name="editor1" style="padding-left: 0;padding-right: 0;" class="required">
                                    <?php echo $websites->contact; ?>
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


<script>
    var config = {
//            toolbarLocation: 'bottom',
            height: "50%",
            width: "100%",
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
        
    $(document).ready(function() {
        
        CKEDITOR.disableAutoInline = false;
//        $(document).ready(function() {
        $('#editor1').ckeditor(config); // Use CKEDITOR.replace() if element is <textarea>.
        $('#editable').ckeditor(config); // Use CKEDITOR.inline().

        
                $('#form').validate({
            rules: {
                editor1: "required"
            },
            messages: {
                editor1: "กรุณากรอกรายละเอียด"
            },
            submitHandler: function(form) {
                contactAdminUpdate($("#form").serialize());

            }

        });


    });

</script>

