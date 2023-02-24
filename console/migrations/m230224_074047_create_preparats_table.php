<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%preparats}}`.
 */
class m230224_074047_create_preparats_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%preparats}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Назва препапрату'),
            'file' => $this->string()->comment('Зображення'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%preparats}}');
    }
}
