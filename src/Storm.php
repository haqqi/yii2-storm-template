<?php

namespace haqqi\storm;


use haqqi\storm\assets\StormAsset;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\AssetBundle;

/**
 * Main class of the template to be defined in the component config file.
 *
 * Class Storm
 * @package haqqi\storm
 */
class Storm extends Component  {
  /**
   * @var string Final component name to be used in the application
   */
  public static $componentName = 'storm';

  /**
   * @var string Version of html template to be used
   */
  public static $version = '1.0';

  /**
   * @var AssetBundle The registered asset bundle
   */
  public static $assetBundle = null;



  ////////////////////////////////////////////
  ////// Constant area ///////////////////////
  ////////////////////////////////////////////

  // layout alternatives
  const LAYOUT_DEFAULT = 'default';

  // style alternatives
  const STYLE_DEFAULT = 'default';

  ////////////////////////////////////////////
  ///// Template variable area ///////////////
  ////////////////////////////////////////////

  /**
   * @var string Layout definition in component config
   */
  public $layout;

  /**
   * @var string Default directory of the layout
   */
  public $layoutDir = '@haqqi/storm/views/layouts';

  /**
   * @var string Style option for the layout
   */
  public $style;

  /**
   * @var string Index URI for generating url in the logo
   */
  public $indexUri = '/';

  /**
   * @var string Sidebar menu config file
   */
  public $sidebarMenuItemsPath;

  /**
   * Storm constructor.
   * @param array $config
   * @inheritdoc
   */
  public function __construct($config = []) {
    // default variable here

    $this->layout = self::LAYOUT_DEFAULT;
    $this->style = self::STYLE_DEFAULT;

    // @todo: Use default config
    $this->sidebarMenuItemsPath = __DIR__ . '/config/sidebar-menu.php';

    parent::__construct($config);
  }

  /**
   * @inheritdoc
   */
  public function init() {
    parent::init();

  }

  /**
   * @return Storm
   * @throws InvalidConfigException
   */
  public static function getComponent() {
    try {
      return \Yii::$app->get(self::$componentName);
    } catch (InvalidConfigException $ex) {
      throw new InvalidConfigException('Component name should be set and named "'. self::$componentName .'".');
    }
  }

  /**
   * Return the layout path using alias
   *
   * @param $layout string
   * @return string
   * @throws InvalidConfigException
   */
  public function getLayoutPath() {
    $layoutPath = $this->layoutDir . '/' . $this->layout;

    if(is_file(\Yii::getAlias($layoutPath) . '.php')) {
      return $layoutPath;
    } else {
      throw new InvalidConfigException('Layout name is not exists');
    }
  }

  /**
   * Get Asset URL
   *
   * @param $view
   * @return string
   */
  public static function getAssetUrl($view) {
    self::registerThemeAsset($view);

    return (self::$assetBundle instanceof AssetBundle) ? self::$assetBundle->baseUrl : '';
  }

  /**
   * @param $view \yii\web\View
   * @return StormAsset;
   */
  public static function registerThemeAsset($view) {
    if(self::$assetBundle == null) {
      // @todo: register asset bundle
      self::$assetBundle = StormAsset::register($view);
    }
  }
}
