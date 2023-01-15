<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%order_a_call}}`.
 */
class m230114_223326_add_created_at_column_to_order_a_call_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%order_a_call}}', 'created_at', $this->integer()->comment('Дата створення'));
        $this->addColumn('{{%order_a_call}}', 'updated_at', $this->integer()->comment('Дата оновлення'));
        $this->addColumn('{{%order_a_call}}', 'status', $this->string()->comment('Статус'));
        $this->addColumn('{{%order_a_call}}', 'comment', $this->string()->comment('Коментар'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%order_a_call}}', 'created_at');
    }
}
