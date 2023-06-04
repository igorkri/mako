<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%np_warehouse}}`.
 */
class m230604_100330_create_np_warehouse_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%np_warehouse}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer(),
            'ref' => $this->string(),
            'cityRef' => $this->string(),
            'shortAddress' => $this->string(),
            'cityDescription' => $this->string(),
            'description' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%np_warehouse}}');
    }
}
