<?php

namespace frontend\controllers;

use common\models\OrderACall;
use Yii;
use yii\web\Controller;
use yii\web\Response;


/**
 * Site controller
 */
class OrderACallController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent :: beforeAction($action);
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $signUpCheckbox = 0;
        $post = Yii::$app->request->post();
        if(isset($post['signUpCheckbox']) and $post['signUpCheckbox'] == 'on'){
            $signUpCheckbox = 1;
        }
        $order_call = new OrderACall();
        $order_call->name = $post['name'];
        $order_call->phone = $post['phone'];
        $order_call->address = $post['address'];
        $order_call->status = 'Новий';
        $order_call->comment = '';
        $order_call->signUpCheckbox = $signUpCheckbox;
        if($order_call->save()){
            return ['status' => 'success', 'messages' => '<h4>Дякуємо що вибрали нас!<br>Найближчим часом з вами зв\'яжеться менеджер</h4>'];
        }else{
            return ['status' => 'error', 'messages' => $order_call->errors];
        }
    }
}
