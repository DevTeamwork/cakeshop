<?php
/* @var $this WebsitesController */
/* @var $model Websites */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'websites-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userid'); ?>
		<?php echo $form->textField($model,'userid'); ?>
		<?php echo $form->error($model,'userid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo'); ?>
		<?php echo $form->textField($model,'logo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'banner'); ?>
		<?php echo $form->textField($model,'banner',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'banner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sel_mainpage'); ?>
		<?php echo $form->textField($model,'sel_mainpage',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'sel_mainpage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sel_profile'); ?>
		<?php echo $form->textField($model,'sel_profile',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'sel_profile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sel_editprofile'); ?>
		<?php echo $form->textField($model,'sel_editprofile',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'sel_editprofile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sel_listuser'); ?>
		<?php echo $form->textField($model,'sel_listuser',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'sel_listuser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sel_portfolio'); ?>
		<?php echo $form->textField($model,'sel_portfolio',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'sel_portfolio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sel_album'); ?>
		<?php echo $form->textField($model,'sel_album',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'sel_album'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sel_published'); ?>
		<?php echo $form->textField($model,'sel_published',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'sel_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sel_contact'); ?>
		<?php echo $form->textField($model,'sel_contact',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'sel_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->