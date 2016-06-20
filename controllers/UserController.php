<?php

namespace app\controllers;


use app\models\User;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;

class UserController extends Controller
{
    public function behaviors()
    {
        $default = parent::behaviors();

        unset($default['rateLimiter']); // Отключаем RateLimiter

        return $default;
    }
    
    public function actionStat()
    {
        return new ActiveDataProvider([
            'query' => User::findStat()
        ]);
    }
}