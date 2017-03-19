<?php

use yii\db\Migration;

class m170219_133202_create_users extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'password_hash' => $this->string(32)->notNull(),
            'email' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('users');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
