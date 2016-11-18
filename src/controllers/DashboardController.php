<?php
/**
 * Created by PhpStorm.
 * User: Haqqi
 * Date: 11/18/2016
 * Time: 6:26 PM
 */

namespace haqqi\storm\controllers;


use yii\web\Controller;

class DashboardController extends Controller {
  public function actionIndex() {
    return $this->render('index');
  }
}