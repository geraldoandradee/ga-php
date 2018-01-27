<?php

namespace GAPHP\Library;

use GAPHP\Library\Http\Response;

/**
 * Class used to control entire
 */
class App extends BaseApp
{
  private static $app = null;

  private function __construct()
  {
  }

  public static function getInstance()
  {
    if (!self::$app) {
      self::$app = new App();
    }
    return self::$app;
  }

  /**
   * @param array $params
   * @throws \Exception
   */
  public static function setParams(array $params)
  {
    if (!self::$app) {
      throw new \Exception("App not initialized");
    } else {
      self::$params = $params;
    }
  }

  /**
   * @param array $settings
   * @throws \Exception
   */
  public function setSettings(array $settings)
  {
    if (isset($settings['settings'])) {
      foreach ($settings['settings'] as $key => $value) {
        $this->setConfigItem($key, $value);
      }
    } else {
      throw new \Exception('SETTINGS_DOES_NOT_EXISTS');
    }

    if ($this->autoConfig) {
      $this->setSubModulesSettings();
    }
  }

  /**
   * This sets an application to check
   */
  public function autoConfigSetting($autoConfig)
  {
    $this->autoConfig = $autoConfig;
  }

  /**
   * Runs application.
   *
   * @throws \Exception
   */
  public function run()
  {
    $this->setupRoutes();
    $match = $this->router->match();

    $this->setResponse(Response::getInstance());

    if ($match && is_callable($match['target'])) {
      call_user_func_array($match['target'], $match['params']);
    } else {
      try {
        $this->getResponse()->setStatus(404)->body('404 Not Found')->send();
      } catch (Exceptions\Http\ResponseAlreadySentException $e) {

      }
    }
  }

  private function setSubModulesSettings()
  {
    foreach ($this->modules as $module) {
      $settings = require $this->getParam('MODULE_ROOT') . '/' . $module . '/config/settings.php';
      foreach ($settings['settings'] as $key => $value) {
        $this->setConfigItem($key, $value);
      }
    }
  }
}
