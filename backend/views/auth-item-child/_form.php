<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList(
            ArrayHelper::map(AuthItem::find()->all(), 'name', 'name'),
        ['prompt' => 'Select parent permission']
    )?>

    <?= $form->field($model, 'child')->dropDownList(
        ArrayHelper::map(AuthItem::find()->all(), 'name', 'name'),
        ['prompt' => 'Select child permission']
    )?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
