<?php

namespace frontend\controllers;

use common\models\Contacts;
use common\models\OrderACall;
use common\models\Service;
use Yii;
use yii\web\Controller;


/**
 * Contacts controller
 */
class ServiceController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($slug)
    {
        $service = Service::find()->where(['slug' => $slug])->one();
        return $this->render('index', [
            'service' => $service
        ]);
    }
}
