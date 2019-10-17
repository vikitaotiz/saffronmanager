<?php

// concurrently request a number of URIs.
// return immediately once the first is completed, cancel all others.

use Clue\React\Buzz\Browser;
use Psr\Http\Message\ResponseInterface;

require __DIR__ . '/../vendor/autoload.php';

$loop = React\EventLoop\Factory::create();
$client = new Browser($loop);

$promises = array(
    $client->head('http://www.github.com/clue/http-react'),
    $client->get('https://httpbin.org/'),
    $client->get('https://google.com'),
    $client->get('http://www.lueck.tv/psocksd'),
    $client->get('http://www.httpbin.org/absolute-redirect/5')
);

React\Promise\any($promises)->then(function (ResponseInterface $response) use ($promises) {
    // first response arrived => cancel all other pending requests
    foreach ($promises as $promise) {
        $promise->cancel();
    }

    var_dump($response->getHeaders());
    echo PHP_EOL . $response->getBody();
});

$loop->run();
