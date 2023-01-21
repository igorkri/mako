<?php

namespace frontend\controllers;



use common\models\LearningInMako;

class LearningInMakoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $learnings = LearningInMako::find()->all();

        return $this->render('index', [
            'learnings' => $learnings
        ]);
    }

}
