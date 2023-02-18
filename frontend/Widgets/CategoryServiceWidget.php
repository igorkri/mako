<?php

namespace frontend\Widgets;

use common\models\CategoryService;
use yii\base\Widget;
use yii\helpers\Url;

class CategoryServiceWidget extends Widget
{

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        $categories = CategoryService::find()->with('services')->all();
        return $this->render('category-service', ['categories' => $categories]);
    }

}