<?php

namespace backend\controllers;

use common\models\PromoHome;
use backend\models\search\PromoHomeSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PromoHomeController implements the CRUD actions for PromoHome model.
 */
class PromoHomeController extends Controller
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
     * Lists all PromoHome models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PromoHomeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PromoHome model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PromoHome model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        Yii::$app->cache->flush();
        $model = new PromoHome();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $dir = Yii::getAlias('@frontendWeb/img/certificates');

                $file = UploadedFile::getInstance($model, 'file');
                $imageName = date('d-m-yy', time()) . '-' . uniqid();
                $file->saveAs($dir . '/' . $imageName . '.' . $file->extension);
                $model->file = $imageName . '.' . $file->extension;

                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PromoHome model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $post_file = $_FILES['PromoHome']['size']['file'];
            if($post_file <= 0 ){
                $old = $this->findModel($id);
                $model->file = $old->file;
            }else {
                $dir = Yii::getAlias('@frontendWeb/img/certificates');
                $file = UploadedFile::getInstance($model, 'file');
                $imageName = date('d-m-yy', time()) . '-' . uniqid();
                $file->saveAs($dir . '/' . $imageName . '.' . $file->extension);
                $model->file = $imageName . '.' . $file->extension;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PromoHome model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PromoHome model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PromoHome the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PromoHome::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
