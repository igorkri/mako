<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%category_service}}`.
 */
class m230227_054741_add_description_column_to_category_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%category_service}}', 'description', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%category_service}}', 'description');
    }
}
