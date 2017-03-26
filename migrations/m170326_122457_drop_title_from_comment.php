<?php

use yii\db\Migration;

class m170326_122457_drop_title_from_comment extends Migration
{
    public function up()
    {
        $this->execute ("ALTER TABLE comments DROP COLUMN title");

    }

    public function down()
    {
        $this->execute ("ALTER TABLE comments ADD COLUMN title varchar(255) DEFAULT NULL");
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
