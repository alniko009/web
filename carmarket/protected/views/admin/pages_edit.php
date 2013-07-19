<?php
/* @var $this PagesController */
/* @var $model Pages */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pages-pages_edit-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<table>
	<tr>
		<td width="60"><?php echo $form->labelEx($model,'title')?></td>
		<td><?php echo $form->textField($model,"title",array('value'=>$model->title)); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'descr')?></td>
		<td><?php echo $form->textArea($model,"descr",array('value'=>$model->descr,'cols'=>'80', 'rows'=>'7')); ?></td>
	</tr>	

	<tr>
		<td colspan='2'>
			<div class="row buttons">
				<?php echo CHtml::submitButton('Submit'); ?>
				<?php echo $form->hiddenField($model,"id",array('value'=>$model->id)); ?>
				<?php echo $form->hiddenField($model,"user_id",array('value'=>$model->user_id)); ?>
			</div>
		</td>
	</tr>
	</table>

<?php $this->endWidget(); ?>

</div><!-- form -->