<?php 

namespace adz\module\strepz\rbac\models;

use yii\base\Model;
use adz\module\strepz\rbac\models\AuthItem;
use adz\module\strepz\rbac\models\AuthAssignment;

class Rbac extends Model
{
    public function getRoles()
    {
        return AuthItem::find()->all();
    }

    public function getAssigned()
    {
        return AuthAssignment::find()->all();
    }

	public function getInit()
	{
		$auth = Yii::$app->authManager;
        
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

            // FINANCE
            $financeAdd = $auth->createPermission('financeAdd');
            $financeEdit = $auth->createPermission('financeEdit');
            $financeView = $auth->createPermission('financeView');
            $financeClose = $auth->createPermission('financeClose');
            $financeAuthorize = $auth->createPermission('financeAuthorize');

            // USERS
            $usersAdd = $auth->createPermission('usersAdd');
            $usersEdit = $auth->createPermission('usersEdit');
            $usersView = $auth->createPermission('usersView');
            $usersClose = $auth->createPermission('usersClose');
            $usersActivate = $auth->createPermission('usersActivate');

            // DEPARTMENT
            $departmentAdd = $auth->createPermission('departmentAdd');
            $departmentEdit = $auth->createPermission('departmentEdit');
            $departmentView = $auth->createPermission('departmentView');
            $departmentClose = $auth->createPermission('departmentClose');

            // PROJECT
            $projectAdd = $auth->createPermission('projectAdd');
            $projectEdit = $auth->createPermission('projectEdit');
            $projectView = $auth->createPermission('projectView');
            $projectClose = $auth->createPermission('projectClose');

            // ACTION
            $actionAdd = $auth->createPermission('actionAdd');
            $actionEdit = $auth->createPermission('actionEdit');
            $actionView = $auth->createPermission('actionView');
            $actionClose = $auth->createPermission('actionClose');

            // ISSUE
            $issueAdd = $auth->createPermission('issueAdd');
            $issueEdit = $auth->createPermission('issueEdit');
            $issueView = $auth->createPermission('issueView');
            $issueClose = $auth->createPermission('issueClose');

            // CHANGE
            $Add = $auth->createPermission('bloggerCreatePost');
            $Edit = $auth->createPermission('bloggerEditPost');
            $View = $auth->createPermission('bloggerDeletePost');
            $Close = $auth->createPermission('bloggerDeletePost');
            $Authorize = $auth->createPermission('bloggerDeletePost');

            // DECISION
            $decisionAdd = $auth->createPermission('decisionAdd');
            $decisionEdit = $auth->createPermission('decisionEdit');
            $decisionView = $auth->createPermission('decisionView');
            $decisionClose = $auth->createPermission('decisionClose');
            $decisionAuthorize = $auth->createPermission('decisionAuthorize');

            // RISK
            $riskAdd = $auth->createPermission('riskAdd');
            $riskEdit = $auth->createPermission('riskEdit');
            $riskView = $auth->createPermission('riskView');
            $riskClose = $auth->createPermission('riskClose');

            // DEPENDENCIES
            $dependenciesAdd = $auth->createPermission('dependenciesAdd');
            $dependenciesEdit = $auth->createPermission('dependenciesEdit');
            $dependenciesView = $auth->createPermission('dependenciesView');
            $dependenciesClose = $auth->createPermission('dependenciesClose');

            // DELIVERABLES
            $deliverablesAdd = $auth->createPermission('deliverablesAdd');
            $deliverablesEdit = $auth->createPermission('deliverablesEdit');
            $deliverablesView = $auth->createPermission('deliverablesView');
            $deliverablesClose = $auth->createPermission('deliverablesClose');
            $deliverablesAuthorize = $auth->createPermission('deliverablesAuthorize');

        /*
         *
         * PERMISSIONS - END
         *
        **/

        // ========================================================================================
        // ========================================================================================

        /*
         *
         * ROLES AND SET PERMISSIONS
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
}