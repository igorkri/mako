<?php

namespace frontend\Widgets;

use common\models\CategoryService;
use common\models\Contacts;
use frontend\models\BaseSettings;
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
        $categories = CategoryService::find()->where(['is', 'parent_id', new \yii\db\Expression('null')])->with('parent')->all();
        $contacts = Contacts::find()->all();
        $setting = new BaseSettings();

        return $this->render('category-service', [
            'categories' => $categories,
            'contacts' => $contacts,
            'url' => $setting->getAltegioUrl()
        ]);
    }

}