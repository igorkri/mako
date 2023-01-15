<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%promo}}`.
 */
class m230115_191444_add_published_column_to_promo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%promo}}', 'published', $this->integer()->defaultValue(1)->comment('Опубліковано'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%promo}}', 'published');
    }
}
