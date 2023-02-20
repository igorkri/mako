<?php

namespace backend\controllers;

use common\models\QuestionService;
use common\models\Service;
use backend\models\search\ServiceSearch;
use common\models\ServiceGallery;
use common\models\ServiceSpecialist;
use common\models\ServiceVideo;
use common\models\Video;
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
        $videos = ServiceVideo::find()->where(['service_id' => $id])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'specialists' => $specialists,
            'videos' => $videos,
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
                $model->service_id = $id;
                $model->save();
                return [
                    'forceReload' => '#view-pjax',
                    'title' => "Добавлення спеціалістів",
                    'content' => '<span class="text-success">Успішно додано!</span>',
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"])
                        . Html::a('Додати ще', ['add-specialist', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

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
            if ($model->load($request->post())) {
                $model->service_id = $id;
                $model->save();
                return $this->redirect(['view', 'id' => $id]);
            } else {
                return $this->render('add-specialist', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionAddVideo($id)
    {

        $request = Yii::$app->request;
        $model = new ServiceVideo();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Добавлення спеціалістів ",
                    'content' => $this->renderAjax('add-video', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Зберегти', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post())) {
                $model->service_id = $id;
                $model->save();
                return [
                    'forceReload' => '#view-pjax',
                    'title' => "Добавлення спеціалістів",
                    'content' => '<span class="text-success">Успішно додано!</span>',
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"])
                        . Html::a('Додати ще', ['add-video', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
//                }

            } else {
                return [
                    'title' => "Добавлення спеціалістів",
                    'content' => $this->renderAjax('add-video', [
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
            if ($model->load($request->post())) {
                $model->service_id = $id;
                $model->save();
                return $this->redirect(['view', 'id' => $id]);
            } else {
                return $this->render('add-video', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionAddPhoto($id)
    {

        $request = Yii::$app->request;
        $model = new ServiceGallery();
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Додавання фото",
                    'content' => $this->renderAjax('add-photo', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Зберегти', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post())) {
                $dir = Yii::getAlias('@frontendWeb/img/service-photo');
                foreach (UploadedFile::getInstances($model, 'file') as $file) {
                    $model = new ServiceGallery();
                    $imageName = date('d-m-yy', time()) . '-' . uniqid();
                    $file->saveAs($dir . '/' . $imageName . '.' . $file->extension);
                    $model->file = $imageName . '.' . $file->extension;
                    $model->service_id = $id;
                    if ($model->save()) {

                    }else{
                        debug($model->errors);

                    }
                }
                return [
                    'forceReload' => '#view-pjax',
                    'title' => "Додавання фото",
                    'content' => '<span class="text-success">Успішно додано</span>',
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"])
                ];
            }
        }
    }

    public function actionRemovePhoto($service_id, $id){

        $model = ServiceGallery::find()->where(['id' => $id])->andWhere(['service_id' => $service_id])->one();
        if($model){
            $dir = Yii::getAlias('@frontendWeb/img/service-photo/');
            unlink($dir . $model->file);
            $model->delete();
//            Yii::$app->getSession()->addFlash('success', "Зображення успішно видалено!");

            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
//        debug($model);

    }

    public function actionAddQuestion($id){

        $request = Yii::$app->request;
        $model = new QuestionService();

        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Питання відповідь ",
                    'content' => $this->renderAjax('add-question', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Зберегти', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post())) {
                $model->service_id = $id;
                $model->save();
                return [
                    'forceReload' => '#view-pjax',
                    'title' => "Питання відповідь ",
                    'content' => '<span class="text-success">Успішно додано!</span>',
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"])
                        . Html::a('Додати ще', ['add-question', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
//                }

            } else {
                return [
                    'title' => "Питання відповідь ",
                    'content' => $this->renderAjax('add-question', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Зберегти', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }

        }
    }

    public function actionUpdateQuestion($service_id, $id){

        $request = Yii::$app->request;
        $model = QuestionService::findOne($id);

        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Питання відповідь ",
                    'content' => $this->renderAjax('add-question', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Зберегти', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post())) {
                $model->service_id = $service_id;
                $model->save();
                return [
                    'forceReload' => '#view-pjax',
                    'title' => "Питання відповідь ",
                    'content' => '<span class="text-success">Успішно оновлено!</span>',
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"])
                ];
//                }

            } else {
                return [
                    'title' => "Питання відповідь ",
                    'content' => $this->renderAjax('add-question', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Зберегти', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }

        }
    }

    public function actionDeleteSpecialist($specialist_id, $id){
        $model = ServiceSpecialist::find()
            ->where(['service_id' => $id])
            ->andWhere(['specialist_id' => $specialist_id])
            ->one();

        if($model->delete()){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'forceReload' => '#view-pjax',
                'title' => " ",
                'content' => '<span class="text-success">Успішно видалено!</span>',
                'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"])
            ];
        }
    }

    public function actionDeleteVideo($service_id, $id){
        $model = ServiceVideo::find()
            ->where(['service_id' => $service_id])
            ->andWhere(['id' => $id])
            ->one();

        if($model->delete()){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'forceReload' => '#view-pjax',
                'title' => " ",
                'content' => '<span class="text-success">Успішно видалено!</span>',
                'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"])
            ];
        }
    }

    public function actionDeleteQuestion($service_id, $id){

        $model = QuestionService::find()
            ->where(['service_id' => $service_id])
            ->andWhere(['id' => $id])
            ->one();
        if($model->delete()){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'forceReload' => '#view-pjax',
                'title' => " ",
                'content' => '<span class="text-success">Успішно видалено!</span>',
                'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"])
            ];
        }

    }

}
