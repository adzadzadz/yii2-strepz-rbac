<?php 

	$this->title = "Set Roles";

	use yii\helpers\Html;
	use adz\module\strepz\rbac\models\Users;

	$items_users = [];

	foreach ($users as $user) {
		$items_users[$user->id] = $user->username;
	}

	$items_roles = [];

	foreach ($roles as $role) {
		$items_roles[$role->name] = $role->name . ' - ' . $role->description;
	}

?>


<div id="role-control row">
	<div class="col-md-12">
		<div class="col-md-4">
			<?= Html::beginForm(['rbac/updaterole'], 'post', ['enctype' => 'multipart/form-data']) ?>
				<div class="form-group">
					<label for="">User</label>
					<?=  Html::dropDownList( 'users', $selection = null, $items_users, ['class' => 'form-control'] ) ?>
				</div>
				<div class="form-group">
					<label for="">Tag a Role</label>
					<?=  Html::dropDownList( 'roles', $selection = null, $items_roles, ['class' => 'form-control'] ) ?>
				</div>
				<?= Html::submitButton('Update', ['class' => 'btn btn-primary btn-md']) ?>
			<?= Html::endForm() ?>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<div style="margin-top: 25px;"></div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title">Data Table With Full Features</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
			  <table id="" class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Username</th>
			        <th>Role</th>
			        <th>Actions</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php foreach ($assigned as $each) { ?>
			      <tr>
			        <td><?= Users::getUsernameByID($each->user_id) ?></td>
			        <td><?= $each->item_name ?></td>
			        <td>
			        	<?= Html::beginForm(['rbac/deleterole'], 'post', ['enctype' => 'multipart/form-data']) ?>
							<?= Html::hiddenInput('user_id', $value = $each->user_id) ?>
							<?= Html::hiddenInput('role', $value = $each->item_name) ?>
							<?= Html::submitButton('Remove', ['class' => 'btn btn-danger btn-sm']) ?>
						<?= Html::endForm() ?>
			        </td>
			      </tr>
			    <?php } ?>
			    </tbody>
			  </table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>