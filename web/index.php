<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/experiment/PracticeInfoControllerProvider.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
      return false;
}

$app = new Application();
$app['debug'] = true;

$app->get('/javascripts/{directory}/{file_name}', function($directory, $file_name) {
  return new Response(file_get_contents(__DIR__."/../src/javascripts/$directory/$file_name"),201,array('content-type'=>'application/javascript'));
});

$app->get('/', function(Request $request) {
  return new Response(file_get_contents(__DIR__."/views/index.html"),201);
});

$app->mount('/practice_info', new Experiment\PracticeInfoControllerProvider());

$app->get('/profile', function(Application $app, Request $request) {
  return $app->json(array("title"=>'profile'),200);
});

$app->run();
