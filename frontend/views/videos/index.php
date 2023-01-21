<?php
/** @var yii\web\View $this */
/** @var \common\models\Video $videos */
?>
<!----- Відеогалерея ----->
<section class="video_gallery" id="video_gallery">
    <h3>Відеогалерея</h3>
    <div class="block">
        <?php if ($videos): ?>
            <?php foreach ($videos as $video): ?>
                <div class="video">
                    <iframe width="" height="" src="https://www.youtube.com/embed/<?= $video->url_file ?>"
                            title="<?= $video->title ?>" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    <div class="title">
                        <p><?= $video->data ?></p>
                        <h2><?= $video->title ?></h2>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
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
    </div>
</section>
