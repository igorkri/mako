<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group_products}}`.
 */
class m230514_154558_create_group_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group_products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Назва групи'),
            'product_id' => $this->integer()->comment('Товар'),
            'main' => $this->integer()->comment('Головний товар'),
        ]);

        $this->createIndex(
            'idx-group_products-product_id',
            'group_products',
            'product_id'
        );

        $this->addForeignKey(
            'fk-product-product_id',
            'group_products',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%group_products}}');
    }
}
