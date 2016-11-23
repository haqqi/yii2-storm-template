<?php

namespace haqqi\storm\assets;

use haqqi\storm\Storm;
use yii\base\InvalidConfigException;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Class StormAsset
 * @package haqqi\storm\assets
 */
class StormAsset extends AssetBundle {

  public $sourcePath = '@haqqi/storm/web';

  public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
    'yii\bootstrap\BootstrapPluginAsset',
    'mimicreative\assets\Html5ShivAsset',
    'mimicreative\assets\RespondAsset',
    'mimicreative\assets\SimpleLineIconsAsset',
    'mimicreative\assets\MetisMenuAsset',
    'mimicreative\assets\ScrollatorAsset',
    'rmrevin\yii\fontawesome\AssetBundle',
    'yii\materialicons\AssetBundle'
  ];

  public $css = [
    // default font
    '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i',
    '//fonts.googleapis.com/css?family=Oswald:300,400,700',

    // main css file
    'css/storm-main.css'
  ];

  public $js = [
    'js/storm-main.js'
  ];

  public $publishOptions = [
    'forceCopy' => YII_ENV == YII_ENV_DEV ? true : false
  ];

  public function init() {
    parent::init();
    // special config for jquery file

    // we need to catch if the object is already created
    if(isset(\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'])) {
      \Yii::configure(\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'], [
        'js' => ['jquery.min.js'],
        'jsOptions' => ['position' => \yii\web\View::POS_HEAD]
      ]);
    }
    else {
      \Yii::$app->assetManager->bundles['yii\web\JqueryAsset']['js']        = ['jquery.min.js'];
      \Yii::$app->assetManager->bundles['yii\web\JqueryAsset']['jsOptions'] = ['position' => \yii\web\View::POS_HEAD];
    }

    // minify bootstrap
    if(isset(\Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'])) {
      \Yii::configure(\Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'], [
        'css' => ['css/bootstrap.min.css']
      ]);
    }
    else {
      \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset']['css'] = ['css/bootstrap.min.css'];
    }

    // minify plugins
    if(isset(\Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset'])) {
      \Yii::configure(\Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset'], [
        'js' => ['js/bootstrap.min.js'],
        'jsOptions' => ['position' => \yii\web\View::POS_HEAD]
      ]);
    }
    else {
      // special config for bootstrap js
      \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset']['js']        = ['js/bootstrap.min.js'];
      \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset']['jsOptions'] = ['position' => \yii\web\View::POS_HEAD];
    }

    // exclude metisMenu CSS. We create our own!
    \Yii::$app->assetManager->bundles['mimicreative\assets\MetisMenuAsset']['css'] = [];

    $this->_setupStyle();
  }

  private function _setupStyle() {
    $style = Storm::getComponent()->style;

    if(is_file(\Yii::getAlias($this->sourcePath . '/css/style/') . $style . '.css')) {
      $style = 'css/style/' . $style . '.css';
    } else {
      throw new InvalidConfigException('Style name is not exists');
    }

    // add css style
    array_push($this->css, $style);
  }
}