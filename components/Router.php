<?php


class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {

//                $subject = '20-12-2090';
//                $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
//                $replacement = 'Year $3 Month $2 Day $1';
//
//                echo preg_replace($pattern, $replacement, $subject);

//                $segments = explode('/', $path);

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);

//                echo '<pre>';
//                echo print_r($segments);
//                echo '</pre>';

                $controllersName = array_shift($segments).'Controller';
                $controllersName = ucfirst($controllersName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

//                echo '<pre>';
//                echo print_r($parameters);
//                echo '</pre>';

                $controllersFile = ROOT.'/controllers/'.$controllersName.'.php';
                if(file_exists($controllersFile)) {
                    include_once($controllersFile);
                }

                $controllersObject = new $controllersName;
                $result = call_user_func_array(array($controllersObject, $actionName),$parameters);

                if ($result != null) {
                    break;
                }

            }
        }

    }

}