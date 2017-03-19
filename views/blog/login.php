<?php 
	use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($loginForm, 'email')->textInput(); ?>
	<?= $form->field($loginForm, 'password')->passwordInput(); ?>
	<?= $form->field($loginForm, 'rememberMe')->checkbox(); ?>

	<input type="submit" name="login" value="Login">

<?php ActiveForm::end(); ?>
