<?php

namespace frontend\controllers;

use common\models\Specialists;
use common\models\Team;
use common\models\TeamGallery;


class TeamController extends \yii\web\Controller
{
    public function actionIndex()
    {
//        \Yii::$app->cache->flush();
        $team = Team::find()->one();
        $specialists = Specialists::find()->all();
        $galleries = TeamGallery::find()->limit(50)->all();

        return $this->render('index', [
            'team' => $team,
            'specialists' => $specialists,
            'galleries' => $galleries,
        ]);
    }

}
