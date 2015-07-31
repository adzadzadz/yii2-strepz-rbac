<?php 

namespace adz\module\strepz\rbac\models;

use yii\base\Model;
use common\models\User;

class Users extends Model
{
	public function getUsers()
	{
		$users = User::find()
	    ->where(['status' => User::STATUS_ACTIVE])
	    ->all();

	    return $users;
	}
}