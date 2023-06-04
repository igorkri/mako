<?php


namespace console\controllers;

use common\models\CategoryService;
use common\models\NovaPoshta;
use common\models\Service;
use common\models\shop\NpCity;
use common\models\shop\NpWarehouse;
use common\models\shop\Product;
use LisDev\Delivery\NovaPoshtaApi2;
use yii\console\Controller;
use yii\helpers\Console;

class NpController extends Controller
{

    public function actionCity()
    {

        /**
         * Запись клиента в бд для статистики
         */
        $np = new NovaPoshtaApi2(
            NovaPoshta::KEY_NP,
            'ua', // Язык возвращаемых данных: ru (default) | ua | en
            FALSE, // При ошибке в запросе выбрасывать Exception: FALSE (default) | TRUE
            'file_get_content' // Используемый механизм запроса: curl (defalut) | file_get_content
        // 'curl' // Используемый механизм запроса: curl (defalut) | file_get_content
        );

        $cities = $np->getCities();
        $is = 1;
        $i = 1;
        foreach ($cities['data'] as $city) {
            $iss_city = NpCity::find()->where(['ref' => $city['Ref']])->one();
            if (!$iss_city) {
                $new_city = new NpCity();
                $new_city->ref = $city['Ref'];
                $new_city->name = $city['Description'];
                $new_city->area = $city['AreaDescription'];
                if ($new_city->save()) {
                    $this->stdout("\n\r " . $i . " | " . $new_city->name, Console::FG_GREEN, Console::UNDERLINE) . PHP_EOL;
                    $i++;
                } else {
                    print_r($new_city->errors);
                }
            } else {
                $this->stdout("\n\r " . $is . " | " . $iss_city->name, Console::FG_RED, Console::UNDERLINE) . PHP_EOL;
                $is++;
            }
        }
    }

    public function actionWarehouse()
    {
        /**
         * Запись клиента в бд для статистики
         */
        $np = new NovaPoshtaApi2(
            NovaPoshta::KEY_NP,
            'ua', // Язык возвращаемых данных: ru (default) | ua | en
            FALSE, // При ошибке в запросе выбрасывать Exception: FALSE (default) | TRUE
            'file_get_content' // Используемый механизм запроса: curl (defalut) | file_get_content
        // 'curl' // Используемый механизм запроса: curl (defalut) | file_get_content
        );
        $cities = NpCity::find()->select('id, ref')->asArray()->all();
        $j = 1;
        foreach ($cities as $city) {
            $warehouses = $np->getWarehouses(strval($city['ref']));
            $is = 1;
            $i = 1;
            foreach ($warehouses['data'] as $warehouse) {
                $is_warehouse = NpWarehouse::find()->where(['ref' => $warehouse['Ref']])->one();
                if (!$is_warehouse) {
                    $new_warehouse = new NpWarehouse();
                    $new_warehouse->city_id = $city['id'];
                    $new_warehouse->ref = $warehouse['Ref'];
                    $new_warehouse->cityRef = $warehouse['CityRef'];
                    $new_warehouse->shortAddress = $warehouse['ShortAddress'];
                    $new_warehouse->cityDescription = $warehouse['CityDescription'];
                    $new_warehouse->description = $warehouse['Description'];
                    if ($new_warehouse->save()) {
                        $this->stdout("\n\r" . $j . " | " . $i . " | " . $new_warehouse->description . " | " . $new_warehouse->shortAddress, Console::FG_GREEN, Console::UNDERLINE) . PHP_EOL;
                        $i++;
                    } else {
                        print_r($new_warehouse->errors);
                    }
                } else {
                    $this->stdout("\n\r " . $j . " | " . $is . " | " . $is_warehouse->description . " | " . $is_warehouse->shortAddress, Console::FG_RED, Console::UNDERLINE) . PHP_EOL;
                    $is++;
                }
            }
            $j++;
        }
    }

}