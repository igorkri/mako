<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exchange_rates".
 *
 * @property int $id
 * @property float|null $USD USD
 * @property float|null $EUR EUR
 */
class ExchangeRates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exchange_rates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USD', 'EUR'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'USD' => 'USD',
            'EUR' => 'EUR',
        ];
    }
}
