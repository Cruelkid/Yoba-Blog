<?php

use app\models\Comment;
use yii\helpers\Html;
?>
<div class="comments">
	<?php foreach ($comments as $comment): ?>
		<div class="comment">
			<div class="comment-author">by <?= $comment->user->name ?></div>
			<div class="comment-body"><?= $comment->body; ?></div>
			<div class="comment-timestamp">at <?= $comment->created_at; ?></div>
			<?php if(!empty($comment->comments)): ?>
				<div class="subcomments">
					<?= $this->render("_comments", ['comments' => $comment->comments]) ?>
				</div>
			<?php endif; ?>
			<?php if(!Yii::$app->user->isGuest): ?>
				<?= Html::button("Reply", [
					'class' => 'btn',
					'onclick' => '$(".comment-form").hide();$("#comment_form_'.$comment->id.'").show()',
				]) ?>
			<?php endif; ?>
			<?php if(!Yii::$app->user->isGuest): ?>
				<?php
					$commentForm = new Comment();
					$commentForm->parent_id = $comment->id;
				?>
				<div id="comment_form_<?= $comment->id ?>" class="comment-form">
					<?= $this->render("_commentForm", ['commentForm' => $commentForm]) ?>
				</div>	
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
