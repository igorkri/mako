<?php

/** @var \common\models\shop\Category $categories */
/** @var \common\models\shop\Producer $producer */
/** @var Series $series */

/** @var  $filters */

use common\models\shop\Category;
use common\models\shop\Producer;
use common\models\shop\Series;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
    <div class="filters">
        <div class="top_panel">
            <h4>Фільтри</h4>
            <div class="close">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2L18 18M18 2L2 18" stroke="" stroke-width="3" stroke-linecap="round" />
                </svg>
            </div>
        </div>
        <div class="head">
            <?php if ($filters and !empty($filters['category']) or !empty($filters['producers']) or !empty($filters['series'] or !empty($filters['popular_product']))): ?>
                <div class="you_choose">
                    <p>Ви обрали:</p>
                    <div class="clear" id="remove-filter">
                        Очистити
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white"/>
                            <path d="M18 18L6 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 18L18 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <?php if (!empty($filters['popular_product'])): ?>
                    <div class="clear" onclick="removeFilter('popular_product', 1)">
                        Популярні
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white"/>
                            <path d="M18 18L6 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 18L18 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                <?php endif; ?>

                <?php if (isset($filters['category'])): ?>
                    <?php foreach ($filters['category'] as $filter): ?>
                        <div class="clear" onclick="removeFilter('category_id', <?=$filter['id']?>)">
                            <?=$filter['name'] ?>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" fill="white"/>
                                <path d="M18 18L6 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 18L18 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (isset($filters['producers'])): ?>
                    <?php foreach ($filters['producers'] as $filter): ?>
                        <div class="clear" onclick="removeFilter('producer_id', <?=$filter['id']?>)">
                            <?=$filter['name'] ?>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" fill="white"/>
                                <path d="M18 18L6 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 18L18 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (isset($filters['series'])): ?>
                    <?php foreach ($filters['series'] as $filter): ?>
                        <div class="clear" onclick="removeFilter('series_id', <?=$filter['id']?>)">
                            <?=$filter['name'] ?>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" fill="white"/>
                                <path d="M18 18L6 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 18L18 6" stroke="" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            <?php endif; ?>
        </div>
        <div class="checkboxes_block">
            <h6>Категорії</h6>
            <?php foreach ($categories as $category): ?>
            <label class="checkbox">
                <?php if(isset($_SESSION['category_id'])): ?>
                <input type="checkbox" <?= in_array($category->id, $_SESSION['category_id']) ? 'checked' : '' ?> name="filter-category-<?=$category->id?>" onclick="filterCategory(<?=$category->id?>)">
                <?php else: ?>
                    <input type="checkbox" name="filter-category"  onclick="filterSerie(<?=$category->id?>)">
                <?php endif; ?>
                <span><?=$category->name?></span>
            </label>
            <?php endforeach; ?>
        </div>
        <div class="checkboxes_block">
            <h6>Виробник</h6>
            <?php foreach ($producer as $prod): ?>
            <label class="checkbox">
                <?php if(isset($_SESSION['producer_id'])): ?>
                <input type="checkbox" <?= in_array($prod->id, $_SESSION['producer_id']) ? 'checked' : '' ?> name="filter-producer" onclick="filterProducer(<?=$prod->id?>)">
                <?php else: ?>
                    <input type="checkbox" name="filter-producer"  onclick="filterSerie(<?=$prod->id?>)">
                <?php endif; ?>
                <span><?=$prod->name?></span>
            </label>
            <?php endforeach; ?>
        </div>
        <div class="checkboxes_block">
            <h6>Серія</h6>

            <?php foreach ($series as $serie): ?>
            <label class="checkbox">
                <?php if(isset($_SESSION['series_id'])): ?>
                <input type="checkbox" <?= in_array($serie->id, $_SESSION['series_id']) ? 'checked' : '' ?> name="filter-serie"  onclick="filterSerie(<?=$serie->id?>)">
                <?php else: ?>
                <input type="checkbox" name="filter-serie"  onclick="filterSerie(<?=$serie->id?>)">
                <?php endif; ?>
                <span><?=$serie->name?></span>
            </label>
            <?php endforeach; ?>

        </div>
    </div>
<?php
$js = <<<JS
$( document ).ready(function() {
    
    $('#remove-filter').click(function (){
        $.ajax({
        url: "/product/remove-all-session",
        type: "post",
        data: {},
      
        success: function(data){
            // console.log(data);
            if(data === true){
                // window.location.href = window.location.pathname;
                $.pjax.reload({ container: '#catalog-list' });
            }
        },
        error: function(){
            // $.pjax.reload({ container: '#all-page' });
        }
    });
    return false;
    }).on('submit', function(e){
    e.preventDefault();
    });
});

JS;
$this->registerJs($js);

?>


