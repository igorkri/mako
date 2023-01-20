<?php

namespace frontend\controllers;

use common\models\Specialists;
use common\models\Team;


class TeamController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $team = Team::find()->one();
        $specialists = Specialists::find()->all();

        return $this->render('index', [
            'team' => $team,
            'specialists' => $specialists,
        ]);
    }

}
