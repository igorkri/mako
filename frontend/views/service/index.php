<?php




/** @var \common\models\Service $service */

?>
<!----- Назва категорії послуг ----->
<div class="name_service_category">
    <section class="background">
        <p class="n1"><?=$service->name?></p>
        <h1><?=$service->categoryService->name?></h1>
        <p class="n2"><?=$service->short_description?></p>
        <a href="#" class="make_appointment">
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
    <h3>Показання</h3>
    <div class="cont">
        <?=$service->indication?>
    </div>
    <h3>Ціна за процедуру</h3>
    <div class="cont">
        <p>₴<?=$service->price?></p>
    </div>
    <h3 style="margin-top: 60px;">Спеціалісти, що проводять процедуру</h3>
    <div class="specialists">
        <div class="card">
            <img src="/img/specialist.webp" alt="">
            <h6>Ім’я Прізвище</h6>
            <p>Лікар-косметолог, назва спеціалізації в один, два, три рядки</p>
        </div>
        <div class="card">
            <img src="/img/specialist.webp" alt="">
            <h6>Ім’я Прізвище</h6>
            <p>Лікар-косметолог</p>
        </div>
    </div>
    <h3>Назва відео</h3>
    <div class="cont video">
        <iframe src="https://www.youtube.com/embed/FPjJW5iTFN0" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
    </div>
</section>

<!----- галерея ----->
<h3 class="gallery_title">Фотогалерея</h3>
<div class="gallery" id="gallery">
    <div class="item">
        <img src="/img/gallery1.webp" alt="">
    </div>
    <div class="item">
        <img src="/img/gallery2.webp" alt="">
    </div>
    <div class="item">
        <img src="/img/gallery1.webp" alt="">
    </div>
    <div class="item">
        <img src="/img/gallery2.webp" alt="">
    </div>
    <div class="item">
        <img src="/img/gallery1.webp" alt="">
    </div>
    <div class="item">
        <img src="/img/gallery2.webp" alt="">
    </div>
</div>

<!----- Питання про послугу ----->
<section class="question_service">
    <h3>Питання про послугу</h3>
    <div class="question_block">
        <h6>Текст питання</h6>
        <p>Текст відповіді.</p>
        <p>В складі пептиди ботулоподібної дії, які мають омолоджуючу дію. Має зволожуючу, антиоксидантну, ботулоподібну,
            кератолітичну дію, ліфтинг-ефект.</p>
    </div>
    <div class="question_block">
        <h6>Текст питання</h6>
        <p>Текст відповіді зі списком:</p>
        <ul>
            <li><span>хроно і фотостаріння;</span></li>
            <li><span>профілактика і корекція вікових змін,а також зони навколо очей.</span></li>
        </ul>
    </div>
</section>
