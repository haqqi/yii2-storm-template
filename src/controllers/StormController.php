<?php

namespace haqqi\storm\controllers;

use haqqi\storm\Storm;
use yii\web\Controller;

/**
 * Class StormController
 *
 * Main controller that implements the layout of Storm Template
 *
 * @package haqqi\storm\controllers
 */
class StormController extends Controller {

  public function init() {
    parent::init();

    $this->layout = Storm::getComponent()->getLayoutPath();
  }
}