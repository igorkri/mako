<?php

namespace frontend\controllers;

use common\models\CategoryService;
use common\models\Contacts;
use common\models\OrderACall;
use common\models\Service;
use common\models\Specialists;
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

    public function actionList($slug){
        Yii::$app->cache->flush();
        $category = CategoryService::find()->where(['slug' => $slug])->one();
        $services = Service::find()->where(['category_service_id' => $category->id])->all();
        return $this->render('list', [
            'services' => $services,
            'category' => $category
        ]);
    }
}
