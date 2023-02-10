<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m230202_084722_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Назва статті'),
            'slug' => $this->string()->comment('Slug'),
            'created_at' => $this->integer()->comment('Дата публікації'),
            'updated_at' => $this->integer()->comment('Дата оновлення'),
            'name_header' => $this->string()->comment('Заголовок'),
            'text' => $this->text()->comment('Текст'),
            'file' => $this->string()->comment('Зображення'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
