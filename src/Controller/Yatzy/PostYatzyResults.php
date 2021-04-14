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
class PostYatzyResults
{
    public function __invoke()
    {
        if (isset($_POST["valueToCount"])) {
            $_SESSION["valueToCount"] = $_POST["valueToCount"];
            $_SESSION["yatzy"]->countPoints(intval($_POST["valueToCount"]));
            $_SESSION["points"] = $_SESSION["yatzy"]->points;
        }

        return redirectTo(url("/yatzy/results"));
    }
}
