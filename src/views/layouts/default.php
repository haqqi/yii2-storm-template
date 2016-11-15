<?php
/**
 * @var \yii\web\View $this
 */

use haqqi\storm\Storm;
use haqqi\storm\widgets\SidebarMenu;
use yii\helpers\Html;
use yii\helpers\Url;

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
    <nav class="navbar navbar-static-top">
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
    </nav>
    <!-- End Top Navigation -->

    <!-- Left navbar-sidebar -->
    <aside id="main-sidebar" class="navbar-collapse collapse" role="navigation">
      <?php echo SidebarMenu::widget(); ?>
    </aside>
    <!-- Left navbar-sidebar end -->

    <!-- Page Content -->
    <div id="page-wrapper">
      <?= $content; ?>
    </div>
    <!-- /#page-wrapper -->
  </div>




  <?php $this->endBody(); ?>
  </body>
  </html>

<?php
$this->endPage();
