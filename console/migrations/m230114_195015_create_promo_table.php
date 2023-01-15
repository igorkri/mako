<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%promo}}`.
 */
class m230114_195015_create_promo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%promo}}', [
            'id' => $this->primaryKey(),
            'file' => $this->string()->comment('Зображення'),
            'begin_data' => $this->string()->notNull()->comment('Дата начала акції'),
            'end_data' => $this->string()->notNull()->comment('Дата закінчення акції'),
            'description' => $this->text()->notNull()->comment('Опис акції'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%promo}}');
    }
}
