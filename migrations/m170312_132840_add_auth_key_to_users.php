<?php

use yii\db\Migration;

class m170312_132840_add_auth_key_to_users extends Migration
{
    public function up()
    {
        $this->execute ("ALTER TABLE users ADD COLUMN auth_key VARCHAR(64) NOT NULL");
    }

    public function down()
    {
        $this->execute ("ALTER TABLE users DROP COLUMN auth_key");
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
