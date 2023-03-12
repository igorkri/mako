<?php

namespace frontend\controllers;

use common\models\OrderACall;
use common\models\Promo;
use common\models\PromoHome;
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
//        $order_call = new OrderACall();
        $promos = Promo::find()->where(['published' => 1])->all();
        $sertificat = PromoHome::find()->one();
//        Yii::$app->params['order_a_call'] = $order_call;
        return $this->render('index', [
            'promos' => $promos,
            'sertificat' => $sertificat
        ]);
    }
}
