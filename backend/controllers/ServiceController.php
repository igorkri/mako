<?php

namespace backend\controllers;

use common\models\Service;
use backend\models\search\ServiceSearch;
use common\models\ServiceSpecialist;
use Yii;
use yii\base\BaseObject;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ServiceController implements the CRUD actions for Service model.
 */
class ServiceController extends Controller
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
     * Lists all Service models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ServiceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Service model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $specialists = ServiceSpecialist::find()->where(['service_id' => $id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'specialists' => $specialists,
        ]);
    }

    /**
     * Creates a new Service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Service();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Service model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Service model.
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
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Service::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAddSpecialist($id)
    {

        $request = Yii::$app->request;
        $model = new ServiceSpecialist();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Добавлення спеціалістів ",
                    'content' => $this->renderAjax('add-specialist', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Зберегти', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post())) {
                $post = $request->post('ServiceSpecialist');
//                foreach ($post['specialist_id'] as $sp) {
//                    $new_model = new ServiceSpecialist();
                    $model->service_id = $id;
//                    $new_model->specialist_id = $sp;
                    $model->save();
//                }
                return [
                    'forceReload' => '#view-pjax',
                    'title' => "Добавлення спеціалістів",
                    'content' => '<span class="text-success">Успішно додано!</span>',
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"])
                        . Html::a('Додати ще',['add-specialist', 'id' => $id],['class'=>'btn btn-primary','role'=>'modal-remote'])

                ];
//                }

            } else {
                return [
                    'title' => "Добавлення спеціалістів",
                    'content' => $this->renderAjax('add-specialist', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Зберегти', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $id]);
            } else {
                return $this->render('add-specialist', [
                    'model' => $model,
                ]);
            }
        }
    }

}
