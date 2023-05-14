<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%specialists}}`.
 */
class m230509_064135_add_info_column_to_specialists_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%specialists}}', 'info', $this->text()->comment('Інформація про спеціаліста'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%specialists}}', 'info');
    }
}
