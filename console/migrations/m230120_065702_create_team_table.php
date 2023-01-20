<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%team}}`.
 */
class m230120_065702_create_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%team}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->comment('Назва'),
            'description' => $this->text()->comment('Опис'),
            'file' => $this->string()->comment('Зображення'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%team}}');
    }
}
