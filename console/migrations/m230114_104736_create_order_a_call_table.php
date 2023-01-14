<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_a_call}}`.
 */
class m230114_104736_create_order_a_call_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_a_call}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Iм\'я'),
            'phone' => $this->string()->notNull()->comment('Номер телефону'),
            'address' => $this->string()->notNull()->comment('Адреса салону'),
            'signUpCheckbox' => $this->integer()->notNull()->defaultValue(1)->comment('Згода на обробку даних'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_a_call}}');
    }
}
