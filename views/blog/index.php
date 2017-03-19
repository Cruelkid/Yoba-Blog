<?php 

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Yoba Blog';
?>
<div class="posts">
	<?php foreach ($models as $model): ?>
		<div class="post">
			<div class="title"><a href="<?= Url::to(['blog/post', 'id'=>$model->id]) ?>"><?= $model->title; ?></a></div>
			<div class="author">by <?=$model->user->name; ?></div>
			<div class="text"><?= $model->body; ?></div>
			<div class="timestamp">at <?= $model->created_at; ?></div>
			<?php if (!empty($model->comments)): ?>
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
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
	<?php if(!empty($postForm)): ?>
		<h1><center>Please create your post</center></h1>
		<?php $form = ActiveForm::begin(); ?>
			<?= $form->field($postForm, 'title')->textInput(); ?>
			<?= $form->field($postForm, 'body')->textarea(); ?>
			<input type="submit" name="post" value="Post">
		<?php ActiveForm::end(); ?>
	<?php endif; ?>
</div>