<?php

declare(strict_types=1);

namespace Rist\Controller\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Rist\Dice\DiceGame;


/**
 * Test cases for the controller Debug.
 */
class ControllerPostPlayTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $_SESSION["game"] = new DiceGame();
        $controller = new PostPlay();
        $this->assertInstanceOf("\Rist\Controller\Dice\PostPlay", $controller);
        // $this->assertRedirect("results");
    }

    /**
     * Check that the controller returns a response.
     */
    public function testControllerReturnsResponse()
    {
        $controller = new PostPlay();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
}
