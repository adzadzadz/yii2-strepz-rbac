<?php 

namespace adz\module\strepz\rbac\models;

use yii\base\Model;
use adz\module\strepz\rbac\models\AuthItem;
use adz\module\strepz\rbac\models\AuthAssignment;

class Rbac extends Model
{
    public function getRoles()
    {
        return AuthItem::find()
        ->where(['type' => 1])
        ->all();
    }

    public function getPermissions()
    {
        return AuthItem::find()
        ->where(['type' => 2])
        ->all();
    }

    public function getAssigned($all = true, $id = null, $role = null)
    {
        if ($all === true) {
            return AuthAssignment::find()->all();
        } elseif ($id !== null && $role !== null) {
            return AuthAssignment::findOne([
                'user_id' => $id,
                'item_name' => $role,
            ]);
        }         
    }

	public function initRoles()
	{
        $auth = \Yii::$app->authManager;

        /*
         *
         * ROLES
         *
        **/

            $superuser = $auth->createRole('SU');
                $superuser->description = 'Full control over everything.';
                $auth->add($superuser);

            $admin = $auth->createRole('ADM');
                $admin->description = 'Functional Owner of the platform has all rights.';
                $auth->add($admin);

            $finance = $auth->createRole('FIN');
                $finance->description = 'Role responsible for finance.';
                $auth->add($finance);

            $financeManager = $auth->createRole('FMGR');
                $financeManager->description = 'Approver for finance.';
                $auth->add($financeManager);

            $projectManager = $auth->createRole('PM');
                $projectManager->description = 'Can manage projects.';
                $auth->add($projectManager);

            $executive = $auth->createRole('EXEC');
                $executive->description = 'Project executive role.';
                $auth->add($executive);

            $sme = $auth->createRole('SME');
                $sme->description = 'System matter export role.';
                $auth->add($sme);

            $pmo = $auth->createRole('PMO');
                $pmo->description = 'Project management office-role.';
                $auth->add($pmo);

            $programManager = $auth->createRole('PGM');
                $programManager->description = 'Program management role.';
                $auth->add($programManager);

            $auditor = $auth->createRole('AUD');
                $auditor->description = 'Read-only role.';
                $auth->add($auditor);

        /*
         *
         * ROLES AND SET PERMISSIONS - END
         *
        **/

        return $superuser;
	}

