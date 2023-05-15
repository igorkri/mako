<?php

namespace backend\controllers\shop;

use common\models\shop\GroupProducts;
use common\models\shop\Product;
use backend\models\search\shop\ProductSearch;
use Yii;
use yii\base\BaseObject;
use yii\bootstrap5\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
//        \Yii::$app->cache->flush();
        $model = Product::find()
            ->with('productImages')
            ->where(['id' => $id])->one();
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['shop/product-image/create', 'product_id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        \Yii::$app->cache->flush();
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDuplicate($id = null)
    {
        \Yii::$app->cache->flush();
        if($id){
            $model = $this->findModel($id);
        }

        if ($this->request->isPost) {
            $model_new = new Product();
            if ($model_new->load($this->request->post()) && $model_new->save()) {
                return $this->redirect(['view', 'id' => $model_new->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->productImages) {
            $dir = \Yii::getAlias('@frontendWeb/img/products/');
            foreach ($model->productImages as $productImage) {
                if (file_exists($dir . $model->id . '/' . $productImage->name)) {
                    unlink($dir . $model->id . '/' . $productImage->name);
                } else {
                    unlink($dir . $productImage->name);
                }
                $productImage->delete();
            }
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    public function actionBulkdelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            if ($model->productImages) {
                $dir = \Yii::getAlias('@frontendWeb/img/products/');
                foreach ($model->productImages as $productImage) {
                    if (file_exists($dir . $model->id . '/' . $productImage->name)) {
                        unlink($dir . $model->id . '/' . $productImage->name);
                    } else {
                        unlink($dir . $productImage->name);
                    }
                }
            }
            $model->delete();
        }
        return $this->redirect(['index']);
    }
    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionUpdateGroup()
    {
        $request = Yii::$app->request;
        $model = new GroupProducts();
        $pks = explode(',', $request->post('pks'));

        $products = Product::find()->where(['id' => $pks])->all();
        $param = $request->post('GroupProducts');
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($request->isAjax) {
            if ($param) {
                $ids = explode(',', $param['product_id']);
                foreach ($ids as $pk) {
                    $product = Product::find()->where(['id' => $pk])->one();
                    if ($product) {
                        $product->group_id = $param['name'];
                        $product->save(false);
                    }
                }

                return [
                    'forceClose'=>true,
                    'forceReload' => '#crud-datatable-pjax',
//                    'title' => "ID продуктов: " . $model->name,
//                    'content' => '<span class="text-success">Категорию успешно обновлено на </span>',
//                    'footer' => Html::button('Закрыть', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"])
                ];

            } else {
                return [
                    'title' => "Зміна групи у вибраних товарів",
                    'content' => $this->renderAjax('update-group', [
                        'model' => $model,
                        'pks' => $request->post('pks'),
                        'products' => $products
                    ]),
                    'footer' => Html::button('Закрыть', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Сохранить', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        }
    }

    public function actionUpdateMainProduct($id, $val){
        $model = $this->findModel($id);
        $model->main = intval($val);
        $model->save(false);
        Yii::$app->response->format = Response::FORMAT_JSON;
        return true;
    }
}
