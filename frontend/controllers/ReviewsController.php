<?php

namespace frontend\controllers;

use common\models\Reviews;

class ReviewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $reviews = Reviews::find()->all();
        return $this->render('index', ['reviews' => $reviews]);
    }

}
