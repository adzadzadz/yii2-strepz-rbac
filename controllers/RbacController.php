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
                        'actions' => ['init', 'index', 'updaterole', 'deleterole'],
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

    public function actionUpdaterole()
    {
        if (!empty(Yii::$app->request->post())) {
            $userid = Yii::$app->request->post()['users'];
            $role = Yii::$app->request->post()['roles'];

            if ($userid !== null && $role !== null) {
                $auth = Yii::$app->authManager;

                $assign = $auth->getRole($role);

                if ($auth->assign($assign, $userid)) {
                    Yii::$app->session->setFlash('success', 'New user role added');
                } else {
                    Yii::$app->session->setFlash('error', 'There has been an issue with the process. Please contact your developer.');
                }

                return $this->redirect(['rbac/index']);
            }       
        }
        
        return 'Please make sure the "User ID" and the "Role" is provided.';
    }

    public function actionDeleterole()
    {   
        if (!empty(Yii::$app->request->post())) {
            $user_id = Yii::$app->request->post()['user_id'];
            $role = Yii::$app->request->post()['role'];

            $assigned = Rbac::getAssigned(false, $user_id, $role);

            if ($assigned->delete()) {
                Yii::$app->session->setFlash('success', 'User role has been successfully removed.');
                return $this->redirect(['rbac/index']);
            } else {
                Yii::$app->session->setFlash('error', 'There has been an issue with the process. Please contact your developer.');
                return $this->redirect(['rbac/index']);
            }
        }

        return "I'm not sure what you're trying to do.";
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