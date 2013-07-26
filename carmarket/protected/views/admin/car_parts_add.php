<?php
/* @var $this CarBodyController */
/* @var $model CarBody */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'Admin'=>array('/admin'),
	'Car parts',
);
?>
<h1><?php echo "Add car part"; ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'car-body-car_parts_add-form',
	'enableAjaxValidation'=>false,
));
$list = array('חזית'=>'חזית',
			'לאורך צד ימין'=>'לאורך צד ימין',
			'לאורך צד שמאל'=>'לאורך צד שמאל',
			'פנים הרכב'=>'פנים הרכב',
			'אחורי'=>'אחורי',
			'פנסים,מראות'=>'פנסים,מראות',
			'גג מרכב/ריצפה'=>'גג מרכב/ריצפה',
			'חלקים מכניים'=>'חלקים מכניים',
			'חלונות'=>'חלונות',
			'מזגן'=>'מזגן',
			'חשמל ואלקטרוניקה'=>'חשמל ואלקטרוניקה',
			'צמיגים /וחישוקים'=>'צמיגים /וחישוקים',
			'רכב שלם'=>'רכב שלם',
			'שיפורים ותוספות4X4'=>'שיפורים ותוספות4X4',
			'שיפורים ותוספות רכביספורט'=>'שיפורים ותוספות רכביספורט',
			'אופנועים'=>'אופנועים',
			'טרקטורונים'=>'טרקטורונים',
			'מצברים'=>'מצברים');
 ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->dropDownList($model,'category',$list,array('empty' => '-- בחר אזור --')); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->