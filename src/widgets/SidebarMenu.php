<?php

namespace haqqi\storm\widgets;


use haqqi\storm\Storm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Menu;

class SidebarMenu extends Menu {

  /**
   * @var boolean whether to activate parent menu items when one of the corresponding child menu items is active.
   * The activated parent menu items will also have its CSS classes appended with [[activeCssClass]].
   */
  public $activateParents = true;

  /**
   * @var string the CSS class that will be assigned to the first item in the main menu or each submenu.
   */
  public $firstItemCssClass = 'first';

  /**
   * @var string the CSS class that will be assigned to the last item in the main menu or each submenu.
   */
  public $lastItemCssClass = 'last';

  /**
   * @var string the template used to render a list of sub-menus.
   * In this template, the token `{items}` will be replaced with the renderer sub-menu items.
   */
  public $submenuTemplate = "\n<ul class='sub-menu {level}' {aria-expanded}>\n{items}\n</ul>\n";

  /**
   * @var string the template used to render the body of a menu which is a link.
   * In this template, the token `{url}` will be replaced with the corresponding link URL;
   * while `{label}` will be replaced with the link text.
   * The token `{icon}` will be replaced with the corresponding link icon.
   * The token `{arrow}` will be replaced with the corresponding link arrow.
   * This property will be overridden by the `template` option set in individual menu items via [[items]].
   */
  public $linkTemplate = '<a {aria-expanded} href="{url}">{icon}{label}{badge}{arrow}</a>';

  public $headingTemplate = "{icon}{label}{badge}{arrow}";

  public function __construct($config = []) {
    // use sidebar menu items config or example
    $this->items = Storm::getComponent()->sidebarMenuItems;

    parent::__construct($config);
  }

  public function init() {
    parent::init();

    // make sure the theme asset is already registered
    Storm::registerThemeAsset($this->getView());

    // init the ul options
    Html::addCssClass($this->options, 'sidebar-nav');
//    $this->options['id'] = 'sidebar-menu';
  }

  /**
   * Renders the widget.
   */
  public function run() {
//    echo Html::beginTag('div', ['class' => 'slimscroll']);
    echo Html::beginTag('nav', ['id' => 'sidebar-menu']);

    parent::run();

    echo Html::endTag('nav');
//    echo Html::endTag('div');
  }

  /**
   * Recursively renders the menu items (without the container tag).
   * @param array $items the menu items to be rendered recursively
   * @param integer $level the item level, starting with 1
   * @return string the rendering result
   */
  protected function renderItems($items, $level = 1) {
    $n     = count($items);
    $lines = [];
    foreach ($items as $i => $item) {
      $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
      $tag     = ArrayHelper::remove($options, 'tag', 'li');
      $class   = [];
      // if the item is active
      if ($item['active']) {
        $class[] = $this->activeCssClass;
      }
      if ($i === 0 && $this->firstItemCssClass !== null) {
        $class[] = $this->firstItemCssClass;
      }
      if ($i === $n - 1 && $this->lastItemCssClass !== null) {
        $class[] = $this->lastItemCssClass;
      }

      // set parent flag
      $item['level'] = $level;

      if ($this->_isHeading($item)) {
        $class[] = 'heading';
      }

      // clear the url if it has children, to ensure metis menu works
      if (!empty($item['items'])) {
        ArrayHelper::remove($item, 'url', '');
      }


      if (!empty($class)) {
        if (empty($options['class'])) {
          $options['class'] = implode(' ', $class);
        } else {
          $options['class'] .= ' ' . implode(' ', $class);
        }
      }


      $menu = $this->renderItem($item);
      if (!empty($item['items'])) {
        $menu .= strtr($this->submenuTemplate, [
          '{level}'         => 'level-' . ($level + 1),
          '{aria-expanded}' => $this->_formatAriaExpanded($item),
          '{items}'         => $this->renderItems($item['items'], $level + 1)
        ]);
      }
      $lines[] = Html::tag($tag, $menu, $options);
    }
    return implode("\n", $lines);
  }

  /**
   * Check if the item is a heading or not
   *
   * @param $item
   * @return bool
   */
  private function _isHeading($item) {
    return (
      $item['level'] === 1 &&
      ArrayHelper::getValue($item, 'url', null) === null &&
      ArrayHelper::getValue($item, 'items', null) === null
    );
  }

  /**
   * Renders the content of a menu item.
   * Note that the container and the sub-menus are not rendered here.
   * @param array $item the menu item to be rendered. Please refer to [[items]] to see what data might be in the item.
   * @return string the rendering result
   */
  protected function renderItem($item) {
    $template = $this->_isHeading($item)
      ? $this->headingTemplate
      : ArrayHelper::getValue($item, 'template', $this->linkTemplate);

    return strtr($template, [
      '{aria-expanded}' => $this->_formatAriaExpanded($item),
      '{url}'           => $this->_formatItemUrl($item),
      '{label}'         => $this->_formatItemLabel($item),
      '{icon}'          => $this->_formatItemIcon($item),
      '{arrow}'         => $this->_formatItemArrow($item),
      '{badge}'         => $this->_formatItemBadge($item),
    ]);
  }

  private function _formatAriaExpanded($item) {
    if (!empty($item['items'])) {
      if ($item['active']) {
        return 'aria-expanded=\'true\'';
      } else {
        return 'aria-expanded=\'false\'';
      }
    }
  }

  /**
   * Format out item url
   * @param array $item given item
   * @return string item url
   */
  private function _formatItemUrl($item) {
    $url = ArrayHelper::getValue($item, 'url', '#');

    if ('#' === $url) {
      return 'javascript:;';
    }

    return \Yii::$app->urlManager->createUrl($url);
  }

  /**
   * Pulls out item label
   * @param array $item given item
   * @return string item label
   */
  private function _formatItemLabel($item) {
    $label = ArrayHelper::getValue($item, 'label', '');

    return sprintf('%s', $label);
  }

  /**
   * Pulls out item icon
   * @param array $item given item
   * @return string item icon
   */
  private function _formatItemIcon($item) {
    $icon = ArrayHelper::getValue($item, 'icon', null);

    if ($icon) {
      // add space after icon
      return $icon . ' ';
    }

    return '';
  }

  /**
   * Pulls out item arrow
   * @param array $item given item
   * @return string item arrow
   */
  private function _formatItemArrow($item) {
    $active = ArrayHelper::getValue($item, 'active', false);

//    $level = ArrayHelper::getValue($item, 'level', 1);

    $items = ArrayHelper::getValue($item, 'items', []);

    if (!empty($items)) {
      return Html::tag('i', '', ['class' => 'menu-arrow fa fa-angle-right' . ($active ? ' open' : '')]);
    }

    return '';
  }

  /**
   * Pulls out item badge
   * @param array $item given item
   * @return string item badge
   */
  private function _formatItemBadge($item) {
    return ArrayHelper::getValue($item, 'badge', '');
  }


}