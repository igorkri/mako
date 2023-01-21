<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%video}}`.
 */
class m230121_064629_create_video_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%video}}', [
            'id' => $this->primaryKey(),
            'data' => $this->string()->comment('Дата'),
            'title' => $this->string()->comment('Назва відео'),
            'url_file' => $this->string()->comment('Посилання на відео'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%video}}');
    }
}
