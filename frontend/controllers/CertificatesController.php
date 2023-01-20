<?php

namespace frontend\controllers;

use common\models\Certificates;
use common\models\Promo;
use yii\data\Pagination;

class CertificatesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $certificates = Certificates::find()->all();

        return $this->render('index', [
            'certificates' => $certificates,
        ]);
    }

}
