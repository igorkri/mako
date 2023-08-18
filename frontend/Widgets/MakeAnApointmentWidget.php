<?php

namespace frontend\Widgets;

use common\models\CategoryService;
use common\models\Contacts;
use frontend\models\BaseSettings;
use yii\base\Widget;
use yii\helpers\Url;

class MakeAnApointmentWidget extends Widget
{

    public function init()
    {

    }

    public function run()
    {
        $contacts = Contacts::find()->all();
        return $this->render('make-an-appointment', [
            'contacts' => $contacts,
        ]);
    }

}