<?php

declare(strict_types=1);

namespace Rist\Controller\Dice;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use Rist\Dice\DiceGame;

use function Mos\Functions\{
    destroySession,
    redirectTo,
    renderView,
    renderTwigView,
    sendResponse,
    url
};

/**
 * Controller for processing computer play.
 */
class PostComputerPlay
{
    public function __invoke()
    {
        $_SESSION["game"]->computerPlay();
        return redirectTo(url("/results"));
    }
}