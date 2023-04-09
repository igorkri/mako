<?php




/** @var \common\models\Service $service */

?>
<!----- Назва категорії послуг ----->
<div class="name_service_category">
    <section class="background">
        <p class="n1"><?=$service->categoryService->name?></p>
        <h1><?=$service->name?></h1>
        <p class="n2"><?=$service->short_description?></p>
        <a href="<?=$url?>" class="make_appointment">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="48" height="48" rx="24" fill="" />
                <path d="M22 30C24 26 28 24 28 24C28 24 24 22 22 18" stroke="" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
            </svg>
            Записатись на прийом
        </a>
    </section>
</div>

<!----- Назва категорії послуг ----->
<section class="service_description" id="service_description">
    <h3>Опис послуги</h3>
    <div class="cont">
        <?=$service->description?>
    </div>
    <?php if($service->indication): ?>
    <h3>Показання</h3>
    <div class="cont">
        <?=$service->indication?>
    </div>
    <?php endif; ?>
    <h3>Ціна за процедуру</h3>
    <div class="cont">
        <?=$service->price?>
    </div>
    <?php if($service->serviceSpecialists): ?>
    <h3 style="margin-top: 60px;">Спеціалісти, що проводять процедуру</h3>
    <div class="specialists">
        <?php foreach ($service->serviceSpecialists as $specialist): ?>
        <div class="card">
            <img src="/img/specialists/<?=$specialist->specialist->photo?>" alt="">
            <h6><?=$specialist->specialist->profession?></h6>
            <p><?=$specialist->specialist->fio?></p>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php if ($service->serviceVideos): ?>
    <h3>Назва відео</h3>
    <div class="cont video">
        <?php foreach ($service->serviceVideos as $video): ?>
            <iframe src="https://www.youtube.com/embed/<?=$video->url?>" title="<?=$video->name?>" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>

<!----- галерея ----->
<h3 class="gallery_title">Фотогалерея</h3>
<div class="gallery" id="gallery">
    <?php foreach ($service->serviceGalleries as $gallery): ?>
    <div class="item">
        <img src="/img/service-photo/<?=$gallery->file?>" alt="">
    </div>
    <?php endforeach; ?>
</div>
<?php if($service->serviceQuestions): ?>
<!----- Питання про послугу ----->
<section class="question_service">
    <h3>Питання про послугу</h3>
    <?php foreach ($service->serviceQuestions as $question): ?>
    <div class="question_block">
        <h6><?=$question->question?></h6>
        <p><?=$question->reply?></p>
    </div>
    <?php endforeach; ?>
</section>
<?php endif; ?>

<!----- слайдер "Акційні пропозиції" ----->
<?=\frontend\Widgets\PromotionalOffersWidget::widget()?>
