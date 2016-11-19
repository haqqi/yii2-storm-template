<?php

namespace haqqi\storm\controllers;

use yii\web\Controller;

class FeatureController extends Controller {
  public function actionIndex() {
    return $this->render('index');
  }

  public function actionGrid() {
    $this->view->title = 'Feature - Grid System | Yii2 Storm Admin Template';

    $this->view->params['pageBreadcrumb'] = [
      [
        'label' => 'Features',
        'url' => ['feature/index']
      ],
      'Grid System'
    ];
    $this->view->params['pageTitle'] = 'Grid System';
    $this->view->params['pageDescription'] = 'Standard Bootstrap grid and special Storm grid.';

    return $this->render('grid');
  }

  public function actionPanel() {
    $this->view->title = 'Feature - Panels | Yii2 Storm Admin Template';

    $this->view->params['pageBreadcrumb'] = [
      [
        'label' => 'Features',
        'url' => ['feature/index']
      ],
      'Panels'
    ];
    $this->view->params['pageTitle'] = 'Panels';
    $this->view->params['pageDescription'] = 'Useful panels you can use.';

    return $this->render('panel');
  }
}