<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_image}}`.
 */
class m230211_083644_create_product_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_image}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->comment('Товар'),
            'name' => $this->string()->unique()->comment('Зображення'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_image}}');
    }
}
