<?php

declare(strict_types=1);

namespace Rist\Controller\Dice;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\renderView;

/**
 * Controller for playing the round.
 */
class GetResults
{
    public function __invoke(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        // $data = [
        //     "playerLastHandSum" => null,
        //     "roundPointsPlayer" => null,
        //     "roundPointsComputer" => null,
        //     "playerTotalScore" => null,
        //     "computerTotalScore" => null,
        //     "playerWin" => null,
        // ];

        // if (isset($_SESSION["game"])) {
            $data = [
                "playerLastHandSum" => $_SESSION["game"]->playerLastHandSum,
                "roundPointsPlayer" => $_SESSION["game"]->protocol["player"],
                "roundPointsComputer" => $_SESSION["game"]->protocol["computer"],
                "playerTotalScore" => $_SESSION["game"]->playerTotalScore,
                "computerTotalScore" => $_SESSION["game"]->computerTotalScore,
                "playerWin" => $_SESSION["game"]->playerWin,
            ];
        // }
        $body = renderView("layout/results.php", $data);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
}
