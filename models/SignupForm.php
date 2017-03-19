<?php

namespace app\models;
use Yii;
use yii\base\Model;

class SignupForm extends Model {

	public $name;
	public $email;
	public $password;
	public $confirmPass;

	public function rules() {

		return [
			['name', 'trim'],
			['name', 'required'],
			['name', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This name has already been taken.'],
			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'string', 'max' => 255],
			['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email has already been taken.'],
			['password', 'required'],
			['password', 'string', 'min' => 4],
			['confirmPass', 'required'],
			['confirmPass', 'compare', 'compareAttribute' => 'password'],
		];

	}

	public function signup() {

		if(!$this->validate()) {
			return null;
		}

		$user = new User();
		$user->name = $this->name;
		$user->email = $this->email;
		$user->setPassword($this->password);
		$user->generateAuthKey();
		return $user->save() ? $user : null;

	}

	public function attributeLabels() {

		return [
			'confirmPass'=>'Password confirmation',
			'name'=>'Username',
		]; 

	}

}