<?php

/**
 * Load the routes into the router, this file is included from
 * `htdocs/index.php` during the bootstrapping to prepare for the request to
 * be handled.
 */

declare(strict_types=1);

use FastRoute\RouteCollector;

$router = $router ?? new RouteCollector(
    new \FastRoute\RouteParser\Std(),
    new \FastRoute\DataGenerator\MarkBased()
);

$router->addRoute("GET", "/test", function () {
    // A quick and dirty way to test the router or the request.
    return "Testing response";
});

$router->addRoute("GET", "/", "\Mos\Controller\Index");
$router->addRoute("GET", "/debug", "\Mos\Controller\Debug");
$router->addRoute("GET", "/twig", "\Mos\Controller\TwigView");

$router->addGroup("/session", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Mos\Controller\Session", "index"]);
    $router->addRoute("GET", "/destroy", ["\Mos\Controller\Session", "destroy"]);
});

$router->addGroup("/some", function (RouteCollector $router) {
    $router->addRoute("GET", "/where", ["\Mos\Controller\Sample", "where"]);
});


// Dice game routes
$router->addRoute("GET", "/game", "\Rist\Controller\Dice\GetGame");
$router->addRoute("POST", "/game", "\Rist\Controller\Dice\PostGame");
$router->addRoute("GET", "/play", "\Rist\Controller\Dice\GetPlay");
$router->addRoute("POST", "/play", "\Rist\Controller\Dice\PostPlay");
$router->addRoute("POST", "/computerplay", "\Rist\Controller\Dice\PostComputerPlay");
$router->addRoute("GET", "/results", "\Rist\Controller\Dice\GetResults");

// Yatzy game routes
$router->addRoute("GET", "/yatzy", "\Rist\Controller\Yatzy\GetYatzy");
$router->addRoute("POST", "/yatzy", "\Rist\Controller\Yatzy\PostYatzy");
$router->addRoute("GET", "/yatzy/play", "\Rist\Controller\Yatzy\GetYatzyPlay");
$router->addRoute("POST", "/yatzy/play", "\Rist\Controller\Yatzy\PostYatzyPlay");
$router->addRoute("POST", "/yatzy/count", "\Rist\Controller\Yatzy\PostYatzyCount");
$router->addRoute("GET", "/yatzy/results", "\Rist\Controller\Yatzy\GetYatzyResults");
$router->addRoute("POST", "/yatzy/results", "\Rist\Controller\Yatzy\PostYatzyResults");
