<?php

declare(strict_types=1);

namespace Rist\Controller\Yatzy;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Rist\Yatzy\YatzyGame;

/**
 * Test cases for the controller Debug.
 */
class ControllerGetYatzyTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $_SESSION["yatzy"] = new YatzyGame();
        $controller = new GetYatzy();
        $this->assertInstanceOf("\Rist\Controller\Yatzy\GetYatzy", $controller);
    }

    /**
     * Check that the controller returns a response.
     */
    public function testControllerReturnsResponse()
    {
        $controller = new GetYatzy();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
}
