<?php

declare(strict_types=1);

namespace Rist\Controller\Yatzy;

use Nyholm\Psr7\Factory\Psr17Factory;
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
    public function __invoke(): void
    {
        if (isset($_POST["stop"]) || ($_SESSION["yatzy"]->numberOfRolls === 3)) {
            redirectTo(url("/yatzy/results"));
            return;
        }

        if (isset($_POST["roll"])) {
            if (isset($_POST["dicesToKeep"])) {
                $_SESSION["yatzy"]->setDicesToKeepIndexes($_POST["dicesToKeep"]);
            } else {
                $_SESSION["yatzy"]->setDicesToKeepIndexes([]);
            }
        }

        $_SESSION["yatzy"]->rollDices();
        redirectTo(url("/yatzy/play"));
        return;
    }
}
