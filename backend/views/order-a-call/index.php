<?php

use backend\widgets\BulkButtonWidget;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap5\Modal;
use kartik\grid\GridView;
//use hoaaah\ajaxcrud\CrudAsset;
//use hoaaah\ajaxcrud\BulkButtonWidget;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderACallSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Замовлені дзвінки';
$this->params['breadcrumbs'][] = $this->title;

\backend\assets\AppAsset::register($this);
//CrudAsset::register($this);

?>
<div class="order-acall-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="fas fa-redo-alt"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Оновити']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Список замовлених дзвінків',
//                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="fas fa-trash-alt"></i>&nbsp; Видалити',
                                ["bulkdelete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Ви впевнені?',
                                    'data-confirm-message'=>'Ви впевнені, що хочете видалити цей елемент?'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "size" => Modal::SIZE_EXTRA_LARGE,
    'scrollable' => true,
    'options' => [
        "data-bs-backdrop" => "static",
        // "class" => 'modal-dialog-scrollable',
    ],
    "footer" => "", // always need it for jquery plugin
])?>
<?php Modal::end(); ?>
