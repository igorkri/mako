<?php

namespace frontend\controllers;

use common\models\shop\Order;
use common\models\shop\OrderItem;
use common\models\shop\Product;
use Yii;
use yii\web\Response;

class OrderController extends \yii\web\Controller
{
//$this->enableCsrfValidation = false;

    public function actionIndex()
    {
        $request = Yii::$app->request;
        $products = Yii::$app->cart->getPositions();
        if($request->post()){
            $post = $request->post();
            $order = new Order();
            $order->fio = $post['name'];
            $order->phone = $post['phone'];
            $order->note = $post['note'];
            if($order->save()){
                foreach ($products as $product){
                    $order_item = new OrderItem();
                    $order_item->order_id = $order->id;
                    $order_item->product_id = $product->getId();
                    $order_item->quantity = $product->getQuantity();
                    $order_item->price = $product->price;
                    if($order_item->save()){}
                }
            }
            \Yii::$app->cart->removeAll();
            return $this->redirect(['confirm']);
        }
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

    public function actionConfirm(){

        return $this->render('confirm');
    }
}
