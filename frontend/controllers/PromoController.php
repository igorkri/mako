<?php

namespace frontend\controllers;

use common\models\Promo;
use frontend\models\BaseSettings;
use yii\data\Pagination;

class PromoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Promo::find()->where(['published' => 1]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $promos = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $setting = new BaseSettings();

        return $this->render('index', [
            'promos' => $promos,
            'pages' => $pages,
            'url' => $setting->getAltegioUrl()
        ]);
    }

}
