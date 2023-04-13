<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exchange_rates}}`.
 */
class m230413_073919_create_exchange_rates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%exchange_rates}}', [
            'id' => $this->primaryKey(),
            'USD' => $this->money(19,2)->comment('USD'),
            'EUR' => $this->money(19,2)->comment('EUR'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%exchange_rates}}');
    }
}
