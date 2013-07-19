<?php
/* @var $this AdminController */

$this->breadcrumbs=array(
	'Admin'=>array('/admin'),
	'Pages',
);
?>
<h1><?php echo "Pages"; ?> <div style="float:right;font-size:12px;"><a href="<?=Yii::app()->request->baseUrl?>/admin/pages/add">Add page</a></div></h1>

<p>
	<table>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Created</th>			
			<th>Actions</th>			
		</tr>	
	<?php 		
		$i=1; foreach($data as $p){ ?>	
		<tr>
			<td><?=$i++; ?></td>
			<td><?=$p->title; ?></td>
			<td><?=$p->created; ?></td>			
			<td>
				<a href="<?=Yii::app()->request->baseUrl?>/admin/pages/edit/<?=$p->id?>">Edit</a>
				<a href="<?=Yii::app()->request->baseUrl?>/admin/pages/remove/<?=$p->id?>">Delete</a>
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
