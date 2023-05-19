<?php

namespace frontend\controllers;

use common\models\NovaPoshta;
use common\models\shop\Order;
use common\models\shop\OrderItem;
use common\models\shop\Product;
use LisDev\Delivery\NovaPoshtaApi2;
use Yii;
use yii\web\Response;

class OrderController extends \yii\web\Controller
{
//$this->enableCsrfValidation = false;

    public function actionIndex()
    {

        $request = Yii::$app->request;
        $products = Yii::$app->cart->getPositions();
        $order = new Order();
        if($request->post() && $order->validate()){
            $post = $request->post();
            $order->fio = $post['name'];
            $order->phone = $post['phone'];
            $order->note = $post['note'];
            $order->city = $post['new_post'] == '1' ? 'Самовивіз' : $post['Order']['city'];;
            $order->address = $post['new_post'] == '1' ? '' : $post['Order']['address'];;
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
                'order' => $order
            ]);
        }
        return $this->render('index', [
            'products' => $products,
            'totalSumm' => Yii::$app->cart->getCost(),
            'order' => $order
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

    public function actionQty(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ['qty' => Yii::$app->cart->getCount()];
    }

    public function actionCity($q = null)
    {
        /**
         * Запись клиента в бд для статистики
         */
        $np = new NovaPoshtaApi2(
            NovaPoshta::KEY_NP,
            'ua', // Язык возвращаемых данных: ru (default) | ua | en
            FALSE, // При ошибке в запросе выбрасывать Exception: FALSE (default) | TRUE
            'file_get_content' // Используемый механизм запроса: curl (defalut) | file_get_content
        // 'curl' // Используемый механизм запроса: curl (defalut) | file_get_content
        );

        //        $this->enableCsrfValidation = false;
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '', 'area' => '']];
        if (!is_null($q)) {

            $cities = $np->getCities(0, $q, '');
            $arrs = [];
            foreach ($cities['data'] as $value) {
                $arr = [];
                $arr['id'] = $value['Ref'];
                $arr['text'] = $value['Description'];
                $arr['area'] = $value['AreaDescription'];

                $arrs[] = $arr;
            }
            $out['results'] = $arrs;
            $list = '';
            foreach ($out['results'] as $result){
                $desc = str_replace(["'", '"'], "\'", strval($result['text']));
                $list .= "\t" . '<span 
                id="'.$result['id'].'" 
                onclick="addressInput('. '\'' . $result['id']. '\'' . ', '. '\'' . $desc.'\'' . ')"
                >'.$desc.'</span>' . "\n";
            }
        } else {
            $out['results'] = ['id' => '', 'text' => '', 'area' => ''];
        }
        return $list;
    }

    public function actionSubNp($id)
    {
        /**
         * Запись клиента в бд для статистики
         */

        $np = new NovaPoshtaApi2(
            NovaPoshta::KEY_NP,
            'ua', // Язык возвращаемых данных: ru (default) | ua | en
            FALSE, // При ошибке в запросе выбрасывать Exception: FALSE (default) | TRUE
            'file_get_content' // Используемый механизм запроса: curl (defalut) | file_get_content
        // 'curl' // Используемый механизм запроса: curl (defalut) | file_get_content
        );

        Yii::$app->response->format = Response::FORMAT_JSON;
        $warehouses = $np->getWarehouses(strval($id));
        $list = [];
        foreach ($warehouses['data'] as $warehous) {
//            return $warehous;
            $ref = strval($warehous['Ref']);
            $desc = str_replace(["'", '"'], "\'", strval($warehous['Description']));
//            $desc = strval($warehous['Description']);
                $l = [];
                $l['ref'] = $ref;
                $l['desc'] = $desc;
                $list[] = $l;
        }
        return $list;
    }
}
