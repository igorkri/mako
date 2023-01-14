<?php

namespace frontend\controllers;

use common\models\OrderACall;
use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class HomeController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $order_call = new OrderACall();
        Yii::$app->params['order_a_call'] = $order_call;
        return $this->render('index', [

        ]);
    }
}