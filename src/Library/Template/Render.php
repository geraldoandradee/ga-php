<?php

namespace GAPHP\Library\Template;

use GAPHP\Library\Exceptions\GAPHPTemplateException;

class Render
{
  private static $instance;

  /**
   * @return Render
   */
  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new Render();
    }
    return self::$instance;
  }

  public function setCacheDir(string $cacheDir)
  {
    \Haanga::configure(array('cache_dir' => $cacheDir));
  }

  public function setTemplateDir(string $templateDir)
  {
    \Haanga::configure(array('template_dir' => $templateDir));
  }

  public function setTtl(int $ttl)
  {
    \Haanga::configure(array('check_ttl' => $ttl));
  }

  public function configure(Array $opts)
  {
    \Haanga::configure($opts);
    return $this;
  }

  public function render($tpl, $context = array(), $return = true, $blocks = array())
  {
    try {
      return \Haanga::Load($tpl, $context, $return, $blocks);
    } catch (\Haanga_Exception $e) {
      throw new GAPHPTemplateException(print_r($e, true));
    } catch (\Exception $e) {
      throw new GAPHPTemplateException(print_r($e, true));
    }
  }

}