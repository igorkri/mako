<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%work_in_mako}}`.
 */
class m230121_090700_create_work_in_mako_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%work_in_mako}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->comment('Назва пропозиції'),
            'description' => $this->text()->comment('Опис позиції'),
            'time' => $this->string()->comment('Часи роботи'),
            'money' => $this->string()->comment('Зарплата'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%work_in_mako}}');
    }
}
