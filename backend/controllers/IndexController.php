<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Index;

/**
 * INdex controller
 */
class IndexController extends Controller
{
//    public $data;

    public function actionIndex(){

//        $model = new Index();
//        $this->data = $model->content();
//        $this->render('index.php', array('data' => $this->data));
        $this->render('index.php');
    }
}