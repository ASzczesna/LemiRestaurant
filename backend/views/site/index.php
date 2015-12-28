<?php

/* @var $this yii\web\View */

$this->title = 'LR backend';

?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Here's the backroom of restaurant:</h2>
<!--        --><?php
//            if (Yii::$app->user->isGuest) {
//                echo "<p><a class='btn btn-lg btn-info' href='/site/login'>Please login</a></p>";
//            }
//        ?>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <p class="text-center"><a class="btn btn-lg btn-default" href="/dishes">Dishes &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p class="text-center"><a class="btn btn-lg btn-default" href="/categories">Categories &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <p class="text-center"><a class="btn btn-lg btn-default" href="/user">Users &raquo;</a></p>
            </div>
        </div>
    </div>
</div>




