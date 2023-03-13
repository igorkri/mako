<?php


namespace console\controllers;

use common\models\CategoryService;
use common\models\Service;
use yii\console\Controller;

class UpdateCategoryServiceController extends Controller
{

    public function actionIndex(){

        $services = Service::find()->select('id, parent_category_id, category_service_id')->all();
        if($services){
            $i = 1;
            foreach ($services as $service){
                $category = CategoryService::find()->where(['id' => $service->category_service_id])->one();
                $service->parent_category_id = $category->parent_id;
                if($service->save(false)){
                    echo $i . " | Update service id " . $service->id . PHP_EOL;
                    $i++;
                }else{
                    print_r($service->errors);
                }
            }


        }
    }

}