<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 */
class m230122_083030_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'category_service_id' => $this->integer()->comment('Категорія послуги'),
            'short_description' => $this->string()->comment('Короткий опис послуги'),
            'description' => $this->text()->comment('Опис послуги'),
            'indication' => $this->text()->comment('Показання'),
//            'price' => $this->money(19, 2)->comment('Ціна за процедуру'),
            'price' => $this->text(1000)->comment('Ціна за процедуру'),
        ]);

        $this->createTable('{{%service_specialist}}', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer()->comment('Категорія послуги'),
            'specialist_id' => $this->string()->comment('Спеціаліст'),
        ]);

        $this->createTable('{{%service_video}}', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer()->comment('Категорія послуги'),
            'url' => $this->string()->comment('Посилання'),
            'name' => $this->string()->comment('Назва відео'),
        ]);

        $this->createTable('{{%service_gallery}}', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer()->comment('Категорія послуги'),
            'file' => $this->string()->comment('Зображення'),
        ]);

        $this->createTable('{{%service_question}}', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer()->comment('Категорія послуги'),
            'question' => $this->text()->comment('Питання'),
            'answer' => $this->text()->comment('Відповідь'),
        ]);

        $this->createIndex(
            'idx-service_specialist-service_id',
            'service_specialist',
            'service_id'
        );

        $this->createIndex(
            'idx-service_video-service_id',
            'service_video',
            'service_id'
        );

        $this->createIndex(
            'idx-service_gallery-service_id',
            'service_gallery',
            'service_id'
        );

        $this->createIndex(
            'idx-service_question-service_id',
            'service_question',
            'service_id'
        );

        $this->addForeignKey(
            'fk-service_specialist-service_id',
            'service_specialist',
            'service_id',
            'service',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-service_video-service_id',
            'service_video',
            'service_id',
            'service',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-service_gallery-service_id',
            'service_gallery',
            'service_id',
            'service',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-service_question-service_id',
            'service_question',
            'service_id',
            'service',
            'id',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service}}');
        $this->dropTable('{{%service_specialist}}');
        $this->dropTable('{{%service_video}}');
        $this->dropTable('{{%service_gallery}}');
        $this->dropTable('{{%service_question}}');
    }
}
