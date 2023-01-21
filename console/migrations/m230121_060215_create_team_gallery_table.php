<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%team_gallery}}`.
 */
class m230121_060215_create_team_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%team_gallery}}', [
            'id' => $this->primaryKey(),
            'file' => $this->string()->comment('Забраження')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%team_gallery}}');
    }
}
