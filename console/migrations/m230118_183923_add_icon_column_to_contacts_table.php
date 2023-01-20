<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%contacts}}`.
 */
class m230118_183923_add_icon_column_to_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contacts}}', 'icon', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%contacts}}', 'icon');
    }
}
