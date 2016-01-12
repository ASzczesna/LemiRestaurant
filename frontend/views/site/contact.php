<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Contact us';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact text-center">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Questions? Complaints? Business proposals? Feel free to write Your thoughts. We will answer as soon as possible. :)</p>

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Your name'])->label('') ?>

                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Your email address'])->label('') ?>

                <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Subject of the message'])->label('') ?>

                <?= $form->field($model, 'body')->textArea(['rows' => 8, 'placeholder' => 'What do You want to say?'])->label('') ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
