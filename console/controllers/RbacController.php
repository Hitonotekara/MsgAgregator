<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 10/2/17
 * Time: 8:24 PM
 */

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionFirstInit()
    {
        $auth = Yii::$app->authManager;

        #
        # permissions
        #

        // "doAll"
        $doAll = $auth->createPermission('doAll');
        $doAll->description = 'Do all things';
        $auth->add($doAll);

        // "adminMain"
        $adminMain = $auth->createPermission('adminMain');
        $adminMain->description = 'Administrate main content';
        $auth->add($adminMain);

        // "viewAllReport"
        $viewAllReport = $auth->createPermission('viewAllReport');
        $viewAllReport->description = 'View all report';
        $auth->add($viewAllReport);

        // "sendMsgWeb"
        $sendMsgWeb = $auth->createPermission('sendMsgWeb');
        $sendMsgWeb->description = 'Send messages via Web-interface';
        $auth->add($sendMsgWeb);

        // "sendMsgApi"
        $sendMsgApi = $auth->createPermission('sendMsgApi');
        $sendMsgApi->description = 'Send messages via API';
        $auth->add($sendMsgApi);

        #
        # role Super-Admin
        #

        // add role "roleSuperAdmin" and add to role permission "doAll"
        $roleSuperAdmin = $auth->createRole('roleSuperAdmin');
        $auth->add($roleSuperAdmin);
        $auth->addChild($roleSuperAdmin, $doAll);

        #
        # other roles
        #

        // add role "roleAdmin" and add to role permission "adminMain"
        $roleAdmin = $auth->createRole('roleAdmin');
        $auth->add($roleAdmin);
        $auth->addChild($roleAdmin, $adminMain);

        // add to role "roleSuperAdmin" all permissions by role "roleAdmin"
        $auth->addChild($roleSuperAdmin, $roleAdmin);

        // add role "roleSuperviser" and add to role permission "viewAllReport"
        $roleSuperviser = $auth->createRole('roleSuperviser');
        $auth->add($roleSuperviser);
        $auth->addChild($roleSuperviser, $viewAllReport);

        // add to role "roleSuperAdmin" all permissions by role "roleSuperviser"
        $auth->addChild($roleSuperAdmin, $roleSuperviser);

        // add role "roleSenderWeb" and add to role permission "sendMsgWeb"
        $roleSenderWeb = $auth->createRole('roleSenderWeb');
        $auth->add($roleSenderWeb);
        $auth->addChild($roleSenderWeb, $sendMsgWeb);

        // add to role "roleSuperAdmin" all permissions by role "roleSenderWeb"
        $auth->addChild($roleSuperAdmin, $roleSenderWeb);

        // add role "roleSenderApi" and add to role permission "sendMsgApi"
        $roleSenderApi = $auth->createRole('roleSenderApi');
        $auth->add($roleSenderApi);
        $auth->addChild($roleSenderApi, $sendMsgApi);

        // add to role "roleSuperAdmin" all permissions by role "roleSenderApi"
        $auth->addChild($roleSuperAdmin, $roleSenderApi);

        #
        # change role at user with id=1
        #

        $auth->assign($roleSuperAdmin, 1);

        #
        # need to use console command "php yii rbac/first-init" for init this structure
        #
    }
}