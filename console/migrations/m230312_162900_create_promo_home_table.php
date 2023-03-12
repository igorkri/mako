<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%promo_home}}`.
 */
class m230312_162900_create_promo_home_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%promo_home}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Назва'),
            'file' => $this->string()->comment('Зображення'),
            'info' => $this->string(1100)->comment('Інформація'),
            'price_1' => $this->money(19, 2)->comment('Ціна 1'),
            'price_2' => $this->money(19, 2)->comment('Ціна 2'),
            'price_3' => $this->money(19, 2)->comment('Ціна 3'),
            'price_4' => $this->money(19, 2)->comment('Ціна 4'),
            'price_5' => $this->money(19, 2)->comment('Ціна 5'),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%promo_home}}');
    }
}
