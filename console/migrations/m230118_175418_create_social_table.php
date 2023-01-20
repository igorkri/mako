<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%social}}`.
 */
class m230118_175418_create_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%social}}', [
            'id' => $this->primaryKey(),
            'icon' => $this->text()->comment('Іконка'),
            'name' => $this->string()->comment('Назва'),
            'link' => $this->text()->comment('Посилання'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%social}}');
    }
}
