<?php

use yii\bootstrap5\Modal;
use yii\helpers\Html;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/img/MaKo.svg" alt="Logo" class="elevation-3" style="opacity: .8; margin-right: 55px">
        <span class="brand-text font-weight-light"> Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
<!--        <div class="form-inline">-->
<!--            <div class="input-group" data-widget="sidebar-search">-->
<!--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">-->
<!--                <div class="input-group-append">-->
<!--                    <button class="btn btn-sidebar">-->
<!--                        <i class="fas fa-search fa-fw"></i>-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
//                    ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
//                    ['label' => 'Yii2 PROVIDED', 'header' => true],
//                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
//                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
//                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],

                    ['label' => 'Сайт', 'header' => true],
                    ['label' => 'Курс', 'icon' => 'dot-circle', 'url' => ['/exchange-rates/index']],
                    ['label' => 'Замовлені дзвінки', 'icon' => 'dot-circle', 'url' => ['/order-a-call/index']],
                    ['label' => 'Список акцій', 'iconStyle' => 'far', 'url' => ['/promo/index']],
                    ['label' => 'Сертифікати гол. стор.', 'iconStyle' => 'far', 'url' => ['/promo-home/view', 'id' => 1]],
                    [
                        'label' => 'Про нас',
                        'items' => [
                            ['label' => 'Сертифікати', 'iconStyle' => 'far', 'url' => ['/certificates/index']],
                            ['label' => 'Команда',
                                'items' => [
                                        ['label' => 'Команда', 'icon' => 'dot-circle', 'url' => ['/team/index']],
                                        ['label' => 'Спеціалісти', 'icon' => 'dot-circle', 'url' => ['/specialist/index']],
                                        ['label' => 'Галерея', 'icon' => 'dot-circle', 'url' => ['/team-gallery/index']],
                                ]
                            ],
                            ['label' => 'Відео', 'iconStyle' => 'far', 'url' => ['/video/index']],
                            ['label' => 'Статті', 'iconStyle' => 'far', 'url' => ['/article/index']],
                            ['label' => 'Робота в МаКо', 'iconStyle' => 'far', 'url' => ['/work/index']],
                            ['label' => 'Навчання в МаКо', 'iconStyle' => 'far', 'url' => ['/learning-in-mako/index']],
                        ]
                    ],
                    ['label' => 'Відгуки', 'iconStyle' => 'far', 'url' => ['/reviews/index']],
                    ['label' => 'Контакти', 'icon' => 'dot-circle', 'url' => ['/contacts/index']],
                    ['label' => 'Social', 'icon' => 'dot-circle', 'url' => ['/social/index']],
                    ['label' => 'Категорії послуг', 'icon' => 'dot-circle', 'url' => ['/category-service/index']],
                    ['label' => 'Послуги', 'icon' => 'dot-circle', 'url' => ['/service/index']],
                    ['label' => 'MaKo це', 'icon' => 'dot-circle', 'url' => ['/mako-it/index']],
                    ['label' => 'Препарати', 'icon' => 'dot-circle', 'url' => ['/preparat/index']],
                    ['label' => 'Магазин', 'header' => true],
                    ['label' => 'Магазин',
                        'items' => [
                            ['label' => 'Замовлення', 'icon' => 'dot-circle', 'url' => ['/shop/order/index']],
                            ['label' => 'Список товарів', 'icon' => 'dot-circle', 'url' => ['/shop/product/index']],
                            ['label' => 'Виробники', 'icon' => 'dot-circle', 'url' => ['/shop/producer/index']],
                            ['label' => 'Категорії товарів', 'icon' => 'dot-circle', 'url' => ['/shop/category/index']],
                            ['label' => 'Серії', 'icon' => 'dot-circle', 'url' => ['/shop/series/index']],
//                            ['label' => 'Статус', 'icon' => 'dot-circle', 'url' => ['/shop/status']],
                        ]
                    ],

                ],
            ]);
            ?>
            <hr>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "size" => Modal::SIZE_EXTRA_LARGE,
    "scrollable" => true,
    "options" => [
        "data-bs-backdrop" => "static",
        // "class" => "modal-dialog-scrollable",
    ],
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>