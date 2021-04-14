<?php

declare(strict_types=1);

namespace Rist\Controller\Yatzy;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\renderView;

/**
 * Controller for getting round results
 */
class GetYatzyResults
{
    public function __invoke(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $data = [
            "points" => $_SESSION["yatzy"]->points,
            "diceHandGraphicalValues" => $_SESSION["yatzy"]->getDiceHandGraphicalValues(),
        ];
        $body = renderView("yatzy/resultspage.php", $data);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
}
