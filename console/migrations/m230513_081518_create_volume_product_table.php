<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%volume_product}}`.
 */
class m230513_081518_create_volume_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%volume_product}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->comment('Товар'),
            'volume_val' => $this->string()->comment('ml'),
            'volume_int' => $this->integer()->comment('К-ть'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%volume_product}}');
    }
}
