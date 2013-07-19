<?php
/* @var $this AdminController */

$this->breadcrumbs=array(
	'Admin'=>array('/admin'),
	'Spares',
);
?>
<h1><?php echo "Spares"; ?></h1>

<p>
<center>
	<div>There's <?php echo count($model)?> auto parts in the systems!<br><br></div>
	<div style="font-size:12px;"><a href="<?=Yii::app()->request->baseUrl?>/admin/spares/add">Add spare part</a></div>	
</center>
</p>
