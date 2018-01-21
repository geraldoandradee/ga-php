<?php

namespace GAPHP\Library\Routers;


class Route
{
  private $method;
  private $path;
  private $name;
  private $controller;

  public function __construct($method, $path, $name, $controller)
  {
    $this->method = $method;
    $this->path = $path;
    $this->name = $name;
    $this->controller = $controller;
  }

  /**
   * @return mixed
   */
  public function getMethod()
  {
    return $this->method;
  }

  /**
   * @param mixed $method
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }

  /**
   * @return mixed
   */
  public function getPath()
  {
    return $this->path;
  }

  /**
   * @param mixed $path
   */
  public function setPath($path)
  {
    $this->path = $path;
  }

  /**
   * @return mixed
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getFullControllerName()
  {
    return explode('::', $this->controller)[0];
  }

  /**
   * @return mixed
   */
  public function getControllerMethod()
  {
    return explode('::', $this->controller)[1];
  }

  /**
   * @param mixed $controller
   */
  public function setController($controller)
  {
    $this->controller = $controller;
  }


}