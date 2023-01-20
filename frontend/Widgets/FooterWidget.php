<?php

namespace frontend\Widgets;

use common\models\Contacts;
use common\models\Social;
use yii\base\Widget;
use yii\helpers\Html;

class FooterWidget extends Widget
{

    public function init()
    {
        parent::init();

    }

    public function run()
    {

        $contacts = Contacts::find()->all();
        $socials = Social::find()->all();
        $res = '<div class="top_part">';
        foreach ($contacts as $contact) :
    $res .= '<div class="line">
      <div class="address">
        <img src="/img/marker.svg" alt="">
        <p>' . $contact->address . '</p>
      </div>
      <a href="tel:' . str_replace(' ', '', $contact->phone) . '" class="tel">
        ' . $contact->icon . "\n" . $contact->phone . '
      </a>
      <p>' . $contact->salon_work_schedule . '</p>
    </div>';
    endforeach;
    $res .= '<div class="networks">';
    foreach ($socials as $social):
    $res .= "\n\t" . '<a href="#">' . "\n\t\t" . $social->icon . "\n\t\t\t" . $social->name . "\n\t" . '</a>' . "\n";
    endforeach;
    $res .= '</div>
  </div>';

    return $res;
    }
}