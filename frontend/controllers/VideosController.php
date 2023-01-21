<?php

namespace frontend\controllers;

use common\models\Video;
use yii\base\BaseObject;
use yii\data\Pagination;

class VideosController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $query = Video::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $videos = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'videos' => $videos,
            'pages' => $pages,
        ]);
    }

}
