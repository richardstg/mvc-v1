<?php

declare(strict_types=1);

namespace Rist\Controller\Yatzy;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\renderView;

/**
 * Controller for initializing the game.
 */
class GetYatzyPlay
{
    public function __invoke(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $data = [
            "numberOfRolls" => $_SESSION["yatzy"]->numberOfRolls,
            "diceHandGraphicalValues" => $_SESSION["yatzy"]->getDiceHandGraphicalValues(),
            "dicesToKeepIndexes" => $_SESSION["yatzy"]->getDicesToKeepIndexes(),
        ];

        $body = renderView("yatzy/playpage.php", $data);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
}
