
<!--<div class="nav nav-pills nav-pills">-->
<?php
$website_id = $websites->website_id;
$site_name = $websites->name;
$site_university = $websites->university;
$site_banner = $websites->banner;
$site_logo = $websites->logo;


if ($userid != null) {
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
    echo '<li><a href="#" onclick="return logout();"><i class="fa fa-sign-out"> ออกจากระบบ</i></a></li>';
}
?>

