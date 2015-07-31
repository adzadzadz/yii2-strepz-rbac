<?php

namespace adz\module\strepz\rbac\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use adz\module\strepz\rbac\models\Rbac;
use adz\module\strepz\rbac\models\Users;
use common\models\User;

class RbacController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['init', 'index', 'updaterole'],
                        'roles' => ['SU'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $users = Users::getUsers();
        $roles = Rbac::getRoles();
        $assigned = Rbac::getAssigned();

        return $this->render('index', [
            'users' => $users,
            'roles' => $roles,
            'assigned' => $assigned,
        ]);
    }

    public function actionUpdaterole($userid = null, $role = null)
    {
        if ($userid !== null && $role !== null) {
            $auth = Yii::$app->authManager;

            $test2 = $auth->getRole('AUD');

            return var_dump($auth->assign($test2, 2));
        }       
        
        return 'Please make sure the "User ID" and the "Role" is provided.';
    }

    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Initialize permissions and roles
        $superuser = Rbac::getInit();

        // Assigning users their roles
        return var_dump($auth->assign($superuser, 1)); // 2nd param is the user ID.
    }
}