<script>
    function showDetail() {
        $('#myModal').modal("show");
    }
    $(function() {

    });
</script>
<div class="row">
            <table class="table table-hover table-responsive" style="padding-top: 50px">
                <header>
                    <th style="display: none">#</th>
                    <th>Username</th>
                    <th>Eamil</th>
                    <th></th>
                </header>
                <tbody>
                    <?php foreach ($model as $model): ?>
                        <tr>
                            <td><?php echo $model['username'] ?></td>
                            <td><?php echo $model['email'] ?></td>               
                            <td>                                   
                                <div class="btn-group">


                                    <a href="#" onclick="showDetail();" class="btn btn-default view-site">
                                        <i class="glyphicon glyphicon-eye-open"></i> ดูรายละเอียด
                                    </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                            เมนู
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="index.php?r=Websites/Update&id=<?php echo $webSite['website_id'] ?>">
                                                    <i class="glyphicon glyphicon-edit"></i> แก้ไข</a> </li>
                                            <li><a href="#" onclick="return deleteSite(<?php echo $webSite['website_id'] ?>)">
                                                    <i class="glyphicon glyphicon-remove"></i> ลบ</a></li>                                            

                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> 

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">x</button>
                <i class="icon-white"></i> สมัครสมาชิกใหม่
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="well well-sm">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <h4>
                                            Bhaumik Patel</h4>
                                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                                                </i></cite></small>
                                        <p>
                                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                                            <br />
                                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                                            <br />
                                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">
                                                Social</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span><span class="sr-only">Social</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Twitter</a></li>
                                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Github</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


