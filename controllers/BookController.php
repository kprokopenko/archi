<?php

namespace app\controllers;


use app\models\Book;
use app\models\BookSearch;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;

class BookController extends Controller
{
    public function behaviors()
    {
        $default = parent::behaviors();
        
        unset($default['rateLimiter']); // Отключаем RateLimiter

        return $default;
    }
    
    public function actionCreate()
    {
        $model = new Book();
        $model->load(\Yii::$app->getRequest()->getBodyParams(), '');
        $model->save();
        
        return $model;
    }
    
    public function actionUpdate($id)
    {
        $model = Book::findOne($id);
        
        if (!$model) {
            throw new NotFoundHttpException("Object with ID = $id not found");
        }

        $model->scenario = 'update';
        $model->load(\Yii::$app->getRequest()->getBodyParams(), '');
        $model->save();
               

        return $model;
    }
    
    public function actionSearch()
    {
        $model = new BookSearch();
        
        return $model->search(\Yii::$app->getRequest()->getQueryParams());
    }
}
