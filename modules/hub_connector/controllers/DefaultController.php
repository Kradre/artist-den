<?php

namespace app\modules\hub_connector\controllers;

use yii\web\Controller;

/**
 * Default controller for the `hub_connector` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
