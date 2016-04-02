<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\db\Query;

class SiteController extends Controller
{
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




    public function actionTest(){
       /* $item = 'add';
        $auth = Yii::$app->authManager;
        $createPost = $auth->createPermission($item);
        $createPost->description = '创建了 ' . $item . ' 许可';
        $auth->add($createPost);*/

        /*$auth = Yii::$app->authManager;
        $item = '超级管理员';
        $role = $auth->createRole($item);
        $role->description = '创建了 ' . $item . ' 角色';
        $auth->add($role);*/

        /*
        $auth = Yii::$app->authManager;
        $parent = $auth->createRole($items['name']);
        $child = $auth->createPermission($items['description']);
        $auth->addChild($parent, $child);*/

        $auth = Yii::$app->authManager;


        $parent = $auth->createRole('超级管理员');
        $auth->assign($parent, '2');
        exit;

        $permissions = Yii::$app->authManager->getChildren('超级管理员');

        var_dump($permissions);
        exit;

        $action = Yii::$app->controller->action->id;

        $can = Yii::$app->authManager->checkAccess( '1' , 'add' );
        var_dump($can);
        exit;
        print_r(\Yii::$app->user);
        exit;
        if(\Yii::$app->user->can($action)){
            return true;
        }else{
            throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
        }
//        $auth = Yii::$app->authManager;
//        $role = $auth->createRole('超级管理员');
//        $auth->assign($role, 'add');
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLink1(){
        return $this->render('link1');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
