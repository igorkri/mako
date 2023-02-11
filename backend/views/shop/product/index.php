<?php

use backend\widgets\BulkButtonWidget;
use common\models\shop\Product;
use kartik\grid\GridView;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var backend\models\search\shop\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Товари';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'columns' => require(__DIR__ . '/_columns.php'),
        'toolbar' => [
            ['content' =>
                Html::a('<i class="fas fa-plus"></i>', ['create'],
                    ['title' => 'Додати', 'class' => 'btn btn-success']) .
                Html::a('<i class="fas fa-redo-alt"></i>', [''],
                    ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Скинути'])
            ],
        ],
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'panel' => [
            'type' => 'primary',
            'heading' => '<i class="glyphicon glyphicon-list"></i> Список товарів',
            //                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
            'after' => BulkButtonWidget::widget([
                    'buttons' => Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Видалити',
                        ["bulkdelete"],
                        [
                            "class" => "btn btn-danger btn-xs",
                            'role' => 'modal-remote-bulk',
                            'data-confirm' => false, 'data-method' => false,// for overide yii data api
                            'data-request-method' => 'post',
                            'data-confirm-title' => 'Ви впевнені?',
                            'data-confirm-message' => 'Ви впевнені, що хочете видалити цей елемент?'
                        ]),
                ]) .
                '<div class="clearfix"></div>',
        ]
    ]) ?>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "size" => Modal::SIZE_EXTRA_LARGE,
    "scrollable" => true,
    "options" => [
        "data-bs-backdrop" => "static",
        // "class" => "modal-dialog-scrollable",
    ],
    "footer" => "",// always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>
