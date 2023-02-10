<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article}}`.
 */
class m230210_115757_add_file_thumb_column_to_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%article}}', 'file_thumb', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%article}}', 'file_thumb');
    }
}
