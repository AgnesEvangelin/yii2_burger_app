<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%items}}`.
 */
class m200819_163904_create_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%items}}', [
            'id' => $this->primaryKey(),
            'quantity' => $this->integer(12),
            'burger_id' => $this->integer(12)->notNull(),
            'ingredient_id' =>$this->integer(12)->notNull(),
            

        ]);
        $this->addForeignKey(
            '{{%fk-items-burger_id}}',
            '{{%items}}',
            'burger_id',
            '{{%burger}}',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            '{{%fk-items-ingredient_id}}',
            '{{%items}}',
            'ingredient_id',
            '{{%ingredients}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%items}}');
    }
}
