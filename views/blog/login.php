<?php 
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;

	$this->title = "Login";
?>
<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>
	<p>Please fill out these fields to login:</p>
	<div class="row">
		<div class="col-md-5 col-sm-12">
			<?php $form = ActiveForm::begin(); ?>

				<?= $form->field($loginForm, 'email')->textInput(['autofocus' => true]); ?>
				<?= $form->field($loginForm, 'password')->passwordInput(); ?>
				<?= $form->field($loginForm, 'rememberMe')->checkbox(); ?>

				<div class="form-group">
					<?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
				</div>	
			<?php ActiveForm::end(); ?>
		</div>
	</div>		
</div>