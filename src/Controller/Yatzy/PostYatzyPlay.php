<?php

declare(strict_types=1);

namespace Rist\Controller\Yatzy;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

use Rist\Yatzy\YatzyGame;

use function Mos\Functions\{
    destroySession,
    redirectTo,
    renderView,
    renderTwigView,
    sendResponse,
    url
};

/**
 * Controller for starting the game.
 */
class PostYatzyPlay
{
    public function __invoke(): ResponseInterface
    {
        if (isset($_POST["stop"]) || ($_SESSION["yatzy"]->numberOfRolls === 3)) {
            // redirectTo(url("/yatzy/results"));
            // return;
            return (new Response())
                ->withStatus(301)
                ->withHeader("Location", url("/yatzy/results"));
        }

        if (isset($_POST["roll"])) {
            if (isset($_POST["dicesToKeep"])) {
                $_SESSION["yatzy"]->setDicesToKeepIndexes($_POST["dicesToKeep"]);
            } else {
                $_SESSION["yatzy"]->setDicesToKeepIndexes([]);
            }
        }

        $_SESSION["yatzy"]->rollDices();
        // redirectTo(url("/yatzy/play"));
        // return;
        return (new Response())
            ->withStatus(301)
            ->withHeader("Location", url("/yatzy/play"));
    }
}
