<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dishes".
 *
 * @property integer $iddish
 * @property string $dname
 * @property string $description
 * @property integer $price
 * @property integer $idcategory
 *
 * @property Categories $idcategory0
 */
class Dishes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dishes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dname', 'price', 'idcategory'], 'required'],
            [['price', 'idcategory'], 'integer'],
            [['dname'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 150],
            [['dname'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddish' => 'Iddish',
            'dname' => 'Dname',
            'description' => 'Description',
            'price' => 'Price',
            'idcategory' => 'Idcategory',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcategory()
    {
        return $this->hasOne(Categories::className(), ['idcategory' => 'idcategory']);
    }
}
