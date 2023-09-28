<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m230927_113802_create_tables_items_and_currency
 */
class m230927_113802_create_tables_items_and_currency extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('items', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'category' => $this->integer(2)->notNull(),
            'price' => $this->integer()->notNull(),
            'currency' => $this->string(3),
        ]);
        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'date' => $this->date(),
            'currency' => $this->string(3),
            'value' => $this->integer(3),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('items');
        $this->dropTable('currency');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230927_113802_create_tables_items_and_currency cannot be reverted.\n";

        return false;
    }
    */
}
