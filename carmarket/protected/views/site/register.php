<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Register',
);
//echo crypt('pass1','test1');
?>

<h1>Register</h1>

<p>Please fill out the following form with your credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'lname'); ?>
		<?php echo $form->textField($model,'lname'); ?>
		<?php echo $form->error($model,'lname'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model,'company'); ?>
		<?php echo $form->error($model,'company'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'cellphone'); ?>
		<?php echo $form->textField($model,'cellphone'); ?>
		<?php echo $form->error($model,'cellphone'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>		
	</div>
	
	<div class="row">
		<label class="required">Password again <span class="required">*</span></label>
		<input type="password" name="User[password_repeat]" id="User_password_repeat">
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Register',array('onclick'=>'if(document.getElementById("User_password").value!=document.getElementById("User_password_repeat").value){alert("Passswords should be the same!");return false;}')); ?>
		<?php echo $form->hiddenField($model,'type',array('value'=>'4')); ?>
		<?php echo $form->hiddenField($model,'created',array('value'=>date('Y-m-d H:i:s'))); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
