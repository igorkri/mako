<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_service}}`.
 */
class m230122_075603_create_category_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_service}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->comment(''),
            'name' => $this->string(255)->unique()->comment(''),
            'slug' => $this->string(255)->unique()->comment('Slug'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category_service}}');
    }
}
