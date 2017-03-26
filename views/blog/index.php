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
				<?= $this->render("_comments", ['comments' => $model->comments]) ?>
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