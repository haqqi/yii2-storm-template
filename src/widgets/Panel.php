<?php

namespace haqqi\storm\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class Panel extends Widget {

  /**
   * @var HTML icon of the panel
   */
  public $icon;

  /**
   * @var string Title of the panel
   */
  public $title;

  /**
   * @var string Description in the heading
   */
  public $description;

  /**
   * @var if defined, you can use widget function
   */
  public $body;

  /**
   * @var string HTML for footer
   */
  public $footer;

  /**
   * @var string default|primary|danger|warning|info or you can add for your style
   */
  public $variant = 'default';

  /**
   * Will be called in begin
   */
  public function init() {
    parent::init();

    echo Html::beginTag('section', ['class' => 'panel panel-' . $this->variant]);

    $this->_renderHeading();
    echo Html::beginTag('div', ['class' => 'panel-body']);
  }

  /**
   * Will be called in end
   */
  public function run() {
    // render body
    if($this->body !== null) {
      echo $this->body;
    }
    echo Html::endTag('div');


    if($this->footer !== null) {
      echo Html::tag('footer', $this->footer, ['class' => 'panel-footer']);
    }
    echo Html::endTag('section');
  }

  private function _renderHeading() {
    if($this->title !== null) {
      echo Html::beginTag('header', ['class' => 'panel-heading']);

      echo Html::beginTag('h3', ['class' => 'panel-title']);
      if($this->icon !== null) {
        echo $this->icon . ' ';
      }
      echo $this->title;
      echo Html::endTag('h3');

      if($this->description !== null) {
        echo Html::tag('span', $this->description, ['class' => 'panel-description']);
      }

      echo Html::endTag('header');
    }
  }
}