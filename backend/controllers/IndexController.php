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
    public $data;
    /**
     * @inheritdoc
     */
    public function content()
    {

        $model = new Index();
        if (Yii::$app->user->isGuest) {
            $this->data = $model->button;
            //return $model->button;
        }else {
            $this->data = $model->txt;
            //return $model->txt;
        }
    }

    public function actionIndex(){
        $this->render('index.php',array('data'=>$this->data));
    }
}