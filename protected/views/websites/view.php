
<script>
    $(function() {
        $('#menuAdmin').hide();
        $('#menuLoginUser').hide();
        $('#menuSigupUser').hide();       
    });
</script>
<style>
    .sb-page-header {
        background-color: #3499A7;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-3">            
            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a href="#" onclick="return dashboard()" data-target-id="pagewrapper">
                        <i class="glyphicon glyphicon-home"></i> หน้าหลัก</a>
                </li>
                <li><a href="#" onclick="return getAllUsers()" data-target-id="pagewrapper">
                        <i class="glyphicon glyphicon-list"></i> ทำเนียบศิษย์เก่า</a>
                </li>
                <li><a href="#" onclick="return portfolioAdmin(<?php echo $model->website_id ?>)" data-target-id="pagewrapper">
                        <i class="glyphicon glyphicon-list"></i> ผลงานศิษย์เก่า</a>
                </li>
                <li><a href="#" onclick="return gallerys()" data-target-id="pagewrapper">
                        <i class="glyphicon glyphicon-picture"></i> อัลบั้มภาพศิษย์เก่า</a>
                </li>
                <li><a href="#" data-target-id="pagewrapper" onclick="return publishedAdmin()">
                        <i class="glyphicon glyphicon-bullhorn"></i> ข่าวประชาสัมพันธ์ศิษย์เก่า</a>
                </li>
                <li><a href="#" data-target-id="pagewrapper" onclick="return contactAdmin()">
                        <i class="glyphicon glyphicon-bullhorn"></i> ติดต่อ Admin</a>
                </li>
            </ul>
        </div>        
        <div class="col-md-9" id="pagewrapper">
        </div>
    </div>
</div>