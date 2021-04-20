<?php

declare(strict_types=1);

namespace Mos\Config;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for the configuration file bootstrap.php.
 */
class ConfigRouterpTest extends TestCase
{
    private $routerFile = INSTALL_PATH . "/config/router.php";

    /**
     * Require the config file.
     */
    public function testRequireConfigFile()
    {
        $exp = 1;
        $res = require $this->routerFile;
        $this->assertEquals($exp, $res);
    }
}
