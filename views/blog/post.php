<?php
use yii\bootstrap\ActiveForm;
$this->title = $model->title;
?>
<div class="post">
	<div class="title"><?= $model->title; ?></div>
	<div class="author">by <?=$model->user->name; ?></div>
	<div class="text"><?= $model->body; ?></div>
	<div class="timestamp">at <?= $model->created_at; ?></div>
</div>
		<div class="comments">
			<?php foreach ($model->comments as $comment): ?>
				<div class="comment">
					<div class="comment-title"><?= $comment->title; ?></div>
					<div class="comment-author">by <?= $comment->user->name ?></div>
					<div class="comment-body"><?= $comment->body; ?></div>
					<div class="comment-timestamp">at <?= $comment->created_at; ?></div>
				</div>
			<?php endforeach; ?>
			</div>
			<?php if(!empty($commentForm)): ?>
				<h1><center>Please enter your comment</center></h1>
				<?php $form = ActiveForm::begin(); ?>
					<?= $form->field($commentForm, 'title')->textInput(); ?>
					<?= $form->field($commentForm, 'body')->textarea(); ?>
					<input type="submit" name="submit" value="Comment">
				<?php ActiveForm::end(); ?>
			<?php endif; ?>
