<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class HomeController extends Controller
{

    /**
     * {@inheritdoc}
     */


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
