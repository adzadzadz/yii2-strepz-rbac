<?php 

	$this->title = Yii::t('app', 'Roles and Permissions');

	use yii\helpers\Html;
	use adz\module\strepz\rbac\models\Users;
	use yii\web\View;

	$items_users = [];

	foreach ($users as $user) {
		$items_users[$user->id] = $user->username;
	}

	$items_roles = [];

	foreach ($roles as $role) {
		$items_roles[$role->name] = $role->name . ' - ' . $role->description;
	}

?>


<div id="role-control" class="row">
	<div class="col-md-12">
		<div class="col-md-4">
			<h3><?= Yii::t('app', 'Set User Roles'); ?></h3>
			<?= Html::beginForm(['rbac/updaterole'], 'post', ['enctype' => 'multipart/form-data']) ?>
				<div class="form-group">
					<label for="">User</label>
					<?=  Html::dropDownList( 'users', $selection = null, $items_users, ['class' => 'form-control'] ) ?>
				</div>
				<div class="form-group">
					<label for="">Tag a Role</label>
					<?=  Html::dropDownList( 'roles', $selection = null, $items_roles, ['class' => 'form-control'] ) ?>
				</div>
				<?= Html::submitButton('Add Role', ['class' => 'btn btn-primary btn-md']) ?>
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
			  <h3 class="box-title"><?= Yii::t('app', 'Assigned Users'); ?></h3>
			</div><!-- /.box-header -->
			<div class="box-body">
			  <table id="" class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th><?= Yii::t('app', 'Username'); ?></th>
			        <th><?= Yii::t('app', 'Role'); ?></th>
			        <th><?= Yii::t('app', 'Actions'); ?></th>
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
							<?= Html::submitButton(Yii::t('app', 'Remove'), ['class' => 'btn btn-danger btn-sm']) ?>
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

<div class="clearfix"></div>
<div style="margin-top: 25px;"></div>
<hr>

<div id="permission-control" class="row">
	<div class="col-md-12">
		<?= Html::beginForm(['rbac/deleterole'], 'post', ['enctype' => 'multipart/form-data']) ?>
			<h3><?= Yii::t('app', 'Set Role Permissions'); ?></h3>
			<div class="col-md-4">
				<div class="form-group">
					<?=  Html::dropDownList( 'roles', null, $items_roles, ['class' => 'form-control'] ) ?>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-7">
				<div id="permission-checkbox-list" class="form-group">
					<?php 

						$perm_list = [];
						foreach ($permissions as $perm) {
							$perm_list[$perm->name] = $perm->name;
						}

					?>					
					<?= Html::checkboxList( 'permissions', null, $perm_list, ['class' => 'perm-checkbox-list'] ) ?>
					<?= Html::checkbox( 'selectAll', $checked = false, ['label' => 'Select All'] ) ?>
				</div>
			</div>
			<div class="col-md-12">
				<?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-primary btn-md']) ?>
			</div>
		<?= Html::endForm() ?>
	</div>
</div>

<style>
	#permission-checkbox-list label {
		display: block;
		width: 200px;
		float: left;
	}
</style>

<?php 
	
	$js = "
		$(document).ready(function () { 
			$(':checkbox[name=selectAll]').click (function () {
			  $(':checkbox[name=permissions[]]').prop('checked', this.checked);
			});
		});
	";

	$this->registerJs($js, View::POS_END, 'perm-checkbox-toggle'); 

?>