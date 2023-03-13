<?php

namespace frontend\Widgets;

use common\models\CategoryService;
use common\models\Contacts;
use common\models\Preparat;
use common\models\Service;
use common\models\shop\Series;
use yii\base\Widget;
use yii\helpers\Url;

class PopularServiceWidget extends Widget
{

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        $services = Service::find()->with('serviceGalleries')->where(['popular' => 1])->limit(21)->all();
        $preparats = Preparat::find()->all();
//        debug($services);

        return $this->render('popular-service', [
            'services' => $services,
            'preparats' => $preparats,
        ]);
    }

}