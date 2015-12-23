<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Dishes */

$this->title = 'Update Dishes: ' . ' ' . $model->iddish;
$this->params['breadcrumbs'][] = ['label' => 'Dishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddish, 'url' => ['view', 'id' => $model->iddish]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dishes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
