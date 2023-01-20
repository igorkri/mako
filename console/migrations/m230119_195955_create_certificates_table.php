<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%certificates}}`.
 */
class m230119_195955_create_certificates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%certificates}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(1000)->comment('Назва сертифікату'),
            'file' => $this->string()->comment('Сертифікат')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%certificates}}');
    }
}
