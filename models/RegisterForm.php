<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['username'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['username'], 'unique', 'targetClass' => User::class, 'message' => 'This username has already been taken.'],
            [['email'], 'unique', 'targetClass' => User::class, 'message' => 'This email address has already been taken.'],
            [['password'], 'string', 'min' => 6],
        ];
    }

    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->created_at = time();
            $user->updated_at = time();
            return $user->save();
        }
        return false;
    }
}
