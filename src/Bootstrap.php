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

      /*
       * Setup the config of asset bundles
       */
      if(!$event->action->controller instanceof Controller) {
        $bundles =& $event->sender->assetManager->bundles;

        $bundles['yii\web\JqueryAsset']['js']        = ['jquery.min.js'];
        $bundles['yii\web\JqueryAsset']['jsOptions'] = ['position' => View::POS_HEAD];

        $bundles['yii\bootstrap\BootstrapAsset']['css'] = ['css/bootstrap.min.css'];

        $bundles['yii\bootstrap\BootstrapPluginAsset']['js']        = ['js/bootstrap.min.js'];
        $bundles['yii\bootstrap\BootstrapPluginAsset']['jsOptions'] = ['position' => View::POS_HEAD];

        $bundles['mimicreative\assets\MetisMenuAsset']['css'] = [];

//        \FB::log($event->sender->assetManager->bundles);
      }
    });
  }

}