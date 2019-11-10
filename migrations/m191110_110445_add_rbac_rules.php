<?php

use yii\db\Migration;

/**
 * Class m191110_110445_add_rbac_rules
 */
class m191110_110445_add_rbac_rules extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $user = $auth->createRole('user');
        $auth->add($user);
        $vip = $auth->createRole('vip');
        $auth->add($vip);
        $auth->addChild($vip, $user);
        $mod = $auth->createRole('mod');
        $auth->add($mod);
        $auth->addChild($mod, $user);
        $auth->addChild($mod, $vip);
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $mod);
        //$auth->assign($admin, 1);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }
}
