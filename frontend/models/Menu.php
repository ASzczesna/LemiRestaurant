<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Menu is the model behind the menu page.
 */
class Menu extends Model
{
    public $connection;                 // odpowiada za połączenie z db
    public $categories;                 // tablica kategorii z bazy
    public $dishes;                     // tablica dań z bazy
    public $HTMLcontent = '';                // cała treść strony do wyświetlenia

    public function setConnection(){
        $mainLocal = require( dirname(__FILE__) .'/../../common/config/main-local.php');
        $dbData = $mainLocal['components']['db'];

        $this->connection = new $dbData['class']([
            'dsn' => $dbData['dsn'],
            'username' => $dbData['username'],
            'password' => $dbData['password'],
            'charset' => $dbData['charset'],
        ]);
    }

    public function getCategories(){    //pobieram kategorie z bazy
        $this->setConnection();
        $this->connection->open();


        $cmd = $this->connection->createCommand('SELECT * FROM categories ORDER BY idcategory');
        $this->categories = $cmd->queryAll();

        $this->connection->close();
    }

    public function getDishes(){        //pobieram kategorie z bazy
        $this->setConnection();
        $this->connection->open();


        $cmd = $this->connection->createCommand('SELECT * FROM dishes');
        $this->dishes = $cmd->queryAll();

        $this->connection->close();
    }

    public  function showMenu(){
        // $tempN; - name string
        // $tempD; - description string
        // $tempP; - price number

        $this->getCategories();
        $this->getDishes();

        //wyświetlam kategorie jako nagłówki:
        for($i = 0; $i < count($this->categories); $i++) {
            $tempN = $this->categories[$i]['cname'];
            $this->HTMLcontent .= "<h2 class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12'>$tempN</h2>\n";
            $this->HTMLcontent .= "<table class='tab col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-xs-10'>\n";

            for ($j = 0; $j < count($this->dishes); $j++) {
                if ($this->categories[$i]['idcategory'] == $this->dishes[$j]['idcategory']) {
                    $tempN = $this->dishes[$j]['dname'];
                    $tempD = $this->dishes[$j]['description'];
                    $tempP = $this->dishes[$j]['price'];

//                    $this->HTMLcontent .= "<tr >\n<td> $tempN</td>\n<td>$tempP zł</td>\n<td class='visible-lg visible-md'><i class='glyphicon glyphicon-info-sign' data-toggle='popover'  data-placement='right'  data-title='Description' data-content='$tempD'></i></td>\n<td class='visible-sm visible-xs'><i class='glyphicon glyphicon-info-sign' data-toggle='popover'  data-placement='top' data-title='Description' data-content='$tempD'></i></td>\n</tr>\n";

                    $this->HTMLcontent .= "<tr >\n";

                    $this->HTMLcontent .= "<td> $tempN</td>\n";
                    $this->HTMLcontent .= "<td>$tempP zł</td>\n";
                    $this->HTMLcontent .= "<td class='visible-lg visible-md'><i class='glyphicon glyphicon-info-sign' data-toggle='popover'  data-placement='right'  data-title='Description' data-content='$tempD'></i></td>\n";
                    $this->HTMLcontent .= "<td class='visible-sm visible-xs'><i class='glyphicon glyphicon-info-sign' data-toggle='popover'  data-placement='top' data-title='Description' data-content='$tempD'></i></td>\n";

                    $this->HTMLcontent .= "</tr>\n";
                }
            }
            $this->HTMLcontent .= "</table>\n";
        }
        return $this->HTMLcontent;
    }

}