<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m230210_145900_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%producer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Назва виробника'),
            'file' => $this->string()->comment('Зображення'),
        ]);

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->string()->comment('Батьківська категорія'),
            'name' => $this->string()->comment('Назва категорії'),
        ]);

        $this->createTable('{{%series}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Назва серії'),
            'file' => $this->string()->comment('Зображення'),
        ]);

        $this->createTable('{{%delivery}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Служба доставки'),
            'file' => $this->string()->comment('Зображення'),
        ]);

        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Назва статусу'),
        ]);


        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->comment('Дата створення'),
            'updated_at' => $this->integer()->comment('Дата оновлення'),
            'published' => $this->integer()->defaultValue(1)->comment('Oпубліковано товар'),
            'name' => $this->string()->comment('Назва товару'),
            'description' => $this->text()->comment('Опис товару'),
            'indication' => $this->text()->comment('Показання'),
            'category_id' => $this->integer()->comment('Категорія'),
            'producer' => $this->string()->comment('Виробник'),
            'delivery_id' => $this->integer()->comment('Доставка'),
            'series_id' => $this->integer()->comment('Серія'),
            'status_id' => $this->integer()->comment('Статус'),
            'popular_product' => $this->integer()->defaultValue(0)->comment('Популярний товар'),
            'price' => $this->money(19, 2)->comment('Ціна'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
        $this->dropTable('{{%producer}}');
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%series}}');
        $this->dropTable('{{%delivery}}');
        $this->dropTable('{{%status}}');
    }
}
