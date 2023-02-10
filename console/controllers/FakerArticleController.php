<?php


namespace console\controllers;


//use Faker\Provider\uk_UA\Address;
use common\models\Article;
use Faker\Factory;
use yii\console\Controller;

class FakerArticleController extends Controller
{

    public function actionIndex(){
        $faker = Factory::create('uk_UA');
        for($i = 1; $i < 15; $i++){
            $rand = rand(15, 25);
            $rand2 = rand(15, 35);
            $article = new Article();
            $article->name = $faker->realText($rand);
            $article->name_header = $faker->realText($rand2);
            $article->text = $faker->realText(1555);
            $article->file = $faker->image(\Yii::getAlias('@frontendWeb/img/article'), 1024, 481, null, false);
            $article->file_thumb = $faker->image(\Yii::getAlias('@frontendWeb/img/article'), 524, 524, null, false);
            if($article->save()){
                echo "Saved " . $article->name . PHP_EOL;
            }else{
                echo " NO Saved \n";
            }
        }

    }

}