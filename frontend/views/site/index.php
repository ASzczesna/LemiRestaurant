<?php

/* @var $this yii\web\View */

$this->title = "LR frontend";
$url = '../images/';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>LemiRestaurant</h1>
        <p class="lead">Welcome to first and only one completely virtual restaurant!</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-5 col-lg-offset-1">

                <img src="<?=$url?>bar.jpg" class="text-center col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 10px 0px;">

                <p class="text-justify">The menu takes its inspiration from classic American dishes like beef, lamb, pork and walleye, creatively prepared, vibrantly presented, and influenced by cuisines around the world reflecting the global, sophisticated, expanded palates of today. We invite You to visit the restaurant (this page) to come and feel this extraordinary atmosphere served in completely new way... :) </p>

                <p class="text-center "><a class="btn btn-success" href="/site/menu">Our Menu</a> <a class="btn btn-info" href="/site/contact">Write a message</a></p>

            </div>
            <div class="col-lg-5">
                <h2>Little gallery</h2>

                <p class="text-center">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?=$url?>restaurant1.jpg">
                        </div>
                        <div class="item">
                            <img src="<?=$url?>restaurant2.jpg">
                        </div>
                        <div class="item">
                            <img src="<?=$url?>restaurant3.jpg">
                        </div>
                        <div class="item">
                            <img src="<?=$url?>restaurant4.jpg">
                        </div>
                        <div class="item">
                            <img src="<?=$url?>restaurant5.jpg">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                </p>
            </div>
        </div>

    </div>
</div>
