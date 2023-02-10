<?php
/** @var yii\web\View $this */
/** @var \common\models\Article $articles */

use yii\helpers\Url;

?>
<!----- Статті ----->
<section class="blog" id="blog">
    <h3>Статті</h3>
    <div class="block">
        <?php foreach ($articles as $article): ?>
        <div class="item">
            <img src="/img/article/<?=$article->file_thumb ?>" alt="">
            <a href="<?=Url::to(['/article/view', 'slug' => $article->slug])?>"></a>
            <div class="back">
                <div class="title">
                    <p><?=date('d.m.Y', $article->created_at)?></p>
                    <h4><?=$article->name?></h4>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php
    echo \frontend\components\CustomPager::widget([
        'pagination' => $pages,
        'activePageCssClass' => 'page active',
        'disabledPageCssClass' => 'page',
        'nextPageCssClass' => 'arrow',
        'nextPageLabel' => '<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 13C3 9 7 7 7 7C7 7 3 5 1 1" stroke="" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                </svg>',
        'prevPageCssClass' => 'arrow',
        'prevPageLabel' => '<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1C5 5 1 7 1 7C1 7 5 9 7 13" stroke="" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" />
                </svg>',
        'disableCurrentPageButton' => true,
        'linkContainerOptions' => ['class' => 'displayNone'],
        'options' => [
            'class' => 'nav'
        ]
    ]);
    ?>
</section>