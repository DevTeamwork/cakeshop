<?php
$website_id = $websites->website_id;
$site_name = $websites->name;
$site_university = $websites->university;
$site_banner = $websites->banner;
$site_logo = $websites->logo;
?>
<input type="hidden" id="is_admin" name="is_admin" value="<?php echo $is_admin; ?>">
<input type="hidden" id="website_name" name="website_name" value="<?php echo $site_name; ?>"/>    
<input type="hidden" id="website_id" name="website_id" value="<?php echo $website_id; ?>"/> 
<input type="hidden" id="website_university" name="website_university" value="<?php echo $site_university; ?>"/>
<input type="hidden" id="website_logo" name="website_logo" value="<?php echo$site_logo; ?>"/>
<input type="hidden" id="website_banner" name="website_banner" value="<?php echo $site_banner; ?>"/>
<input type="hidden" id="website_logo_path" name="website_logo_path" value="<?php echo Yii::app()->request->baseUrl . '/uploads/'.$website_id.'/logo/'. $site_logo; ?>"/>
<input type="hidden" id="website_banner_path" name="website_banner_path" value="<?php echo Yii::app()->request->baseUrl . '/uploads/'.$website_id.'/banner/'. $site_banner; ?>"/>



