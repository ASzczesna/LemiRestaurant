<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required', 'message' => 'To pole jest wymagane.'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Istnieje już użytkownik o takiej nazwie'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['first_name', 'filter', 'filter' => 'trim'],
            ['first_name', 'required', 'message' => 'To pole jest wymagane.'],
            ['first_name', 'string', 'max' => 50],

            ['last_name', 'filter', 'filter' => 'trim'],
            ['last_name', 'required', 'message' => 'To pole jest wymagane.'],
            ['last_name', 'string', 'max' => 50],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => 'To pole jest wymagane.'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Istnieje już użytkownik o takim adresie.'],

            ['password', 'required', 'message' => 'To pole jest wymagane.'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
