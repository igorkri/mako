<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promo_home".
 *
 * @property int $id
 * @property string|null $name Назва
 * @property string|null $file Зображення
 * @property string|null $info Інформація
 * @property string|null $if_empty_price Якщо немає ціни
 */
class PromoHome extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promo_home';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'file'], 'string', 'max' => 255],
            [['if_empty_price'], 'string', 'max' => 120],
            [['info'], 'string', 'max' => 1100],
            [['price_1', 'price_2', 'price_3', 'price_4', 'price_5'], 'number'],
            ['file', 'file', 'maxSize' => 1024 * 1024, 'tooBig' => 'Зображення занадто велике. Максимальний розмір: 1 МБ.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва',
            'file' => 'Зображення 524x500',
            'info' => 'Інформація',
            'price_1' => 'Ціна 1',
            'price_2' => 'Ціна 2',
            'price_3' => 'Ціна 3',
            'price_4' => 'Ціна 4',
            'price_5' => 'Ціна 5',
            'if_empty_price' => 'Текст замість ціни',
        ];
    }
}
