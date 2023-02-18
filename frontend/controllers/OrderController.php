<?php

namespace frontend\controllers;

use common\models\shop\Product;
use Yii;
use yii\web\Response;

class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $products = Yii::$app->cart->getPositions();
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('index', [
                'products' => $products,
                'totalSumm' => Yii::$app->cart->getCost(),
            ]);
        }
        return $this->render('index', [
            'products' => $products,
            'totalSumm' => Yii::$app->cart->getCost(),
        ]);
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
                    return $this->renderAjax('index', [
                        'products' => $products,
                        'totalSumm' => Yii::$app->cart->getCost(),
                    ]);
                }
            }
        }
        return $this->redirect('/product/catalog');


    }
}
