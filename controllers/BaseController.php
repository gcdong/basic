<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;


class  BaseController extends Controller
{
    private $allow_action = array('login');

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }



    public function beforeAction($action)
    {
        $action = Yii::$app->controller->action->id;
        if (\Yii::$app->user->isGuest && !in_array($action,$this->allow_action)) {
            return $this->redirect('/site/login');
        }
    }

}
