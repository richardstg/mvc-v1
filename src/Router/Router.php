<?php

declare(strict_types=1);

namespace Rist\Router;

use Rist\Dice\DiceGame;
use function Mos\Functions\{
    destroySession,
    redirectTo,
    renderView,
    renderTwigView,
    sendResponse,
    url
};

// // Get a defined to point at the installation directory
// define("INSTALL_PATH", realpath(__DIR__ . "/.."));
//
// // Get the autoloader
// require INSTALL_PATH . "/vendor/autoload.php";

/**
 * Class Router.
 */
class Router
{
    public static function dispatch(string $method, string $path): void
    {
        if ($method === "GET" && $path === "/") {
            $data = [
                "header" => "Index page",
                "message" => "Hello, this is the index page, rendered as a layout.",
            ];
            $body = renderView("layout/page.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session") {
            $body = renderView("layout/session.php");
            sendResponse($body);
            return;

        // Game routes
        } else if ($method === "GET" && $path === "/game") {
            $_SESSION["game"] = null;
            $body = renderView("layout/gameinit.php");
            sendResponse($body);
            return;
        } else if ($method === "POST" && $path === "/game") {
            if (!isset($_SESSION["game"])) {
                $_SESSION["game"] = new DiceGame(intval($_POST["numberDices"]));
            } else {
                $_SESSION["game"]->newRound();
            }
            // $_SESSION["game"] = serialize($game);
            redirectTo(url("/play"));
            return;
        } else if ($method === "GET" && $path === "/play") {
            $data = [
                "playerLastHand" => $_SESSION["game"]->playerLastHand,
                "playerLastHandSum" => $_SESSION["game"]->playerLastHandSum,
                "playerLastHandGraphical" => $_SESSION["game"]->playerLastHandGraphical,
                "totalPointsPlayer" => $_SESSION["game"]->protocol["player"],
            ];
            $body = renderView("layout/play.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "POST" && $path === "/play") {
            $_SESSION["lastRollPlayer"] = $_SESSION["game"]->playerPlay();

            if ($_SESSION["game"]->playerWin || $_SESSION["game"]->computerWin) {
                redirectTo(url("/results"));
            } else {
                redirectTo(url("/play"));
            }
            return;
        } else if ($method === "POST" && $path === "/computerplay") {
            $_SESSION["game"]->computerPlay();
            redirectTo(url("/results"));
            return;
        } else if ($method === "GET" && $path === "/results") {
            $data = [
                "playerLastHandSum" => $_SESSION["game"]->playerLastHandSum,
                "roundPointsPlayer" => $_SESSION["game"]->protocol["player"],
                "roundPointsComputer" => $_SESSION["game"]->protocol["computer"],
                "playerTotalScore" => $_SESSION["game"]->playerTotalScore,
                "computerTotalScore" => $_SESSION["game"]->computerTotalScore,
                "playerWin" => $_SESSION["game"]->playerWin,
            ];
            $body = renderView("layout/results.php", $data);
            sendResponse($body);
            return;

        } else if ($method === "GET" && $path === "/session/destroy") {
            destroySession();
            redirectTo(url("/session"));
            return;
        } else if ($method === "GET" && $path === "/debug") {
            $body = renderView("layout/debug.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/twig") {
            $data = [
                "header" => "Twig page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = renderTwigView("index.html", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/some/where") {
            $data = [
                "header" => "Rainbow page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = renderView("layout/page.php", $data);
            sendResponse($body);
            return;
        }

        $data = [
            "header" => "404",
            "message" => "The page you are requesting is not here. You may also checkout the HTTP response code, it should be 404.",
        ];
        $body = renderView("layout/page.php", $data);
        sendResponse($body, 404);
    }
}
