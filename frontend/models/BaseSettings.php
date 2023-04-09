<?php


namespace frontend\models;


use yii\base\Model;

class BaseSettings extends Model
{

    public function getAltegioUrl(){
        $url = 'https://w474688.alteg.io';

        return $url;
    }

}