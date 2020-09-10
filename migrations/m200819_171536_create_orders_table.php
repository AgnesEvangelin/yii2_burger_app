<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m200819_171536_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'cart_id' => $this->integer(12)->notNull(),
            'user_id' => $this->integer(12)->notNull(),
            'order_address_id' => $this->integer(12)->notNull(),
        ]);
        $this->addForeignKey(
            '{{%fk-orders-cart_id}}',
            '{{%orders}}',
            'cart_id',
            '{{%cart}}',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            '{{%fk-orders-user_id}}',
            '{{%orders}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            '{{%fk-orders-order_address_id}}',
            '{{%orders}}',
            'order_address_id',
            '{{%orderaddress}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
