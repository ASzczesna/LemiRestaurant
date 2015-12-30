<?php

/* @var $this yii\web\View */
/* @var $model \frontend\models\Menu */

use yii\helpers\Html;
use yii\db\mysql;
use frontend\models\Menu;


$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-menu">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $content ?>
</div>
