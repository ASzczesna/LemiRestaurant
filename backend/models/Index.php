<?php
namespace backend\models;

use yii\base\Model;
use Yii;

/**
 * infex page content
 */
class Index extends Model
{
    public $data;

    /**
     * @inheritdoc
     */
    public function content()
    {
        $this->btn = "<p><a class='btn btn-lg btn-info' href='/site/login'>Please login</a></p></div>";
        $this->txt = <<<ETQ
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
            <p class="text-center"><a class="btn btn-lg btn-default" href="/users">Users &raquo;</a></p>
        </div>
    </div>
</div></div>

<div class="body-content">
    <div class="row">
        <div class="col-lg-4">
            <p class="text-center"><a class="btn btn-lg btn-default" href="/dishes">Dishes &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <p class="text-center"><a class="btn btn-lg btn-default" href="/categories">Categories &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <p class="text-center"><a class="btn btn-lg btn-default" href="/users">Users &raquo;</a></p>
        </div>
    </div>
</div>
ETQ;

//        if (Yii::$app->user->isGuest) {
//            $data = "<p><a class='btn btn-lg btn-info' href='/site/login'>Please login</a></p></div>";
//        }else{
//$data = <<<ETQ
//</div>
//<div class="body-content">
//    <div class="row">
//        <div class="col-lg-4">
//            <p class="text-center"><a class="btn btn-lg btn-default" href="/dishes">Dishes &raquo;</a></p>
//        </div>
//        <div class="col-lg-4">
//            <p class="text-center"><a class="btn btn-lg btn-default" href="/categories">Categories &raquo;</a></p>
//        </div>
//        <div class="col-lg-4">
//            <p class="text-center"><a class="btn btn-lg btn-default" href="/users">Users &raquo;</a></p>
//        </div>
//    </div>
//</div></div>
//
//<div class="body-content">
//    <div class="row">
//        <div class="col-lg-4">
//            <p class="text-center"><a class="btn btn-lg btn-default" href="/dishes">Dishes &raquo;</a></p>
//        </div>
//        <div class="col-lg-4">
//            <p class="text-center"><a class="btn btn-lg btn-default" href="/categories">Categories &raquo;</a></p>
//        </div>
//        <div class="col-lg-4">
//            <p class="text-center"><a class="btn btn-lg btn-default" href="/users">Users &raquo;</a></p>
//        </div>
//    </div>
//</div>
//ETQ;
//
//        }
        return $data;
    }
}
