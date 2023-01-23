<?php

namespace frontend\Widgets;

use common\models\CategoryService;
use yii\base\Widget;
use yii\helpers\Url;

class CategoryServiceWidget extends Widget
{

    public function init()
    {
        parent::init();

    }

    public function run()
    {

        $categories = CategoryService::find()->all();
        $res = '<div class="services_block">
    <div class="services_content">
      <div class="services_categories">';
        foreach ($categories as $category):
            $res .= '<a href="#">
          <img src="/img/arrow_right_red.svg" alt="">
          <p>' . $category->name . '</p>
        </a>';
        endforeach;
        $res .= '</div>
      <div class="services_names">
        <div class="title">
          <img src="/img/circle-white-arrow.svg" alt="">
          <h6></h6>
        </div>
        <div class="items">';
        foreach ($categories as $category):
            foreach ($category->services as $service):
                $res .= '<a href="' . Url::to(['service/index', 'slug' => $service->slug]) . '">' . $service->name . '</a>';
            endforeach;
        endforeach;
        $res .= '</div>
      </div>
      <div class="header_contacts">
        <div class="address">
          <img src="/img/marker.svg" alt="">
          <p>м. Київ, проспект Леся Курбаса, 5в</p>
        </div>
        <a href="tel:+380689664256" class="phone">
          <img src="/img/vodafone.svg" alt="">
          <p>+38 068 966 42 56</p>
        </a>
        <div class="address">
          <img src="/img/marker.svg" alt="">
          <p>м. Київ, вулиця Михайла Максимовича, 3г</p>
        </div>
        <a href="tel:+380689664257" class="phone">
          <img src="/img/vodafone.svg" alt="">
          <p>+38 068 966 42 57</p>
        </a>
        <a href="#" class="make_appointment">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="48" height="48" rx="24" fill="" />
            <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
          Записатись на прийом
        </a>
      </div>
    </div>
  </div>';
        return $res;
    }

}