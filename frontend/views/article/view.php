<?php


/** @var \common\models\Article $article */

?>

<!----- Стаття ----->
<section class="article">
    <p>Блог компанії</p>
    <h2><?=$article->name?></h2>
</section>
<div class="block article_text">
    <h3><?=$article->name_header?></h3>
    <?=$article->text?>
    <img src="/img/article/<?=$article->file?>" alt="">
</div>

<!----- слайдер "Акційні пропозиції" ----->
<?=\frontend\Widgets\PromotionalOffersWidget::widget()?>

