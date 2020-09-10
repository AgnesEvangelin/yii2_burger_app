<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orderaddress}}`.
 */
class m200819_171050_create_orderaddress_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orderaddress}}', [
            'id' => $this->primaryKey(),
            'name' =>$this->string(20),
            'street'=>$this->string(20),
            'city'=>$this->string(20),
            'pin'=>$this->integer(12),
            'phnum'=>$this->integer(12),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orderaddress}}');
    }
}
