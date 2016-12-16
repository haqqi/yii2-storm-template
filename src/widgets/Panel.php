<?php

namespace haqqi\storm\widgets;

use yii\base\Widget;
use yii\bootstrap\Button;
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
   * @var array|string Collection of button for tools or html of tools
   */
  public $tools;

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
    if ($this->body !== null) {
      echo $this->body;
    }
    echo Html::endTag('div');


    if ($this->footer !== null) {
      echo Html::tag('footer', $this->footer, ['class' => 'panel-footer']);
    }
    echo Html::endTag('section');
  }

  private function _renderHeading() {
    // if just one of it is exists
    if ($this->title !== null || $this->tools !== null) {
      // header area
      echo Html::beginTag('header', ['class' => 'panel-heading']);

      $this->_renderTitle();

      $this->_renderTools();

      echo Html::endTag('header');
    }
  }

  private function _renderTitle() {
    if ($this->title !== null) {
      echo Html::beginTag('div', ['class' => 'panel-title']);

      echo Html::beginTag('h3');
      if ($this->icon !== null) {
        echo $this->icon . ' ';
      }
      echo $this->title;
      echo Html::endTag('h3');


      if ($this->description !== null) {
        echo Html::tag('span', $this->description, ['class' => 'description']);
      }

      echo Html::endTag('div');
    }
  }

  private function _renderTools() {
    if ($this->tools !== null) {
      echo Html::beginTag('div', ['class' => 'panel-tools']);

      if (is_array($this->tools)) {
        foreach ($this->tools as $tool) {
          echo Button::widget($tool);
        }
      } else {
        echo $this->tools;
      }

      echo Html::endTag('div');
    }
  }
}
