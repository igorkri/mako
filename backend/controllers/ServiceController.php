<?php

namespace backend\controllers;

use common\models\CategoryService;
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
//        Yii::$app->cache->flush();
        $model = $this->findModel($id);
        $items_img = [];
        foreach ($model->serviceGalleries as $gallery):
                $items_img[]['content'] = '<figure data-id="'. $gallery->id .'" data-product-id="'. $gallery->service_id .'" class="figure">
                    <img src="' . Yii::$app->request->hostInfo . '/img/service-photo/' . $gallery->file .'"
                         class="figure-img img-fluid rounded" alt="">
                    <figcaption class="figure-caption text-end">'
                    . Html::a('<i class="far fa-trash-alt"></i>', ['remove-photo', 'service_id' => $model->id, 'id' => $gallery->id], [
                            'class' => 'btn btn-danger btn-sm float-end',
                            'style' => 'margin-left: 10px',
                            'role' => 'modal-remote',
                            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                            'data-request-method'=>'post',
                            'data-toggle'=>'tooltip',
                            'data-confirm-title'=>'Ви впевнені?',
                            'data-confirm-message'=>'Ви впевнені, що хочете видалити зображення?'
                        ]) .
                    '</figcaption>
                </figure>';
        endforeach;

//        debug($items_img);
//        die();
        $specialists = ServiceSpecialist::find()->where(['service_id' => $id])->all();
        $videos = ServiceVideo::find()->where(['service_id' => $id])->all();

        return $this->render('view', [
            'model' => $model,
            'specialists' => $specialists,
            'videos' => $videos,
            'items_img' => $items_img,
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
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = ServiceGallery::find()->where(['id' => $id])->andWhere(['service_id' => $service_id])->one();
        if($model){
            $dir = Yii::getAlias('@frontendWeb/img/service-photo/');
            unlink($dir . $model->file);
            $model->delete();

            return [
                'forceReload' => '#view-pjax',
                'forceClose'=>true,
            ];
//            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
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

    public function actionSubcat1(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = [
            'output' => [],
            'selected' => ''
        ];
        $post = Yii::$app->request->post('depdrop_all_params');
        $categories = CategoryService::find()->where(['parent_id' => $post['parent_id']])->all();
        foreach ($categories as $category){
            $result['output'][] = [
                'id' => $category['id'],
                'name' => $category['name'],
            ];
        }
        return $result;
    }

    public function actionPositionUpdateImg($pos, $prod_id){
        $res_pos = mb_substr($pos, 0, -1);

        $extts = explode(',', $res_pos);
        if($extts){
            $i = 0;
            foreach ($extts as $id){
                $image = ServiceGallery::find()
                    ->where(['id' => $id])
                    ->one();
                if($image){
                    $image->position = $i;
                    $image->save();
                }
                $i++;
            }
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $extts;
    }
}
