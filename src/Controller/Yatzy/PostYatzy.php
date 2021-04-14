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
class PostYatzy
{
    public function __invoke(): void
    {
        if (!isset($_SESSION["yatzy"])) {
            $_SESSION["yatzy"] = new YatzyGame();
        } else {
            $_SESSION["yatzy"] = new YatzyGame();
        }
        redirectTo(url("/yatzy/play"));
        return;
    }
}
