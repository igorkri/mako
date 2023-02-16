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
        $res = '';
        $popular_products = Product::find()->where(['popular_product' => 1])->limit(150)->all();
        if ($popular_products) {

            $res .= '<section class="popular_products">
            <h3>Популярні товари</h3>
            <div class="block">';
            foreach ($popular_products as $product):
                $res .= '<a href="' . Url::to(['product/view', 'slug' => $product->slug]) . '" class="item">
            <div class="img">';
                if (file_exists('/img/products/' . $product->id . '/' . $product->productImages[0]->name)):
                    $res .= '<img src="/img/products/' . $product->productImages[0]->name . '" alt="">';
                else:
                    $res .= '<img src="/img/products/' . $product->id . '/' . $product->productImages[0]->name . '" alt="">';
                endif;
                $res .= '</div>
            <div class="title">
                <p>'. $product->name .'</p>
                <div>
                    <h5>'. \Yii::$app->formatter->asCurrency($product->price) .'</h5>
                    <div class="cart">
                        <img src="/img/cart_red.svg" alt="">
                    </div>
                </div>
            </div>
        </a>';
            endforeach;
            $res .= '</div>
</section>';
        }
        echo $res;
    }

}