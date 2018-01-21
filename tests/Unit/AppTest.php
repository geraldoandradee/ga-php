<?php

namespace GAPHP\Tests\Functional;

use GAPHP\Library\App;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
  private $app;

  public function setUp()
  {
    $this->app = App::getInstance();
  }

  public function testAppSingleton()
  {
    $app2 = App::getInstance();
    $this->assertEquals($this->app, $app2, "App is not same instance");
  }

  public function testSetParams() {
    $this->assertTrue(method_exists($this->app, 'setParams'), '');
    $this->assertTrue(method_exists($this->app, 'setSettings'), '');
    $this->assertTrue(method_exists($this->app, 'autoConfigSetting'), '');
    $this->assertTrue(method_exists($this->app, 'run'), '');
    $this->assertTrue(method_exists($this->app, 'setSubModulesSettings'), '');
    $this->assertTrue(method_exists($this->app, 'getInstance'), '');
    $this->assertTrue(method_exists($this->app, 'getResponse'), '');
    $this->assertTrue(method_exists($this->app, 'setResponse'), '');
    $this->assertTrue(method_exists($this->app, 'getRequest'), '');
    $this->assertTrue(method_exists($this->app, 'setRequest'), '');
    $this->assertTrue(method_exists($this->app, 'getLogger'), '');
    $this->assertTrue(method_exists($this->app, 'setLogger'), '');
    $this->assertTrue(method_exists($this->app, 'setConfigItem'), '');
    $this->assertTrue(method_exists($this->app, 'setupRoutes'), '');
    $this->assertTrue(method_exists($this->app, 'mergeParams'), '');
    $this->assertTrue(method_exists($this->app, 'getParam'), '');
    $this->assertTrue(method_exists($this->app, 'setParam'), '');
  }
}
