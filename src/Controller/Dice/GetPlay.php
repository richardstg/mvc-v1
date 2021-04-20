<?php

declare(strict_types=1);

namespace Rist\Controller\Dice;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\renderView;

/**
 * Controller for playing the round.
 */
class GetPlay
{
    public function __invoke(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        // $data = [
        //     "playerLastHand" => null,
        //     "playerLastHandSum" => null,
        //     "playerLastHandGraphical" => null,
        //     "totalPointsPlayer" => null,
        // ];

        // if (isset($_SESSION["game"])) {
            $data = [
                "playerLastHand" => $_SESSION["game"]->playerLastHand,
                "playerLastHandSum" => $_SESSION["game"]->playerLastHandSum,
                "playerLastHandGraphical" => $_SESSION["game"]->playerLastHandGraphical,
                "totalPointsPlayer" => $_SESSION["game"]->protocol["player"],
            ];
        // }

        $body = renderView("layout/play.php", $data);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
}
