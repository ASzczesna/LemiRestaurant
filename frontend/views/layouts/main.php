<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use nirvana\prettyphoto;
use yii\bootstrap\Carousel;


//nirvana\prettyphoto\PrettyPhoto::widget();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--    <script src="../../../vendor/bower/jquery/dist/jquery.js" type="text/javascript" charset="utf-8"></script>-->
<!--    <link rel="stylesheet" href="../../../vendor/bower/jquery-prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />-->
<!--    <script src="../../../vendor/bower/jquery-prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>-->

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php
$js = <<<'SCRIPT'
/* To initialize BS3 tooltips set this below */
$(function () {
    $("[data-toggle='tooltip']").tooltip();
});;
/* To initialize BS3 popovers set this below */
$(function () {
    $("[data-toggle='popover']").popover();
});
SCRIPT;
    // Register tooltip/popover initialization javascript
    $this->registerJs($js);
    ?>

</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    $test;
    NavBar::begin([
        'brandLabel' => 'LemiRestaurant',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Menu', 'url' => ['/site/menu']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
//
    ];
//    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => 'Register', 'url' => ['/site/signup']];
//        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
//    } else {
//        $menuItems[] = [
//            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
//            'url' => ['/site/logout'],
//            'linkOptions' => ['data-method' => 'post']
//        ];
//    }
    $test = Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    echo $test;
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Aleksandra Szczęsna <?= date('Y') ?></p>

        <p class="pull-right"><?php echo $test;?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
