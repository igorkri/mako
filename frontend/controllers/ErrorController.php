<?php


namespace frontend\controllers;


use yii\web\Controller;

class ErrorController extends Controller
{
//    $this->layout = 'main-login';
    public $layout = 'error';
    public function actions()
    {
        return [
            'index' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

//    public function actionError(){
//
//        $this->render('index');
//    }

}