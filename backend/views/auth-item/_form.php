<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \backend\models\AuthRule;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput()->label('ROLE:1 / PERMISSION:2') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<?php
// echo $form->field($model, 'rule_name')->dropDownList(
//        ArrayHelper::map(AuthRule::find()->all(), 'name', 'name'),
//        ['prompt' => 'Select category']
//    )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
