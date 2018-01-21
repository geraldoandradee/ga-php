<?php

namespace GAPHP\Library\Routers;

use GAPHP\Library\Routers\Engine\GAPHPRouter;

class Router extends GAPHPRouter implements IRoute
{
  private static $instance;

  /**
   * @return GAPHPRouter
   * @throws \Exception
   */
  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new GAPHPRouter();
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
