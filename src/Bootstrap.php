<?php

namespace haqqi\storm;


use yii\base\Application;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface {

  public function bootstrap($app) {

    \FB::log($app);

    $app->on(Application::EVENT_BEFORE_REQUEST, function ($event) {
      \FB::log($event);
    });
  }

}