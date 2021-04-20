<?php

declare(strict_types=1);

namespace Rist\Controller\Dice;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
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
    public function __invoke(): ResponseInterface
    {
        $_SESSION["game"]->computerPlay();
        // redirectTo(url("/results"));
        // return;

        return (new Response())
            ->withStatus(301)
            ->withHeader("Location", url("/results"));
    }
}
