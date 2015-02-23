<?php

namespace App\Test;

require __DIR__.'/../../../vendor/autoload.php';

use PHPUnit_Framework_TestCase;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

abstract class AbstractTestCase extends PHPUnit_Framework_TestCase {
    
    protected static $app;
    
    public static function setUpBeforeClass() {
        
        parent::setUpBeforeClass();
        self::$app = self::createApplication();
    }

    private static function createApplication() {
        
        $app = require __DIR__.'/../../app.php';
        $app['session.storage'] = new MockArraySessionStorage();
        require __DIR__.'/../../../config/dev.php';
        $app['debug'] = true;
        $app['exception_handler']->disable();
        
        return $app;
    }
}