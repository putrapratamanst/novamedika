<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm2 extends Model
{
    public $nama;
    public $sandi;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // usernama and sandi are both required
            [['nama', 'sandi'], 'required','message'=>"{attribute} tidak boleh kosong"],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // sandi is validated by validatesandi()
            ['sandi', 'validateSandi'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nama' => 'Nama Petugas',
            'sandi' => 'Kata Sandi',
        ];
    }



    /**
     * Validates the sandi.
     * This method serves as the inline validation for sandi.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional nama-value pairs given in the rule
     */
    public function validateSandi($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validateSandi($this->sandi)) {
                $this->addError($attribute, 'Nama atau Kata Sandi Anda salah.');
            }
        }
    }

    /**
     * Logs in a user using the provided usernama and sandi.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[usernama]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->nama);
        }

        return $this->_user;
    }
}
