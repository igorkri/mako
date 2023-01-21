<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%learning_in_mako}}`.
 */
class m230121_093122_create_learning_in_mako_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%learning_in_mako}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->comment('Назва курсу'),
            'description' => $this->text()->comment('Опис позиції'),
            'date' => $this->string()->comment('Термін навчання'),
            'file' => $this->string()->comment('Зображення'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%learning_in_mako}}');
    }
}
