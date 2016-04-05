<?php
namespace source\core\back;

use Yii;
use yii\web\Application;
use app\core\CMS;

class BaseApplication extends Application
{

    use CommonTrait;

    public $activeModules = [];

    public function init()
    {
        parent::init();
        Common::setTimezone();
    }

    public function loadActiveModules($isAdmin)
    {
        $moduleManager = $this->modularityService;

        $this->activeModules = $moduleManager->getActiveModules($isAdmin);

        $module = $isAdmin ? 'admin\AdminModule' : 'home\HomeModule';
        foreach ($this->activeModules as $m)
        {
            $moduleId = $m['id'];
            $moduleDir = $m['dir'];
            $ModuleClassName = $m['dir_class'];

            $this->setModule($moduleId, [
                'class' => 'source\modules\\' . $moduleDir . '\\' . $module
            ]);

            $serviceFile = CMS::getAlias('@source') . '\modules\\' . $moduleDir . '\\' . $ModuleClassName . 'Service.php';
            if (FileHelper::exist($serviceFile))
            {
                $serviceClass = 'source\modules\\' . $moduleDir . '\\' . $ModuleClassName . 'Service';
                $serviceInstance = new $serviceClass();
                $this->set($serviceInstance->getServiceId(), $serviceInstance);
            }
        }
    }

    public function handleRequest($request)
    {
        if (empty($this->catchAll))
        {
            list($route, $params) = $request->resolve();
        }
        else
        {
            $route = $this->catchAll[0];
            $params = array_splice($this->catchAll, 1);
        }
        try
        {
            CMS::trace("Route requested: '$route'", __METHOD__);
            $this->requestedRoute = $route;
            $actionsResult = $this->runAction($route, $params);

            $result = $actionsResult instanceof ActionResult ? $actionsResult->result : $actionsResult;

            if ($result instanceof \yii\web\Response)
            {
                return $result;
            }
            else
            {
                $response = $this->getResponse();
                if ($result !== null)
                {
                    $response->data = $result;
                }

                return $response;
            }
        }
        catch (InvalidRouteException $e)
        {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'), $e->getCode(), $e);
        }
    }
}
