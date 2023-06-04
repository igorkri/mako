<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%np_city}}`.
 */
class m230604_100253_create_np_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%np_city}}', [
            'id' => $this->primaryKey(),
            'ref' => $this->string(),
            'name' => $this->string(),
            'area' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%np_city}}');
    }
}
