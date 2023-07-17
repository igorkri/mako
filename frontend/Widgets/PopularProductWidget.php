<?php

namespace frontend\Widgets;

use common\models\CategoryService;
use common\models\shop\Product;
use yii\base\Widget;
use yii\helpers\Url;

class PopularProductWidget extends Widget
{

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        $products = Product::find()->where(['popular_product' => 1])->limit(150)->all();
        return $this->render('popular_products', compact('products'));
    }

}