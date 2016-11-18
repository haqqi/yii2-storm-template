<?php
/**
 * @var \yii\web\View $this
 */

use haqqi\storm\Storm;
use haqqi\storm\widgets\SidebarMenu;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\materialicons\MD;
use yii\widgets\Breadcrumbs;

Storm::registerThemeAsset($this);

$this->beginPage();

?>
  <!DOCTYPE html>
  <html lang="<?= Yii::$app->language; ?>">
  <head>
    <meta charset="<?php echo Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- icon -->
    <?php echo Html::csrfMetaTags(); ?>
    <title><?php echo Html::encode($this->title); ?></title>

    <!-- js helper -->
    <script type="text/javascript">
      var BASE_URL = '<?= Url::base(true); ?>';
    </script>

    <!-- SEO things -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta name="robots" content="INDEX/FOLLOW">
    <?php $this->head(); ?>
  </head>
  <body>
  <?php $this->beginBody(); ?>

  <div id="wrapper">
    <!-- Top Navigation -->
    <header class="navbar navbar-static-top">
      <div class="navbar-header">
        <div id="logo-area">
          <a href="<?php echo Yii::$app->urlManager->createUrl([Storm::getComponent()->indexUri]); ?>">
            <img class="logo-small" src="<?php echo Storm::getAssetUrl($this) ?>/img/logo.png" alt="">
            <img class="logo-long" src="<?php echo Storm::getAssetUrl($this) ?>/img/logo-long.png" alt="">
          </a>
        </div>

        <!-- Toggle icon for mobile view -->
        <a id="sidebar-toggle" class="navbar-toggle" href="javascript:void(0)" data-toggle="collapse" data-target="#main-sidebar">
          <i class="mdi mdi-menu"></i>
        </a>
      </div>
    </header>
    <!-- End Top Navigation -->

    <!-- Left navbar-sidebar -->
    <aside id="main-sidebar" class="navbar-collapse collapse" role="navigation">
      <?php echo SidebarMenu::widget(); ?>
    </aside>
    <!-- Left navbar-sidebar end -->

    <!-- Page Content -->
    <div id="page-wrapper">
      <div id="page-content" class="container-fluid">
        <?php
        // setting up header
        $pageHeader = [];
        if(isset($this->params['pageBreadcrumb'])) $pageHeader['breadcrumb'] = $this->params['pageBreadcrumb'];
        if(isset($this->params['pageTitle'])) $pageHeader['title'] = $this->params['pageTitle'];
        if(isset($this->params['pageDescription'])) $pageHeader['description'] = $this->params['pageDescription'];

        if(count($pageHeader) > 0) {
        ?>
        <header id="page-header">
          <?php
          if(isset($pageHeader['breadcrumb'])) {
            echo Breadcrumbs::widget([
              'homeLink' => false,
              'links' => $pageHeader['breadcrumb']
            ]);
          }

          if(isset($pageHeader['title'])) {
            echo '<h1 class="title">'. $pageHeader['title'] .'</h1>';
          }
          if(isset($pageHeader['description'])) {
            echo '<div class="description">'. $pageHeader['description'] .'</div>';
          }

          ?>
        </header>
        <?php } ?>

        <?= $content; ?>
      </div>
      <footer id="main-footer">
        <?php echo isset($this->params['footer'])
          ? $this->params['footer']
          : '&copy; 2016 - Yii2 Storm Admin Template by ' . '<a href="http://blog.haqqi.net" target="_blank">Haqqi</a>' ; ?>
      </footer>
    </div>
    <!-- /#page-wrapper -->
  </div>




  <?php $this->endBody(); ?>
  </body>
  </html>

<?php
$this->endPage();
