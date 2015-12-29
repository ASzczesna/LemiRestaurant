<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property integer $IdEmail
 * @property string $senderName
 * @property string $senderEmail
 * @property string $Subject
 * @property string $Content
 * @property string $Note
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['senderName', 'senderEmail', 'Subject', 'Content'], 'required'],
            [['senderName', 'senderEmail', 'Subject'], 'string', 'max' => 100],
            [['Content'], 'string', 'max' => 1000],
            [['Note'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdEmail' => 'Id Email',
            'senderName' => 'Sender Name',
            'senderEmail' => 'Sender Email',
            'Subject' => 'Subject',
            'Content' => 'Content',
            'Note' => 'Note',
        ];
    }
}
