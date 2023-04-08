<?php


namespace common\models;


use LisDev\Delivery\NovaPoshtaApi2;
use yii\base\Model;

class NovaPoshta extends Model
{

    const KEY_NP = 'd6fc7db8fda0ded16117f24c58e2bd8d';

    public function getNp(){
        $np = new NovaPoshtaApi2(
            self::KEY_NP,
            'ua', // Язык возвращаемых данных: ru (default) | ua | en
            true, // При ошибке в запросе выбрасывать Exception: FALSE (default) | TRUE
            'curl' // Используемый механизм запроса: curl (defalut) | file_get_content
        );
        return $np;
    }

}