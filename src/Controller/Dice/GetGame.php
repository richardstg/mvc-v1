<?php

declare(strict_types=1);

namespace Rist\Controller\Dice;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\renderView;

/**
 * Controller for initializing the game.
 */
class GetGame
{
    public function __invoke(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $_SESSION["game"] = null;
        $body = renderView("layout/gameinit.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
}
