<?php
/* @var $this PartsController */
/* @var $model Parts */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'Admin'=>array('/admin'),
	'Spares',
);
?>
<h1><?php echo "Add spare part"; ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parts-parts_add-form',
	'enableAjaxValidation'=>false,
));
$list = CHtml::listData($types, 'id', 'name');
$list_m = CHtml::listData($manufacter, 'id', 'name');
 ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row left">
		<?php echo $form->hiddenField($model,'supplier_id',array('value'=>Yii::app()->user->id)); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',$list, array('empty' => '(Select type)')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'manufacter'); ?>
		<?php echo $form->dropDownList($model,'manufacter',$list_m, array('empty' => '(Select manufacturer)')); ?>
		<?php echo $form->error($model,'manufacter'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model'); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'sub_model'); ?>
		<?php echo $form->textField($model,'sub_model'); ?>
		<?php echo $form->error($model,'sub_model'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'engine_vol'); ?>
		<?php echo $form->textField($model,'engine_vol'); ?>
		<?php echo $form->error($model,'engine_vol'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'gear_type'); ?>
		<?php echo $form->textField($model,'gear_type'); ?>
		<?php echo $form->error($model,'gear_type'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'producer_type'); ?>
		<?php echo $form->textField($model,'producer_type'); ?>
		<?php echo $form->error($model,'producer_type'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'part_name'); ?>
		<?php echo $form->textField($model,'part_name'); ?>
		<?php echo $form->error($model,'part_name'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'country_area'); ?>
		<?php echo $form->textField($model,'country_area'); ?>
		<?php echo $form->error($model,'country_area'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'free_text'); ?>
		<?php echo $form->textField($model,'free_text'); ?>
		<?php echo $form->error($model,'free_text'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model,'part_manufacter'); ?>
		<?php echo $form->textField($model,'part_manufacter'); ?>
		<?php echo $form->error($model,'part_manufacter'); ?>
	</div>


	<div class="row buttons clear">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->