<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%service_gallery}}`.
 */
class m230309_164806_add_position_column_to_service_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%service_gallery}}', 'position', $this->integer()->comment('Порядок відображення'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%service_gallery}}', 'position');
    }
}
