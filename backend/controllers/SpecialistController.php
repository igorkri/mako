<?php

namespace backend\controllers;

use Yii;
use common\models\Specialists;
use backend\models\search\SpecialistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * SpecialistController implements the CRUD actions for Specialists model.
 */
class SpecialistController extends Controller
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
     * Lists all Specialists models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new SpecialistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Specialists model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Specialists #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                            Html::a('Редагувати',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Specialists model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Specialists();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Specialists",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                                Html::button('Зберегти',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())){
                $dir = Yii::getAlias('@frontendWeb/img/specialists');

                $file = UploadedFile::getInstance($model, 'photo');
                $imageName = date('d-m-yy', time()) . '-' . uniqid();
                $file->saveAs($dir . '/' . $imageName . '.' . $file->extension);
                $model->photo = $imageName . '.' . $file->extension;

                if ($model->save()) {
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'title' => "Create new Specialists",
                        'content' => '<span class="text-success">Успішно створено</span>',
                        'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                            Html::a('Додати ще', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                    ];
                }
            }else{           
                return [
                    'title'=> "Create new Specialists",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                                Html::button('Зберегти',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Specialists model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
//        Yii::$app->cache->flush();
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Specialists #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                                Html::button('Зберегти',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post())){
                $post_file = $_FILES['Specialists']['size']['photo'];
                if($post_file <= 0 ){
                    $old = $this->findModel($id);
                    $model->photo = $old->photo;
                }else {
                    $dir = Yii::getAlias('@frontendWeb/img/specialists');
                    $file = UploadedFile::getInstance($model, 'photo');
                    $imageName = date('d-m-yy', time()) . '-' . uniqid();
                    $file->saveAs($dir . '/' . $imageName . '.' . $file->extension);
                    $model->photo = $imageName . '.' . $file->extension;
                }
                if ($model->save()) {
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'title' => "Specialists #" . $id,
                        'content' => $this->renderAjax('view', [
                            'model' => $model,
                        ]),
                        'footer' => Html::button('Закрити', ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => "modal"]) .
                            Html::a('Редагувати', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                    ];
                }
            }else{
                 return [
                    'title'=> "Update Specialists #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                                Html::button('Зберегти',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Specialists model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $dir = Yii::getAlias('@frontendWeb/img/specialists');
        $model = $this->findModel($id);
        unlink($dir . '/' . $model->photo);
        $model->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Specialists model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkdelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $dir = Yii::getAlias('@frontendWeb/img/specialists');
            $model = $this->findModel($pk);
            unlink($dir . '/' . $model->photo);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the Specialists model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Specialists the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Specialists::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Потрібна сторінка не існує.');
        }
    }
}
