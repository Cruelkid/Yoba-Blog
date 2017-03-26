<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($commentForm, 'parent_id')->hiddenInput()->label(false); ?>
	<div class="row">
		<div class="col-sm-10">
			<?= $form->field($commentForm, 'body')->textarea()->label(false); ?>
		</div>
		<div class="col-sm-2">
			<?= Html::submitButton('Comment', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
		</div>

	</div>	
<?php ActiveForm::end(); ?>