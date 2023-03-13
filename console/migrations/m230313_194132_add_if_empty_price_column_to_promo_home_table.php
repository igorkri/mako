<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%promo_home}}`.
 */
class m230313_194132_add_if_empty_price_column_to_promo_home_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%promo_home}}', 'if_empty_price', $this->string(120));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%promo_home}}', 'if_empty_price');
    }
}
