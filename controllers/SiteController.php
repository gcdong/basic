<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\db\Query;
use app\core\base\BaseController;
use app\core\CMS;
use app\models\User;

class SiteController extends BaseController
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
                    'logout' => ['post','get'],
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

        /*$auth = Yii::$app->authManager;
        $parent = $auth->getRole('超级管理员');
        $children = $auth->getPermission('add');
        $auth->addChild($parent, $children);
        exit;
        $permissions = Yii::$app->authManager->getChildren('超级管理员');

        var_dump($permissions);
        exit;*/

//        $action = Yii::$app->controller->action->id;

        $can = Yii::$app->authManager->checkAccess( '2' , 'add' );
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
        if (Yii::$app->request->post()) {
            $username = Yii::$app->request->post('username', '');
            $password = Yii::$app->request->post('password', '');
            $Model = new User();
            $user = $Model::findOne(array('username'=>$username,'password'=>$password));
            if (!empty($user)){
                if(Yii::$app->getUser()->login($user)){
                    exit($this->jsonSucceedResponse(['url'=>'/site/index']));
                    CMS::go('');
                }
            }else{
                exit('帐号或者密码错误');
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionAdd(){
        echo '进来了ADD';
    }
    public function actionDelete(){
        echo '进来了delete';
    }
    public function actionCheck(){
        if(Yii::$app->request->isAjax){
            $username = Yii::$app->request->post('username', '');
            $password = Yii::$app->request->post('password', '');
            if (!empty($username) && !empty($password)) {
                $Model = new User();
                $user = $Model::findOne(array('username'=>$username,'password'=>$password));
            }
            if (!empty($user) && Yii::$app->getUser()->login($user)){
                exit($this->jsonSucceedResponse(['url'=>'/site/index']));
            }else{
                exit($this->jsonFailedResponse([],'帐号或者密码错误'));
            }
        }
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
