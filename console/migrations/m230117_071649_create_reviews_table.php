<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reviews}}`.
 */
class m230117_071649_create_reviews_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reviews}}', [
            'id' => $this->primaryKey(),
            'data' => $this->string()->comment('Дата'),
            'сlient' => $this->string()->comment('Клієнт'),
            'comment' => $this->text()->comment('Коментар'),
            'procedure' => $this->string()->comment('Процедура'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reviews}}');
    }
}
