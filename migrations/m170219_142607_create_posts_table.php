<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 * Has foreign keys to the tables:
 *
 * - `users`
 */
class m170219_142607_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'body' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-posts-user_id',
            'posts',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-posts-user_id',
            'posts',
            'user_id',
            'users',
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
            'fk-posts-user_id',
            'posts'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-posts-user_id',
            'posts'
        );

        $this->dropTable('posts');
    }
}
