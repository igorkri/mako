<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "product_image".
 *
 * @property int $id
 * @property int|null $product_id Товар
 * @property string|null $name Зображення
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['name'], 'safe'],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Товар',
            'name' => 'Зображення (520 x 520)',
        ];
    }
}
