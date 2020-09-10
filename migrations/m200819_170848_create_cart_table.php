<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart}}`.
 */
class m200819_170848_create_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'burger_id' => $this->integer(12)->notNull(),
        ]);
        $this->addForeignKey(
            '{{%fk-cart-burger_id}}',
            '{{%cart}}',
            'burger_id',
            '{{%burger}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cart}}');
    }
}