    public function initPermissions()
    {
        $auth = \Yii::$app->authManager;
        
        /*
         *
         * PERMISSIONS
         *
        **/

            // CREATE COMPANY
            $createCompany = $auth->createPermission('createCompany');

            // COMPANY
            $companyAdd = $auth->createPermission('companyAdd');
            $companyEdit = $auth->createPermission('companyEdit');
            $companyView = $auth->createPermission('companyView');
            $companyClose = $auth->createPermission('companyClose');

            $auth->add($companyAdd);
            $auth->add($companyEdit);
            $auth->add($companyView);
            $auth->add($companyClose);

            // FINANCE
            $financeAdd = $auth->createPermission('financeAdd');
            $financeEdit = $auth->createPermission('financeEdit');
            $financeView = $auth->createPermission('financeView');
            $financeClose = $auth->createPermission('financeClose');
            $financeAuthorize = $auth->createPermission('financeAuthorize');

            $auth->add($financeAdd);
            $auth->add($financeEdit);
            $auth->add($financeView);
            $auth->add($financeClose);
            $auth->add($financeAuthorize);

            // USERS
            $usersAdd = $auth->createPermission('usersAdd');
            $usersEdit = $auth->createPermission('usersEdit');
            $usersView = $auth->createPermission('usersView');
            $usersClose = $auth->createPermission('usersClose');
            $usersActivate = $auth->createPermission('usersActivate');

            $auth->add($usersAdd);
            $auth->add($usersEdit);
            $auth->add($usersView);
            $auth->add($usersClose);
            $auth->add($usersActivate);

            // DEPARTMENT
            $departmentAdd = $auth->createPermission('departmentAdd');
            $departmentEdit = $auth->createPermission('departmentEdit');
            $departmentView = $auth->createPermission('departmentView');
            $departmentClose = $auth->createPermission('departmentClose');

            $auth->add($departmentAdd);
            $auth->add($departmentEdit);
            $auth->add($departmentView);
            $auth->add($departmentClose);

            // PROJECT
            $projectAdd = $auth->createPermission('projectAdd');
            $projectEdit = $auth->createPermission('projectEdit');
            $projectView = $auth->createPermission('projectView');
            $projectClose = $auth->createPermission('projectClose');

            $auth->add($projectAdd);
            $auth->add($projectEdit);
            $auth->add($projectView);
            $auth->add($projectClose);

            // ACTION
            $actionAdd = $auth->createPermission('actionAdd');
            $actionEdit = $auth->createPermission('actionEdit');
            $actionView = $auth->createPermission('actionView');
            $actionClose = $auth->createPermission('actionClose');

            $auth->add($actionAdd);
            $auth->add($actionEdit);
            $auth->add($actionView);
            $auth->add($actionClose);

            // ISSUE
            $issueAdd = $auth->createPermission('issueAdd');
            $issueEdit = $auth->createPermission('issueEdit');
            $issueView = $auth->createPermission('issueView');
            $issueClose = $auth->createPermission('issueClose');

            $auth->add($issueAdd);
            $auth->add($issueEdit);
            $auth->add($issueView);
            $auth->add($issueClose);

            // CHANGE
            $changeAdd = $auth->createPermission('changeAdd');
            $changeEdit = $auth->createPermission('changeEdit');
            $changeView = $auth->createPermission('changeView');
            $changeClose = $auth->createPermission('changeClose');
            $changeAuthorize = $auth->createPermission('changeAuthorize');

            $auth->add($changeAdd);
            $auth->add($changeEdit);
            $auth->add($changeView);
            $auth->add($changeClose);
            $auth->add($changeAuthorize);

            // DECISION
            $decisionAdd = $auth->createPermission('decisionAdd');
            $decisionEdit = $auth->createPermission('decisionEdit');
            $decisionView = $auth->createPermission('decisionView');
            $decisionClose = $auth->createPermission('decisionClose');
            $decisionAuthorize = $auth->createPermission('decisionAuthorize');

            $auth->add($decisionAdd);
            $auth->add($decisionEdit);
            $auth->add($decisionView);
            $auth->add($decisionClose);
            $auth->add($decisionAuthorize);

            // RISK
            $riskAdd = $auth->createPermission('riskAdd');
            $riskEdit = $auth->createPermission('riskEdit');
            $riskView = $auth->createPermission('riskView');
            $riskClose = $auth->createPermission('riskClose');

            $auth->add($riskAdd);
            $auth->add($riskEdit);
            $auth->add($riskView);
            $auth->add($riskClose);

            // DEPENDENCIES
            $dependenciesAdd = $auth->createPermission('dependenciesAdd');
            $dependenciesEdit = $auth->createPermission('dependenciesEdit');
            $dependenciesView = $auth->createPermission('dependenciesView');
            $dependenciesClose = $auth->createPermission('dependenciesClose');

            $auth->add($dependenciesAdd);
            $auth->add($dependenciesEdit);
            $auth->add($dependenciesView);
            $auth->add($dependenciesClose);

            // DELIVERABLES
            $deliverablesAdd = $auth->createPermission('deliverablesAdd');
            $deliverablesEdit = $auth->createPermission('deliverablesEdit');
            $deliverablesView = $auth->createPermission('deliverablesView');
            $deliverablesClose = $auth->createPermission('deliverablesClose');
            $deliverablesAuthorize = $auth->createPermission('deliverablesAuthorize');

            $auth->add($deliverablesAdd);
            $auth->add($deliverablesEdit);
            $auth->add($deliverablesView);
            $auth->add($deliverablesClose);
            $auth->add($deliverablesAuthorize);
    }
}