<?php

namespace GAPHP\Library;

use Contabilissimo\Library\Http\Request;
use Contabilissimo\Library\Http\Response;
use Contabilissimo\Library\Routers\Router;

abstract class BaseApp
{
  /**
   * @var Response
   **/
  private $response;
  private $request;
  /**
   * @var Router
   **/
  protected $router;
  protected $routes;
  protected $logger;
  protected $params = array();
  protected $modules = array();
  /**
   * @var boolean This is a flag to set
   */
  protected $autoConfig = false;


  /**
   * @return Response
   */
  public function getResponse()
  {
    return $this->response;
  }

  /**
   * @param Response $response
   */
  public function setResponse(Response $response)
  {
    $this->response = $response;
  }

  /**
   * @return Request|null
   */
  public function getRequest()
  {
    return $this->request;
  }

  /**
   * @param Request $request
   */
  public function setRequest(Request $request)
  {
    $this->request = $request;
  }

  /**
   * @return mixed
   */
  public function getLogger()
  {
    return $this->logger;
  }

  /**
   * @param mixed $logger
   */
  public function setLogger($logger)
  {
    $this->logger = $logger;
  }

  protected function setConfigItem($key, $value)
  {
    if ($key == 'params') {
      $this->mergeParams($value);
    } elseif (property_exists($this, $key)) {
      $this->$key = $value;
    } else {

    }
  }

  protected function run()
  {
    throw new \Exception("Not implemented");
  }

  protected function setupRoutes()
  {
    /** @var \GAPHP\Library\Routers\Route $route */
    foreach ($this->routes as $route) {
      $this->router->map($route->getMethod(), $route->getPath(), function () use ($route) {
        $controller = $route->getFullControllerName();
        $method = $route->getControllerMethod();

        (new $controller())->$method();
      }, $route->getName());
    }
  }

  private function mergeParams(array $params)
  {
    foreach ($params as $key => $value) {
      $this->params[$key] = $value;
    }
  }

  public function getParam($key) {
    return $this->params[$key];
  }

  public function setParam($key, $value) {
    $this->params[$key] = $value;
  }
}