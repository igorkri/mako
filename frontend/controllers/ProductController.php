<?php

namespace frontend\controllers;


use common\models\shop\Category;
use common\models\shop\Producer;
use common\models\shop\Product;
use common\models\shop\Series;
use frontend\models\search\Filter;
use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\Response;

class ProductController extends Controller
{
    public function actionCatalog(): string
    {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            // открываем сессию
            $session->open();
        }
        if (!$session->has('category_id')) {
            $session->set('category_id', []);
        }
        if (!$session->has('producer_id')) {
            $session->set('producer_id', []);
        }
        if (!$session->has('series_id')) {
            $session->set('series_id', []);
        }
        if (!$session->has('popular_product')) {
            $session->set('popular_product', []);
        }
        if (!$session->has('sort')) {
            $session->set('sort', []);
        }
        $request = Yii::$app->request;
        $searchModel = new Filter();

        $product = new Product();
        $filters = [];
        $fil = $request->post('filters');
        if ($fil) {
            foreach ($fil as $k => $f) {
                if ($k === "sort") {
                    if (isset($_SESSION[$k][0])) {
                        $_SESSION[$k][0] = $f;
                    } else {
                        $_SESSION[$k][] = $f;
                    }
                } elseif (!in_array($f, $_SESSION[$k])) {
                    array_push($_SESSION[$k], $f);
                } else {
                    $this->actionRemoveSession($k, $f);
                }
            }
        }
        $filters = $product->getFilters($_SESSION);

        $count_filters = $product->getCountFilters($filters);
        $q_s = ['Filter' => $_SESSION];
        $dataProvider = $searchModel->search($q_s);
        $f_cat = []; $f_producer = []; $f_serie = [];
        foreach($dataProvider->models as $filt){
            $f_cat[] = $filt->category_id;
            $f_producer[] = $filt->producer_id;
            $f_serie[] = $filt->series_id;
        }
        $categories = Category::find()->where(['in', 'id', $f_cat])->all();
        $producer = Producer::find()->where(['in', 'id', $f_producer])->all();
        $series = Series::find()->where(['in', 'id', $f_serie])->all();
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('catalog', [
                'categories' => $categories,
                'producer' => $producer,
                'series' => $series,
                'searchModel' => $searchModel,
                'products' => $dataProvider,
                'filters' => $filters,
                'count_filters' => $count_filters,
            ]);
        }

        return $this->render('catalog', [
            'categories' => $categories,
            'producer' => $producer,
            'series' => $series,
            'searchModel' => $searchModel,
            'products' => $dataProvider,
            'filters' => $filters,
            'count_filters' => $count_filters,
        ]);
    }

    public function actionRemoveSession($key, $value): bool
    {

        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($_SESSION[$key]) {
            foreach ($_SESSION[$key] as $k => $v) {
                if ($value == $v) {
                    unset($_SESSION[$key][$k]);
                }
            }
            return true;
        }
    }

    public function actionRemoveAllSession(): bool
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        // Удаление переменной из сессии
        if ($_SESSION) {
            foreach ($_SESSION as $keys => $value) {
                if ($keys !== 'MaKo_cart') {
                    unset($_SESSION[$keys]);
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function actionClearCart(): string
    {
        if ($_SESSION) {
            foreach ($_SESSION as $keys => $value) {
                if ($keys === 'MaKo_cart') {
                    unset($_SESSION[$keys]);
                }
            }
        }
        $products = Yii::$app->cart->getPositions();
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('cart', [
            'products' => $products,
            'totalSumm' => Yii::$app->cart->getCost(),
        ]);
    }

    public function actionView($slug): string
    {
        $product = Product::find()->with('productImages')->where(['slug' => $slug])->one();

//        debug($_SESSION);

        return $this->render('view', [
            'product' => $product,
        ]);
    }

    public function actionAddToCart($product_id, $qty)
    {
        $request = Yii::$app->request;

        if ($product_id != null) {
            $product = Product::find()->with('productImages')->where(['id' => $product_id])->one();
            Yii::$app->cart->put($product, $qty);
        }
        $products = Yii::$app->cart->getPositions();

        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return [
                'products' => $products,
                'totalSumm' => Yii::$app->cart->getCost(),
                'qty' => \Yii::$app->cart->getCount(),
            ];

        }

    }

    public function actionCart()
    {
        $request = Yii::$app->request;
        $products = Yii::$app->cart->getPositions();
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('cart', [
                'products' => $products,
                'totalSumm' => Yii::$app->cart->getCost(),
            ]);
        }
    }

    public function actionRemoveCart(){

        $request = Yii::$app->request;
        if ($request->post()){
            $id = $request->post('id');
            $product = Product::findOne($id);
            if ($product) {
                \Yii::$app->cart->remove($product);
                $products = Yii::$app->cart->getPositions();
                if($request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return $this->renderAjax('cart', [
                        'products' => $products,
                        'totalSumm' => Yii::$app->cart->getCost(),
                    ]);
                }
            }
        }
    }

}
