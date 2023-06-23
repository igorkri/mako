<?php

namespace frontend\controllers;

use common\models\Article;
use yii\base\BaseObject;
use yii\data\Pagination;

class TestController extends \yii\web\Controller
{
    public $layout = 'testlaout'; // Установка макета ''

    public function actionIndex()
    {
        $query = Article::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 8, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $articles = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'articles' => $articles,
            'pages' => $pages,
        ]);
    }

    public function actionView($slug)
    {

        $article = Article::find()->where(['slug' => $slug])->one();

        return $this->render('view', ['article' => $article]);
    }

}
