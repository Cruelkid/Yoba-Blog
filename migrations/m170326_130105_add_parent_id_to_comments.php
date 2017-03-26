<?php

use yii\db\Migration;

class m170326_130105_add_parent_id_to_comments extends Migration
{
    public function up()
    {
        $this->execute ("ALTER TABLE comments ADD COLUMN parent_id int DEFAULT NULL");
    }

    public function down()
    {
        $this->execute ("ALTER TABLE comments DROP COLUMN parent_id");
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
