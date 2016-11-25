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