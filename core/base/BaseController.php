<?php

namespace app\core\base;

use Yii;
use yii\web\Controller;
use app\core\CMS;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ErrorAction;
use yii\base\InvalidRouteException;
use yii\web\View;
use yii\web\Response;
use app\core\base\BaseView;


/*
 * 这个是继承了yii基controller的一个base,因为有些需要使用公共controller需要更改,但是又不希望破坏yii的框架就这样做
 * */

class BaseController extends Controller {

    //关闭csrf验证
    public $enableCsrfValidation = false;

    public function behaviors(){
        return [];
    }

    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'height' => '40',
                'width' => '100',
                'minLength' => 3,
                'maxLength' => 5
            ]
        ];
    }



    public function init(){
        parent::init();
//        $this->getView()->on(BaseView::EVENT_BEGIN_PAGE, [$this,'beginPage']);
//        $this->getView()->on(BaseView::EVENT_BEGIN_BODY, [$this,'beginBody']);
//        $this->getView()->on(BaseView::EVENT_BEFORE_RENDER, [$this,'beforeRender']);
//        $this->getView()->on(BaseView::EVENT_AFTER_RENDER, [$this,'afterRender']);
//        $this->getView()->on(BaseView::EVENT_END_BODY, [$this,'endBody']);
//        $this->getView()->on(BaseView::EVENT_END_PAGE, [$this,'endPage']);
//        $this->getView()->on(BaseView::EVENT_AFTER_PAGE, [$this,'afterPage']);
    }

    public function beforeAction($action)
    {
        if(!parent::beforeAction($action))
        {
            return false;
        }

        //检查不需要登录的action uniqueID,如 site/login, site/captcha
        if (in_array($action->uniqueID, $this->ignoreLogin()))
        {
            return parent::beforeAction($action);
        }
        if (\Yii::$app->user->isGuest)
        {
            CMS::go('/site/login');
        }
        if(in_array($action->uniqueID, $this->ingorePermission()))
        {
            return parent::beforeAction($action);
        }
        //开始检查权限
        $auth = CMS::$app->authManager;
        if($auth->checkAccess(CMS::$app->user->id,$action->uniqueID)){
            return parent::beforeAction($action);
        }else{
            exit('并没有权限');
            return $this->showMessage();
        };
    }

    public function ignoreLogin()
    {
        return [
            'site/login',
            'site/check',
        ];
    }

    public function ingorePermission()
    {
        return [
            'site/logout',
            'site/error',
            'site/index'
        ];
    }

    public function jsonResponse($data,$status=null,$message='')
    {
        $ret =['status'=>$status,'message'=>$message, 'data'=>$data];
//        $response = \Yii::$app->response;
//        $response->format = Response::FORMAT_RAW;
//        $response->data=json_encode($ret,true);
        //并不需要上面那么复杂
        $response = json_encode($ret);
        return $response;
    }
    public function jsonSucceedResponse($data,$message='')
    {
        return $this->jsonResponse($data,'succeed',$message);
    }
    public function jsonFailedResponse($data,$message='')
    {
        return $this->jsonResponse($data,'failed',$message);
    }


    public function showMessage($message = null, $title = '提示',$params=[])
    {
        if ($message === null)
        {
            $message = '权限不足，无法进行此项操作';
        }
        $params=array_merge(['title'=>$title,'message'=>$message],$params);
        return $this->render('//site/message',$params);
    }


}



?>