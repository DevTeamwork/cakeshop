<?php
/* @var $this WebsitesController */
/* @var $data Websites */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('website_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->website_id), array('view', 'id'=>$data->website_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banner')); ?>:</b>
	<?php echo CHtml::encode($data->banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sel_mainpage')); ?>:</b>
	<?php echo CHtml::encode($data->sel_mainpage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sel_profile')); ?>:</b>
	<?php echo CHtml::encode($data->sel_profile); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sel_editprofile')); ?>:</b>
	<?php echo CHtml::encode($data->sel_editprofile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sel_listuser')); ?>:</b>
	<?php echo CHtml::encode($data->sel_listuser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sel_portfolio')); ?>:</b>
	<?php echo CHtml::encode($data->sel_portfolio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sel_album')); ?>:</b>
	<?php echo CHtml::encode($data->sel_album); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sel_published')); ?>:</b>
	<?php echo CHtml::encode($data->sel_published); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sel_contact')); ?>:</b>
	<?php echo CHtml::encode($data->sel_contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	*/ ?>

</div>