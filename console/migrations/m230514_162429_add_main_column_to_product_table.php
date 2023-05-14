<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m230514_162429_add_main_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'main', $this->integer()->defaultValue(0)->comment('Головний товар'));
        $this->addColumn('{{%product}}', 'group_id', $this->integer()->defaultValue(0)->comment('Група товарів'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product}}', 'main');
        $this->dropColumn('{{%product}}', 'group_id');
    }
}
