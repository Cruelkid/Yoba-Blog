<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $name
 * @property string $password_hash
 * @property string $password (write-only)
 * @property string $email
 * @property string $access_token
 * @property string $auth_key
 *
 * @property Comment[] $comment
 * @property Posts[] $posts
 */
class User extends ActiveRecord implements IdentityInterface
{

    const SALT = 'blablabla';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'password_hash', 'email'], 'required'],
            [['name', 'email'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 32],
            [['access_token', 'auth_key'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'password_hash' => 'Password Hash',
            'email' => 'Email',
        ];
    }

    public function setPassword($password) {
        $this->password_hash=$this->hashPassword($password);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['user_id' => 'id']);
    }

    public static function findIdentity($id) {
        return self::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return self::findOne(['access_token' => $token]);
    }

    public function getId() {
        return $this->id;
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function validateAuthKey($auth_key) {
        return $this->auth_key===$auth_key;
    }

    public static function findByEmail($email) {
        return self::findOne(['email' => $email]);
    }

    public function validatePassword($password) {
        return $this->password_hash === $this->hashPassword($password);
    }

    public function hashPassword($password) {
        return md5(self::SALT.$password.self::SALT);
    }

    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

}
