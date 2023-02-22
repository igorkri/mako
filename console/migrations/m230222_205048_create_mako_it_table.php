<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mako_it}}`.
 */
class m230222_205048_create_mako_it_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mako_it}}', [
            'id' => $this->primaryKey(),
            'col1' => $this->string(500)->comment('Колонка 1'),
            'col2' => $this->string(500)->comment('Колонка 2'),
            'col3' => $this->string(500)->comment('Колонка 3'),
            'col4' => $this->string(500)->comment('Колонка 4'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mako_it}}');
    }
}
