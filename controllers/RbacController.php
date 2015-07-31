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
                        'actions' => ['init', 'index'],
                        'roles' => ['SU'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $users = Users::getUsers();

        $new = new User;
        return $this->render('index', [
            'users' => $new,
        ]);
    }

    public function actionUpdateRole()
    {
        $auth = Yii::$app->authManager;
        
        
        
        return true;
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