<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m230413_070302_add_volume_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'volume_val', $this->string()->defaultValue('ml'));
        $this->addColumn('{{%product}}', 'volume_int', $this->money(19, 2)->defaultValue(0.00));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product}}', 'volume');
    }
}
