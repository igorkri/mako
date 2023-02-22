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
        $makoit = MakoIt::find()->where(['id' => 1])->one();

        return $this->render('mako-it', [
            'makoit' => $makoit,
        ]);
    }

}