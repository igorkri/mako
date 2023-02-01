<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question_service}}`.
 */
class m230129_151529_create_question_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question_service}}', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer()->comment('Категорія послуги'),
            'question' => $this->text()->comment('Питання'),
            'reply' => $this->text()->comment('Відповідь')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%question_service}}');
    }
}
