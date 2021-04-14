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
 * Controller for starting the game.
 */
class PostGame
{
    public function __invoke(): void
    {
        if (!isset($_SESSION["game"])) {
            $_SESSION["game"] = new DiceGame(intval($_POST["numberDices"]));
        } else {
            $_SESSION["game"]->newRound();
        }
        redirectTo(url("/play"));
        return;
    }
}
