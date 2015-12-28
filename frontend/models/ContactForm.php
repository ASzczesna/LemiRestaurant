<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
//    public function attributeLabels()
//    {
//        return [
//            'verifyCode' => 'Verification Code',
//        ];
//    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        $mainLocal = require( dirname(__FILE__) .'/../../common/config/main-local.php');
        $dbData = $mainLocal['components']['db'];

        $connection = new $dbData['class']([
            'dsn' => $dbData['dsn'],
            'username' => $dbData['username'],
            'password' => $dbData['password'],
            'charset' => $dbData['charset'],
        ]);

        $connection->open();

        $Mname = $_POST['ContactForm']['name'];
        $Memail = $_POST['ContactForm']['email'];
        $Msubject = $_POST['ContactForm']['subject'];
        $Mbody = $_POST['ContactForm']['body'];


        $cmd = $connection->createCommand("INSERT INTO
emails (senderName, senderEmail, Subject, Content)
VALUES ('$Mname', '$Memail', '$Msubject', '$Mbody')
");
        @$cmd->execute();

        return true;
    }
}
