<?php

use yii\db\Migration;

class m170319_140554_drop_access_toke_from_users extends Migration
{
    public function up()
    {
        $this->execute ("ALTER TABLE users DROP COLUMN access_token");
    }

    public function down()
    {
        $this->execute ("ALTER TABLE users ADD COLUMN access_token VARCHAR(64) NOT NULL");
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
