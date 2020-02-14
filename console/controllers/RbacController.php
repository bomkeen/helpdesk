<?php
namespace console\controllers;

use Yii;
use yii\helpers\Console;

class RbacController extends \yii\console\Controller {

public function actionInit(){

  $auth = Yii::$app->authManager;
  $auth->removeAll();
  Console::output('Removing All! RBAC.....');

  $admin = $auth->createRole('Admin');
  $admin->description = 'ผู้ดูแลระบบ';
  $auth->add($admin);

  $staff = $auth->createRole('Staff');
  $staff->description = 'ช่างและผู้ดำเงินงานซ่อม';
  $auth->add($staff);

  $office = $auth->createRole('Office');
  $office->description = 'ฝ่ายบริหารและหัวหน้างาน';
  $auth->add($office);
  
  $user = $auth->createRole('User');
  $user->description = 'เจ้าหน้าที่ทั่วไป';
  $auth->add($user);

  

  $auth->addChild($staff, $user);
  $auth->addChild($office, $staff);
  $auth->addChild($admin, $office);

//  $auth->assign($user, 1);
//  $auth->assign($staff, 2);
//  $auth->assign($office, 3);
//  $auth->assign($admin, 4);

  Console::output('Success! RBAC roles has been added.');

}

}





