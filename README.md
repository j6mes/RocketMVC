# RocketMVC
A lightweight MVC framework

Create an instance of a webapp

    <?php
    namespace myApp;

    use JumpKick\Mvc\WebApp;
    use JumpKick\Mvc\RouteSpecification;

    class App extends WebApp {

    function getControllerNamespace()
    {
        return __NAMESPACE__ . "\\Controller";
    }

    function initRoutes($router)
    {
    
        $router->registerRoute(new RouteSpecification("widget/{type}/{model}","Default","Widget")); //Handles URL parameters type and widget
        $router->registerRoute(new RouteSpecification("","Default","Index"));
        $router->setFallback(new RouteSpecification("","Default","Error"));
    }
    }


Create a controller

    <?php
    namespace bus\Controller;

    use JumpKick\Mvc\Controller;

    class DefaultController extends Controller {
    function Index() {
        $this->view->render("default");
    }
    
    function Error() {
        $this->view->render("error");
    }
    
    function Widget($data) {
        //print_r($data);
        $this->view->render("widget",$data['type'],$data['model']);
    }
    
    }







