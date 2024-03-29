<?php


namespace console\controllers;

use common\models\CategoryService;
use common\models\Service;
use common\models\shop\Product;
use yii\console\Controller;

class ProductController extends Controller
{

    public function actionPriceDefalt(){

        $products = Product::find()->where(['is', 'price', new \yii\db\Expression('null')])->all();

        foreach($products as $product){
            $product->price = 0.00;
            $product->save(false);
        }

    }

    public function actionMain(){

        $products = Product::find()
            ->where(['main' => 0])
            ->andWhere(['group_id' => 0])
            ->all();

        foreach($products as $product){
            $product->main = 1;
            $product->save(false);
        }

    }

}