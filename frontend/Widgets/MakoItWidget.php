<?php

namespace frontend\Widgets;


use common\models\MakoIt;
use yii\base\Widget;

class MakoItWidget extends Widget
{

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        $makoit = MakoIt::find()->limit(1)->all();

        return $this->render('mako-it', [
            'makoit' => $makoit,
        ]);
    }

}