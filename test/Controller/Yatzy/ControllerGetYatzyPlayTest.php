<?php

declare(strict_types=1);

namespace Rist\Controller\Yatzy;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Rist\Yatzy\YatzyGame;

/**
 * Test cases for the controller Debug.
 */
class ControllerGetYatzyPlayTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $_SESSION["yatzy"] = new YatzyGame();
        $controller = new GetYatzyPlay();
        $this->assertInstanceOf("\Rist\Controller\Yatzy\GetYatzyPlay", $controller);
    }

    /**
     * Check that the controller returns a response.
     */
    public function testControllerReturnsResponse()
    {
        $controller = new GetYatzyPlay();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
}
