<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function behaviors()
    {
        return [
            'ghost-access'=> [
                'class' => 'app\modules\user\components\GhostAccessControl',
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
}
