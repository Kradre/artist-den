<?php

namespace app\modules\hub\controllers;

use yii\web\Controller;

/**
 * Sync controller for the `hub` module
 */
class SyncController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionInit()
    {
        return $this->render('index');
    }
}
