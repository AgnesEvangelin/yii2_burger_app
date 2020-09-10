<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%burger}}`.
 */
class m200819_163333_create_burger_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%burger}}', [
            'id' => $this->primaryKey(),
            'burger_id' => $this->string(12)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%burger}}');
    }
}
