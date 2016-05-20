<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `url_table`.
 */
class m160518_175741_create_url_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('Url', [
            'url_id' => Schema::TYPE_PK,
            'token' => Schema::TYPE_CHAR."(6) NOT NULL",
            'original' => Schema::TYPE_TEXT." NOT NULL",
        ]);

        $this->createIndex('token','Url','token');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('Url');
    }
}
