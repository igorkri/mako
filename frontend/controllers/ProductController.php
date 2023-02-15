<?php

namespace frontend\controllers;


use common\models\shop\Category;
use common\models\shop\Producer;
use common\models\shop\Product;
use common\models\shop\Series;
use frontend\models\search\Filter;
use Yii;
use yii\base\BaseObject;
use yii\helpers\Html;
use yii\web\Response;

class ProductController extends \yii\web\Controller
{
    public function actionCatalog()
    {
        $session = Yii::$app->session;
        if(!$session->isActive){
            // открываем сессию
            $session->open();
            $session->set('category_id', []);
            $session->set('producer_id', []);
            $session->set('series_id', []);
        }
        $request = Yii::$app->request;
        $searchModel = new Filter();

        $categories = Category::find()->all();
        $producer = Producer::find()->all();
        $series = Series::find()->all();
        $product = new Product();
        $filters = [];
        $fil = $request->post('filters');
        if($fil){
            foreach ($fil as $k => $f){
                if(!in_array($f, $_SESSION[$k])){
                    array_push($_SESSION[$k], $f);
                }else{
                    $this->actionRemoveSession($k, $f);
                }
            }
        }
        $filters = $product->getFilters($_SESSION);
        $q_s = ['Filter' => $_SESSION];
        $dataProvider = $searchModel->search($q_s);
//debug($_SESSION);

        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('catalog', [
                'categories' => $categories,
                'producer' => $producer,
                'series' => $series,
                'searchModel' => $searchModel,
                'products' => $dataProvider,
                'filters' => $filters,
            ]);
        }

        return $this->render('catalog', [
            'categories' => $categories,
            'producer' => $producer,
            'series' => $series,
            'searchModel' => $searchModel,
            'products' => $dataProvider,
            'filters' => $filters,
        ]);
    }

    public function actionRemoveSession($key, $value){

        Yii::$app->response->format = Response::FORMAT_JSON;
        if($_SESSION[$key]){
            foreach ($_SESSION[$key] as $k => $v){
                if($value == $v){
                    unset($_SESSION[$key][$k]);
                }
            }
            return true;
        }
    }

    public function actionRemoveAllSession(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        // Удаление переменной из сессии
        if($_SESSION){
            foreach ($_SESSION as $keys => $value){
                foreach ($value as $key => $v){
                    unset($_SESSION[$keys][$key]);
                }
            }
            return true;
        }else{
            return false;
        }
    }

}
