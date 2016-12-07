<?php

namespace haqqi\storm;

use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\base\Event;
use yii\web\View;

class Bootstrap implements BootstrapInterface {

  public function bootstrap($app) {

    $app->on(Application::EVENT_BEFORE_REQUEST, function ($event) {
      /**
       * @var $event Event
       */

      \Yii::$container->set('yii\web\JqueryAsset', [
        'js'        => ['jquery.min.js'],
        'jsOptions' => ['position' => View::POS_HEAD]
      ]);

      \Yii::$container->set('yii\bootstrap\BootstrapAsset', [
        'css' => ['css/bootstrap.min.css']
      ]);

      \Yii::$container->set('yii\bootstrap\BootstrapPluginAsset', [
        'js'        => ['js/bootstrap.min.js'],
        'jsOptions' => ['position' => View::POS_HEAD]
      ]);

      \Yii::$container->set('mimicreative\assets\MetisMenuAsset', [
        'css' => []
      ]);
    });
  }

}