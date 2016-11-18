<?php

namespace haqqi\storm;

/**
 * This module is only need in terms of development, sample, and demo
 *
 * Class Module
 * @package haqqi\storm
 */
class Module extends \yii\base\Module {

  public function init() {
    parent::init();

    \Yii::configure($this, require(__DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php'));
  }
}