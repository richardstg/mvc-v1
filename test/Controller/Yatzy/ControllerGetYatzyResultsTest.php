<?php

declare(strict_types=1);

namespace Rist\Controller\Yatzy;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Rist\Yatzy\YatzyGame;

/**
 * Test cases for the controller Debug.
 */
class ControllerGetYatzyResultsTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $_SESSION["yatzy"] = new YatzyGame();
        $controller = new GetYatzyResults();
        $this->assertInstanceOf("\Rist\Controller\Yatzy\GetYatzyResults", $controller);
    }

    /**
     * Check that the controller returns a response.
     */
    public function testControllerReturnsResponse()
    {
        $_SESSION["yatzy"] = new YatzyGame();
        $controller = new GetYatzyResults();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
}
