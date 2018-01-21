<?php

namespace GAPHP\Library\Http;

class Response extends AbstractResponse
{
  private static $instance = null;

  private function __construct($body = '', $status_code = null, array $headers = array())
  {
    $status_code   = $status_code ?: static::$default_status_code;

    // Set our body and code using our internal methods
    $this->body($body);
    $this->code($status_code);

    $this->headers = new HeaderDataCollection($headers);
    $this->cookies = new ResponseCookieDataCollection();
  }

  public static function getInstance() {
    if (!self::$instance) {
      self::$instance = new Response();
    }

    return self::$instance;
  }

  public function render()
  {

  }
}