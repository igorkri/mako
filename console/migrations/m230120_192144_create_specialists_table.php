<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%specialists}}`.
 */
class m230120_192144_create_specialists_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%specialists}}', [
            'id' => $this->primaryKey(),
            'profession' => $this->string()->comment('Професії'),
            'fio' => $this->string()->comment('ПІБ'),
            'photo' => $this->string()->comment('Фото'),
            'status' => $this->string()->comment('Статус'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%specialists}}');
    }
}
