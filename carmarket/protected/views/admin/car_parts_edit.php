<?php
/* @var $this PagesController */
/* @var $model Pages */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'Admin'=>array('/admin'),
	'Car parts',
);
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
<h1><?php echo "Edit car part"; ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'carbody-car_parts_edit-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<table>
	<tr>
		<td width="60"><?php echo $form->labelEx($model,'name')?></td>
		<td><?php echo $form->textField($model,"name",array('value'=>$model->name)); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'category')?></td>
		<td><?php echo $form->dropDownList($model,'category',$list,array('empty' => '-- בחר אזור --')); ?></td>
	</tr>	

	<tr>
		<td colspan='2'>
			<div class="row buttons">
				<?php echo CHtml::submitButton('Submit'); ?>
				<?php echo $form->hiddenField($model,"id",array('value'=>$model->id)); ?>
			</div>
		</td>
	</tr>
	</table>

<?php $this->endWidget(); ?>

</div><!-- form -->