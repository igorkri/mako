<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%service}}`.
 */
class m230313_081748_add_parent_category_id_column_to_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%service}}', 'parent_category_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%service}}', 'parent_category_id');
    }
}
