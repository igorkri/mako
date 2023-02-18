<?php

namespace frontend\Widgets;

use common\models\CategoryService;
use common\models\Contacts;
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
        $contacts = Contacts::find()->all();

        return $this->render('category-service', [
            'categories' => $categories,
            'contacts' => $contacts
        ]);
    }

}