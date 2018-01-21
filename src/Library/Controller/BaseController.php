<?php

namespace GAPHP\Library\Controller;


use GAPHP\Library\App;
use GAPHP\Library\Http\Response;
use GAPHP\Library\Template\Render;

abstract class BaseController
{
  protected $params;
  protected $templateEngine;

  /**
   * @return mixed
   */
  public function getRequest()
  {
    return App::getInstance()->getRequest();
  }

  /**
   * @return mixed
   */
  public function getResponse()
  {
    return App::getInstance()->getResponse();
  }

  public function render($templateName, $opts)
  {
    Response::getInstance()->body(Render::getInstance()->render($templateName, $opts))->sendBody();
  }
}
