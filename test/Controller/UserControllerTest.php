<?php

namespace Hami\User;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
// use Hami\User;
use Hami\Question;

/**
 * Test the SampleController.
 */
class UserControllerTest extends TestCase
{
      // Create the di container.
      protected $di;
      protected $controller;
  
  
  
      /**
       * Prepare before each test.
       */
      protected function setUp()
      {
          global $di;
  
          // Setup di
          $this->di = new DIFactoryConfig();
          $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
  
          // Use a different cache dir for unit test
          $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");
  
          // View helpers uses the global $di so it needs its value
          $di = $this->di;
  
          // Setup the controller
          $this->controller = new UserController();
          $this->controller->setDI($this->di);
          $this->di->get("session")->start();
        //   $this->controller->initialize();
      }
    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        $controller = new UserController();
        // $controller->initialize();
        $res = $this->controller->indexActionGet();
        $this->assertInternalType("object", $res);
    }

    public function testloginAction()
    {
        $controller = new UserController();
        // $controller->initialize();
        $res = $this->controller->loginAction();
        $this->assertInternalType("object", $res);
    }

    public function testContributionsActionGet()
    {
        $controller = new UserController();
        // $controller->initialize();
        $res = $this->controller->contributionsActionGet("Hatem");
        $this->assertInternalType("object", $res);
    }

    public function testCreateAction()
    {
        $controller = new UserController();
        // $controller->initialize();
        $res = $this->controller->createAction();
        $this->assertInternalType("object", $res);
    }
 
    public function testUpdateAction()
    {
        $controller = new UserController();
        // $controller->initialize();
        $res = $this->controller->updateAction(1);
        $this->assertInternalType("object", $res);
    }



    // /**
    //  * Test the route "info".
    //  */
    // public function testInfoActionGet()
    // {
    //     $controller = new SampleController();
    //     $controller->initialize();
    //     $res = $controller->infoActionGet();
    //     $this->assertContains("db is active", $res);
    // }



    // /**
    //  * Test the route "dump-di".
    //  */
    // public function testDumpDiActionGet()
    // {
    //     // Setup di
    //     $di = new DIFactoryConfig();
    //     $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

    //     // Use a different cache dir for unit test
    //     $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

    //     // Setup the controller
    //     $controller = new UserController();
    //     $controller->setDI($di);
    //     // $controller->initialize();

    //     // Do the test and assert it
    //     $res = $controller->dumpDiActionGet();
    //     $this->assertContains("di contains", $res);
    //     $this->assertContains("configuration", $res);
    //     $this->assertContains("request", $res);
    //     $this->assertContains("response", $res);
    // }
}
