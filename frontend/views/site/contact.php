<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact us';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact text-center">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Questions? Complaints? Business proposals? Feel free to write Your thoughts. We will answer as soon as possible. :)</p>

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textArea(['rows' => 8]) ?>

<!--                <?//= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
//                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
//                ]) ?>-->

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
