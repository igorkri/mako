<?php
use yii\helpers\Url;

?>

<section class="mako_it">
    <h3>MaKo це</h3>
    <div class="info">
        <p><?= isset($makoit[0]->col1) ? $makoit[0]->col1 : '' ?></p>
        <p><?= isset($makoit[0]->col2) ? $makoit[0]->col2 : '' ?></p>
        <p><?= isset($makoit[0]->col3) ? $makoit[0]->col3 : '' ?></p>
        <p><?= isset($makoit[0]->col4) ? $makoit[0]->col4 : '' ?></p>
    </div>
    <a href="<?=Url::to(['team/index'])?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="24" rx="12" fill="" />
            <path d="M11 15C12 13 14 12 14 12C14 12 12 11 11 9" stroke="white" stroke-linecap="round"
                  stroke-linejoin="round" />
        </svg>
        Більше про нас
    </a>
</section>
