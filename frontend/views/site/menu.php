<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\db\mysql;
use yii\bootstrap\Nav;


$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-menu">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    //<span data-toggle="tooltip"  data-placement="top" title="first tooltip">
    //<span data-toggle="popover" data-placement="bottom" title="first tooltip">hover over me</span></span>

    $mainLocal = require( dirname(__FILE__) .'/../../../common/config/main-local.php');
    $dbData = $mainLocal['components']['db'];

    $connection = new $dbData['class']([
        'dsn' => $dbData['dsn'],
        'username' => $dbData['username'],
        'password' => $dbData['password'],
        'charset' => $dbData['charset'],
    ]);

    $connection->open();

    //pobieram kategorie z bazy
    $cmd = $connection->createCommand('SELECT * FROM categories ORDER BY idcategory');
    $categories = $cmd->queryAll();
    //var_dump($categories);

    // pobieram dania z bazy
    $cmd = $connection->createCommand('SELECT * FROM dishes');
    $dishes = $cmd->queryAll();
    //var_dump($dishes);

    $tempN;
    $tempD;
    $tempP;
    //wyświetlam kategorie jako nagłówki:
    for($i = 0; $i < count($categories); $i++) {
        $tempN = $categories[$i]['cname'];
//<span data-toggle='tooltip'  data-placement='top' title='Click the dish name to show description'>
        //</span>
        echo "
        <h2 class='col-lg-8 col-lg-offset-2'>$tempN</h2>";
        echo "<table class='tab col-lg-6 col-lg-offset-3'>";

        for ($j = 0; $j < count($dishes); $j++) {
            if ($categories[$i]['idcategory'] == $dishes[$j]['idcategory']) {
                $tempN = $dishes[$j]['dname'];
                $tempD = $dishes[$j]['description'];
                $tempP = $dishes[$j]['price'];
                echo "<tr >";

                echo "<td> $tempN</td>";
                echo "<td>$tempP</td>";
                echo "<td><i class='glyphicon glyphicon-info-sign' data-toggle='popover'  data-placement='right'  data-title='Description' data-content='$tempD'></i></td>";

                echo "</tr>";
            }
        }
        echo "
        </table>
        ";
    }
     ?>

</div>
