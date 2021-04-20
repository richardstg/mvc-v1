<?php

declare(strict_types=1);

namespace Rist\Controller\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Rist\Dice\DiceGame;


/**
 * Test cases for the controller Debug.
 */
class ControllerPostComputerPlayTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $_SESSION["game"] = new DiceGame();
        $controller = new PostComputerPlay();
        $this->assertInstanceOf("\Rist\Controller\Dice\PostComputerPlay", $controller);
    }

    /**
     * Check that the controller returns a response.
     */
    public function testControllerReturnsResponse()
    {
        $controller = new PostComputerPlay();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
}
