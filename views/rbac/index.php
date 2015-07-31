<?php 

	$this->title = "Set Roles";

	use yii\helpers\Html;

	$items = [];

?>


<div id="role-control row">
	<div class="col-md-12">
		<div class="col-md-4">
			<div class="col-md-12">
				<?= Html::beginForm(['order/update'], 'post', ['enctype' => 'multipart/form-data']) ?>
					<div class="form-group">
						<label for="">User</label>
						<?=  Html::activeTextInput($users, 'username', ['class' => 'form-control']) ?>
					</div>
				<?= Html::endForm() ?>
			</div>
			<div class="col-md-12">
				<label for="">Tag a Role</label>
				<select name="" id="" class="form-control">
					<option value="1">1</option>
				</select>
			</div>
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
			  <table id="example1" class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Rendering engine</th>
			        <th>Browser</th>
			        <th>Platform(s)</th>
			        <th>Engine version</th>
			        <th>CSS grade</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>Trident</td>
			        <td>Internet
			          Explorer 4.0</td>
			        <td>Win 95+</td>
			        <td> 4</td>
			        <td>X</td>
			      </tr>
			    </tbody>
			    <tfoot>
			      <tr>
			        <th>Rendering engine</th>
			        <th>Browser</th>
			        <th>Platform(s)</th>
			        <th>Engine version</th>
			        <th>CSS grade</th>
			      </tr>
			    </tfoot>
			  </table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
