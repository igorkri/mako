<?php

/** @var common\models\Contacts $contacts */

?>

<!----- Контакти ----->
<div class="contacts" id="contacts">
    <h3>Адреси салонів</h3>
    <div class="cont">
        <?php foreach ($contacts as $contact): ?>
            <?php if ($contact->id % 2 !== 0): ?>
                <div class="half left">
                    <div class="head">
                        <div>
                            <img src="img/marker.svg" alt="">
                            <?=$contact->address?>
                        </div>
                        <a href="tel:<?=str_replace(' ', '', $contact->phone);?>">
                            <img src="img/vodafone-red.svg" alt="">
                            <?=$contact->phone?>
                        </a>
                        <div><?=$contact->salon_work_schedule?></div>
                    </div>
                    <div class="map">
                        <iframe
                                src="<?=$contact->maps?>"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            <?php else: ?>
                <div class="half">
                    <div class="head">
                        <div>
                            <img src="img/marker.svg" alt="">
                            <?=$contact->address?>
                        </div>
                        <a href="tel:<?=str_replace(' ', '', $contact->phone);?>">
                            <img src="img/vodafone-red.svg" alt="">
                            <?=$contact->phone?>
                        </a>
                        <div><?=$contact->salon_work_schedule?></div>
                    </div>
                    <div class="map">
                        <iframe
                                src="<?=$contact->maps?>"
                                width="" height="" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
