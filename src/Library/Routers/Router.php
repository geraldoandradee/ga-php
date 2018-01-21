<?php

namespace GAPHP\Library\Routers;

use AltoRouter;

class Router extends AltoRouter implements IRoute
{
  private static $instance;

  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new AltoRouter();
    }

    return self::$instance;
  }

  public function dispach()
  {
    parent::match();
  }

  public function match($requestUrl = null, $requestMethod = null)
  {
    parent::match($requestUrl, $requestMethod);
  }
}