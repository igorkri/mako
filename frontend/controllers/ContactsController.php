<?php

namespace frontend\controllers;

use common\models\Contacts;
use common\models\OrderACall;
use Yii;
use yii\web\Controller;


/**
 * Contacts controller
 */
class ContactsController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $contacts = Contacts::find()->all();
        return $this->render('index', [
            'contacts' => $contacts
        ]);
    }
}
