<?php


namespace console\controllers;


//use Faker\Provider\uk_UA\Address;
use common\models\Article;
use common\models\shop\Product;
use common\models\shop\ProductImage;
use Faker\Factory;
use yii\console\Controller;

class FakerProductController extends Controller
{

    public function actionIndex()
    {
        $faker = Factory::create('uk_UA');
        for ($i = 1; $i < 25; $i++) {
            $rand = rand(15, 25);
            $cat = rand(1, 3);
            $prod = rand(1, 3);
            $ser = rand(1, 3);
            $pop = rand(0, 1);
            $price = rand(100, 5000);

            $article = new Product();
            $article->name = $faker->realText($rand);
            $article->published = 1;
            $article->description = $faker->realText(1555);
            $article->indication = $faker->realText(555);

            $article->category_id = $cat;
            $article->producer_id = $prod;
            $article->series_id = $ser;
            $article->popular_product = $pop;
            $article->price = $price;

            if ($article->save()) {
                $im = rand(2, 8);
                for ($j = 1; $j < $im; $j++) {
                    $dir = \Yii::getAlias('@frontendWeb/img/products/');
                    if (!file_exists($dir . $article->id)) {
                        mkdir($dir . $article->id, 0777);
                    }
                    $image = new ProductImage();
                    $image->product_id = $article->id;
                    $image->name = $faker->image($dir . $article->id, 520, 520, null, false);
                    if ($image->save()) {
                    }
                }
                echo "Saved " . $article->name . PHP_EOL;
            } else {
                echo " NO Saved \n";
            }
        }

    }

}