<?php

use yii\base\Security;
use yii\db\Migration;

/**
 * Class m230927_142117_insert_into_items_and_currency
 */
class m230927_142117_insert_into_items_and_currency extends Migration
{
    const CURRENCIES = ['EUR', 'USD'];
    const DATE_START = '2022-01-01 00:00:00';
    const DATE_END = '2023-10-01 00:00:00';
    const COUNT_ITEMS = 40_000;

    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        for ($i = 0; $i < self::COUNT_ITEMS; $i++) {
            $this->insert('items', [
                'name' => (new yii\base\Security)->generateRandomString(rand(10, 30)),
                'category' => rand(1, 10),
                'price' => rand(1, 10_000),
                'currency' => self::CURRENCIES[rand(0, 1)],
            ]);
        }
        for ($date = new DateTime(self::DATE_START); $date <= new DateTime(self::DATE_END); $date->modify('+1 day')) {
            foreach (self::CURRENCIES as $currency) {
                $this->insert('currency', [
                    'date' => $date->format("Y-m-d"),
                    'currency' => $currency,
                    'value' => rand(10, 100),
                ]);
            }

        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('items');
        $this->truncateTable('currency');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230927_142117_insert_into_items_and_currency cannot be reverted.\n";

        return false;
    }
    */
}
