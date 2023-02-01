<?php

namespace frontend\Widgets;


use common\models\Promo;
use yii\base\Widget;
use yii\helpers\Url;


class PromotionalOffersWidget extends Widget
{

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        $promos = Promo::find()->limit(150)->all();

        $res = '<section class="promotional_offers" id="promotional_offers">
  <h3>Акційні пропозиції</h3>
  <div class="slider_block">
    <div class="slider">';
        foreach ($promos as $promo):
            $res .= '<div class="item">
        <a href="'.Url::to(['promo/index']).'">
          <img src="/img/promo/' . $promo->file . '" alt="">
          <div class="title">
            ' . $promo->description . '
          </div>
        </a>
      </div>';
        endforeach;
        $res .= '</div>
    <div class="arrows"></div>
    <div class="slider-progress">
      <div class="progress"></div>
    </div>
  </div>

  <a class="more" href="'.Url::to(['promo/index']).'">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="24" height="24" rx="12" fill="" />
      <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
        stroke-linejoin="round" />
    </svg>
    Більше акцій
  </a>
</section>';

        return $res;
    }
}