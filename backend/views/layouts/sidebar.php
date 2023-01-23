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
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],

                    ['label' => 'Сайт', 'header' => true],
                    ['label' => 'Замовлені дзвінки', 'icon' => 'dot-circle', 'url' => ['/order-a-call']],
                    ['label' => 'Акції', 'icon' => 'dot-circle', 'url' => ['/promo']],
                    [
                        'label' => 'Про нас',
                        'items' => [
                            ['label' => 'Сертифікати', 'iconStyle' => 'far', 'url' => ['/certificates']],
                            ['label' => 'Команда',
                                'items' => [
                                        ['label' => 'Команда', 'icon' => 'dot-circle', 'url' => ['/team']],
                                        ['label' => 'Спеціалісти', 'icon' => 'dot-circle', 'url' => ['/specialist']],
                                        ['label' => 'Галерея', 'icon' => 'dot-circle', 'url' => ['/team-gallery']],
                                ]
                            ],
                            ['label' => 'Відео', 'iconStyle' => 'far', 'url' => ['/video']],
                            ['label' => 'Статті', 'iconStyle' => 'far', 'url' => ['/blog']],
                            ['label' => 'Робота в МаКо', 'iconStyle' => 'far', 'url' => ['/work/index']],
                            ['label' => 'Навчання в МаКо', 'iconStyle' => 'far', 'url' => ['/learning-in-mako/index']],
                        ]
                    ],
                    ['label' => 'Відгуки', 'icon' => 'dot-circle', 'url' => ['/reviews']],
                    ['label' => 'Контакти', 'icon' => 'dot-circle', 'url' => ['/contacts']],
                    ['label' => 'Social', 'icon' => 'dot-circle', 'url' => ['/social']],
                    ['label' => 'Категорії послуг', 'icon' => 'dot-circle', 'url' => ['/category-service']],
                    ['label' => 'Послуги', 'icon' => 'dot-circle', 'url' => ['/service']],
//                    ['label' => 'Головна сторінка',
//                        'items' => [
//                            ['label' => 'Баннер', 'icon' => 'dot-circle', 'url' => ['/banner']],
//                            ['label' => 'Мако це', 'icon' => 'dot-circle', 'url' => ['/mako-it']],
//                            ['label' => '', 'icon' => 'dot-circle', 'url' => ['/']],
//                        ]
//                    ],

                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>