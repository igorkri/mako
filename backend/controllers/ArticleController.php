<?php

namespace backend\controllers;

use Yii;
use common\models\Article;
use backend\models\search\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulkdelete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Article #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                    Html::a('Редагувати', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Article model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Article();

        if ($model->load($request->post())) {
            $dir = Yii::getAlias('@frontendWeb/img/article');
            if($_FILES['Article']['size']['file'] > 0) {
                $file = UploadedFile::getInstance($model, 'file');
                $imageName = uniqid();
                $file->saveAs($dir . '/' . $imageName . '.' . $file->extension);
                $model->file = $imageName . '.' . $file->extension;
            }
            if($_FILES['Article']['size']['file_thumb'] > 0) {
                $file_thumb = UploadedFile::getInstance($model, 'file_thumb');
                $imageName2 = uniqid();
                $file_thumb->saveAs($dir . '/' . $imageName2 . '.' . $file->extension);
                $model->file_thumb = $imageName2 . '.' . $file->extension;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Updates an existing Article model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $post_file = $_FILES['Article']['size']['file'];
            if ($post_file <= 0) {
                $old = $this->findModel($id);
                $model->file = $old->file;
                $model->file_thumb = $old->file_thumb;
            } else {
                $dir = Yii::getAlias('@frontendWeb/img/article');

                $file = UploadedFile::getInstance($model, 'file');
                $file_thumb = UploadedFile::getInstance($model, 'file_thumb');
                $imageName = uniqid();
                $imageName2 = uniqid();
                $file->saveAs($dir . '/' . $imageName . '.' . $file->extension);
                $file_thumb->saveAs($dir . '/' . $imageName2 . '.' . $file->extension);
                $model->file = $imageName . '.' . $file->extension;
                $model->file_thumb = $imageName . '.' . $file->extension;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Delete an existing Article model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $dir = Yii::getAlias('@frontendWeb/img/article');
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        if(is_file($dir . "/" . $model->file_thumb)){
            unlink($dir . "/" . $model->file_thumb);
        }
        if(is_file($dir . "/" . $model->file)) {
            unlink($dir . "/" . $model->file);
        }
        $model->delete();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

    /**
     * Delete multiple existing Article model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkdelete()
    {
        $dir = Yii::getAlias('@frontendWeb/img/article');
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $request = Yii::$app->request;
            $model = $this->findModel($pk);
            unlink($dir . "/" . $model->file_thumb);
            unlink($dir . "/" . $model->file);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Потрібна сторінка не існує.');
        }
    }
}
