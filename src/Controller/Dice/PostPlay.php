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
 * Controller for processing game play.
 */
class PostPlay
{
    public function __invoke(): ResponseInterface
    {
        $_SESSION["lastRollPlayer"] = $_SESSION["game"]->playerPlay();

        if ($_SESSION["game"]->playerWin || $_SESSION["game"]->computerWin) {
            // redirectTo(url("/results"));
            // return;
            return (new Response())
                ->withStatus(301)
                ->withHeader("Location", url("/results"));
        } else {
            // redirectTo(url("/play"));
            // return;
            return (new Response())
                ->withStatus(301)
                ->withHeader("Location", url("/play"));
        }
    }
}
