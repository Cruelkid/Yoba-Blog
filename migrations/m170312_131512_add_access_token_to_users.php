<?php

use yii\db\Migration;

class m170312_131512_add_access_token_to_users extends Migration
{
    public function up()
    {
        $this->execute ("ALTER TABLE users ADD COLUMN access_token VARCHAR(64) NOT NULL");
    }

    public function down()
    {
        $this->execute ("ALTER TABLE users DROP COLUMN access_token");
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
