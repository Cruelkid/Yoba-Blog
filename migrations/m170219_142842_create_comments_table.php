<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 * Has foreign keys to the tables:
 *
 * - `users`
 * - `posts`
 */
class m170219_142842_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'post_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'body' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-comments-user_id',
            'comments',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-comments-user_id',
            'comments',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        // creates index for column `post_id`
        $this->createIndex(
            'idx-comments-post_id',
            'comments',
            'post_id'
        );

        // add foreign key for table `posts`
        $this->addForeignKey(
            'fk-comments-post_id',
            'comments',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `users`
        $this->dropForeignKey(
            'fk-comments-user_id',
            'comments'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-comments-user_id',
            'comments'
        );

        // drops foreign key for table `posts`
        $this->dropForeignKey(
            'fk-comments-post_id',
            'comments'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-comments-post_id',
            'comments'
        );

        $this->dropTable('comments');
    }
}
