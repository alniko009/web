<?php
/* @var $this AdminController */

$this->breadcrumbs=array(
	'Admin'=>array('/admin'),
	'Users',
);
?>
<h1><?php echo "Users"; ?> <div style="float:right;font-size:12px;"><a href="<?=Yii::app()->request->baseUrl?>/admin/users/add">Add user</a></div></h1>

<p>
	<table>
		<tr>
			<th>#</th>
			<th>Username</th>
			<th>Email</th>
			<th>Name</th>
			<th>Type</th>
			<th>Actions</th>
		</tr>	
	<?php $i=1; foreach($data as $u){ ?>	
		<tr>
			<td><?=$i++; ?></td>
			<td><?=$u->username; ?></td>
			<td><?=$u->email; ?></td>
			<td><?=$u->name; ?></td>
			<td><?=Type::model()->findByPK($u->type)->name; ?></td>
			<td>
				<a href="<?=Yii::app()->request->baseUrl?>/admin/users/edit/<?=$u->id?>">Edit</a>
				<a href="<?=Yii::app()->request->baseUrl?>/admin/users/remove/<?=$u->id?>">Delete</a>
			</td>
		</tr>	
	<?php }	?>
	</table>
</p>
