<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{


    public $auth_key;
    // public $name;
    

    public static function tableName()
    {
        return 'user';
    }


    public  function rules()
    {
        return [
            [['name', 'password'], "required", 'message'=>'{attribute} tidak boleh kosong'],
            [['name', 'password', 'user_type','name','is_login'], 'string'],
            ['name', 'unique'],
        ];
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        $users = self::find()->where(['name' => $username])->one();
        if (count($users)) {
            return new static($users);
        }
        return null;
    }

    public static function findById($id)
    {
        $users = self::find()->where(['user_id' => $id])->asArray()->one();
        if (count($users)) {
            return new static($users);
        }
        return null;
    }

    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === "124";
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        if (!preg_match('/^\$2[axy]\$(\d\d)\$[\.\/0-9A-Za-z]{22}/', $this->password, $matches)
            || $matches[1] < 4
            || $matches[1] > 30
        ) {
            // throw new InvalidParamException('Hash is invalid.');
            return false;
        }

        return Yii::$app->security->validatePassword($password, $this->password);
    }

 
    
}

