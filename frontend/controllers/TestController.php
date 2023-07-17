<?php

namespace frontend\controllers;

use yii\web\Controller;


/**
 * Site controller
 */
class TestController extends Controller
{

    public $layout = 'test-main';
    public function actionIndex()
    {
        return $this->render('index');
    }
}
