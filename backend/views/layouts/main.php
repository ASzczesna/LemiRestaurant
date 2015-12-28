<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Block;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'LemiRestaurant backroom',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Register', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            [
                'label' => 'Dishes',
                'url' => ['/dishes'],
            ],
            [
                'label' => 'Categories',
                'url' => ['/categories'],
            ],
            [
                'label' => 'Users',
                'url' => ['/user'],
            ],
            [
                'label' => '|', 'options' => ['class' => 'separator visible-lg visible-md visible-sm'] ,

            ],
            [
                'label' => 'PermTypes',
                'url' => ['/auth-item'],
            ],
            [
                'label' => 'PermCombine',
                'url' => ['/auth-item-child'],
            ],
            [
                    'label' => 'AssignPerm',
                'url' => ['//auth-assignment'],
            ],
            [
                'label' => '|', 'options' => ['class' => 'separator visible-lg visible-md visible-sm'] ,
            ],
            [
                'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ]
        ];

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
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

        <p class="pull-right"><?php
            switch(rand(1,5)){
                case 1:
                    echo "<i class='glyphicon glyphicon-heart'></i>";
                    break;
                case 2:
                    echo "<i class='glyphicon glyphicon-off'></i>";
                    break;
                case 3:
                    echo "<i class='glyphicon glyphicon-music'></i>";
                    break;
                case 4:
                    echo "<i class=' glyphicon glyphicon-sunglasses'></i>";
                    break;
                case 5:
                    echo "<i class='glyphicon glyphicon-apple'></i>";
                    break;
            }
             ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
