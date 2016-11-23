<?php

namespace haqqi\storm\controllers;

use haqqi\storm\Storm;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\Response;

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

  public function behaviors() {
    $behaviors = parent::behaviors();

    // make the response json according to the request
    $behaviors['contentNegotiator'] = [
      'class'   => ContentNegotiator::className(),
      'formats' => [
        'application/json' => Response::FORMAT_JSON,
        'text/html'        => Response::FORMAT_HTML
      ],
    ];

    return $behaviors;
  }
}