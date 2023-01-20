<?php

?>
<!----- Сертифікати ----->
<section class="certificates">
    <h3>Сертифікати</h3>
    <p>Ми працюємо згідно чинного законодавтства.</p>
    <div class="block">
        <?php if ($certificates): ?>
        <?php foreach ($certificates as $certificate): ?>
        <div class="item">
            <img src="<?=Yii::$app->request->hostInfo . '/img/certificates/'. $certificate->file?>" alt="">
            <p><?=$certificate->title?></p>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
