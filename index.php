<?php
require_once __DIR__.'/vendor/autoload.php';
use  GuzzleHttp\Client; 
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->get('/clima', function() use($app) {	
	$client =  new \GuzzleHttp\Client();
	$response= $client->get('http://api.openweathermap.org/data/2.5/weather?id=3991164&appid=7da43a27132645c98bca16b0c26e3369&units=metric');
	$JSON = $response->getBody();
	return new Response($JSON,200,array('Content-Type' => 'application/json'));
});

$app->run();