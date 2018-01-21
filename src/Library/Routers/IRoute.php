<?php

namespace GAPHP\Library\Routers;


interface IRoute
{
  public function match($requestUrl = null, $requestMethod = null);
}