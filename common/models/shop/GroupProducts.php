<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "group_products".
 *
 * @property int $id
 * @property string|null $name Назва групи
 * @property int|null $product_id Товар
 * @property int|null $main Головний товар
 */
class GroupProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'main'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва групи',
            'product_id' => 'Товар',
            'main' => 'Головний товар',
        ];
    }

    public function getCountProducts()
    {
        return $this->hasMany(Product::class, ['group_id' => 'id'])->count();
    }
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['group_id' => 'id']);
    }
}
