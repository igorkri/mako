<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
class m230117_200507_create_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contacts}}', [
            'id' => $this->primaryKey(),
            'address' => $this->string()->comment('Адреса салону'),
            'phone' => $this->string()->comment('Телефон салону'),
            'salon_work_schedule' => $this->string()->comment('Графік роботи салону'),
            'maps' => $this->text()->comment('google карта салону'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contacts}}');
    }
}
