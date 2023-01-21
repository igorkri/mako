<?php

namespace frontend\controllers;

use common\models\WorkInMako;

class WorkInMakoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $works = WorkInMako::find()->all();

        return $this->render('index', [
            'works' => $works
        ]);
    }

}
