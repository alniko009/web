<?php
/* @var $this AdminController */

$this->breadcrumbs=array(
	'Admin'=>array('/admin'),
	'Car parts',
);
?>
<h1><?php echo "Car parts"; ?> <div style="float:right;font-size:12px;"><a href="<?=Yii::app()->request->baseUrl?>/admin/car_parts/add">Add new part</a></div></h1>

<p>
	<table>
		<tr>			
			<th>Name</th>
			<th>Category</th>			
			<th>Actions</th>			
		</tr>	
	<?php 		
		$i=1; foreach($data as $p){ ?>	
		<tr>
			<td><?=$p->name; ?></td>
			<td><?=$p->category; ?></td>			
			<td>
				<a href="<?=Yii::app()->request->baseUrl?>/admin/car_parts/edit/<?=$p->id?>">Edit</a>
				<a href="<?=Yii::app()->request->baseUrl?>/admin/car_parts/remove/<?=$p->id?>">Delete</a>
			</td>
		</tr>	
	<?php }	
		if (empty($data)){ ?>
		<tr>
			<td colspan="4"><center>No pages created</center></td>
		</tr>
	<?php }		
	?>
	</table>
</p>
