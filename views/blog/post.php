<?php
use app\models\Comment;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->title = $model->title;
?>
<div class="post">
	<div class="title"><?= $model->title; ?></div>
	<div class="author">by <?=$model->user->name; ?></div>
	<div class="text"><?= $model->body; ?></div>
	<div class="timestamp">at <?= $model->created_at; ?></div>
</div>
<?= $this->render("_comments", ['comments' => $model->comments]) ?>
<?php if(!Yii::$app->user->isGuest): ?>
	<?php
		$commentForm = new Comment();
	?>
	<?= $this->render("_commentForm", ['commentForm' => $commentForm]) ?>
<?php endif; ?>
