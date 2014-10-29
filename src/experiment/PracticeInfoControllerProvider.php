<?php

namespace Experiment;

use Silex\Application;
use Silex\ControllerProviderInterface;

class PracticeInfoControllerProvider implements ControllerProviderInterface
{
  public function connect(Application $app)
  {
    // creates a new controller based on the default route
    $controllers = $app['controllers_factory'];

    $controllers->get('/', function (Application $app) {
      return $app->json(array("title"=>'practice_info'),200);
    });

    return $controllers;
  }
}
