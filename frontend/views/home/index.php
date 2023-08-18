<?php

/** @var yii\web\View $this */

use frontend\Widgets\MakoItWidget;
use frontend\Widgets\PopularServiceWidget;
use yii\helpers\Url;

$this->title = 'Косметологічний центр МаКо';
?>
<!----- Баннер ----->
<section class="banner">
    <div class="light_background">
        <img src="/img/MaKo_banner.svg" alt="">
        <h2>Ви вмились<br> і краса лишилась</h2>
        <?php echo \frontend\Widgets\MakeAnApointmentWidget::widget()?>
    </div>
</section>

<!----- Мако це ----->

<!----- слайдер "Акційні пропозиції" ----->
<?=$this->render('promotional_offers', ['promos' => $promos])?>

<!----- слайдер "Популярні послуги" ----->
<?php echo PopularServiceWidget::widget() ?>

<!----- awards ----->
<section class="awards">
    <div class="block">
        <div class="item">
            <div class="img">
                <img src="/img/awards1.png" alt="">
            </div>
            <div class="text">
                <h5>«Вибір країни 2022»</h5>
                <p>Мережа Косметологічних Центрів МаКо нагороджується у номінації «Найкращий центр лазерної епіляції»
                </p>
            </div>
        </div>
        <div class="item">
            <div class="img">
                <img src="/img/awards2.png" alt="">
            </div>
            <div class="text">
                <h5>«Знак Якості 2022»</h5>
                <p>Мережа Косметологічних Центрів МаКо нагороджується у номінації «Надання найякісніших товарів і
                    послуг» та як «Найкраще
                    підприємство 2022»
                </p>
            </div>
        </div>
    </div>
</section>

<!----- слайдер "Подарункові сертіфікати" ----->
<?php if($sertificat): ?>
<section class="gift_certificates">
    <div class="block">
        <div class="pict">
            <div class="overlay">
                <h3>
                    <?=$sertificat->name?>
                </h3>
                <img src="/img/MaKo_logo1.png" style="width:165px;" alt="">
            </div>
        </div>
        <div class="info">
            <div class="prices">
                <?php if(!empty($sertificat->if_empty_price)): ?>
                <h1>
                    <?=$sertificat->if_empty_price?>
                </h1>
                <?php else: ?>
                <?=$sertificat->price_1 ? '<h1>₴' . Yii::$app->formatter->asDecimal($sertificat->price_1, 0) . '</h1>' : '' ?>
                <?=$sertificat->price_2 ? '<h1>₴' . Yii::$app->formatter->asDecimal($sertificat->price_2, 0) . '</h1>' : '' ?>
                <?=$sertificat->price_3 ? '<h1>₴' . Yii::$app->formatter->asDecimal($sertificat->price_3, 0) . '</h1>' : '' ?>
                <?=$sertificat->price_4 ? '<h1>₴' . Yii::$app->formatter->asDecimal($sertificat->price_4, 0) . '</h1>' : '' ?>
                <?=$sertificat->price_5 ? '<h1>₴' . Yii::$app->formatter->asDecimal($sertificat->price_5, 0) . '</h1>' : '' ?>
                <?php endif; ?>
            </div>
            <?=$sertificat->info?>
        </div>
    </div>
</section>

<style>
    section.gift_certificates .block .pict {
        background: url(../img/certificates/<?=$sertificat->file?>) 50%;
        background-size: cover;
    }
</style>

<?php endif; ?>