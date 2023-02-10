<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $created_at Дата створення
 * @property int|null $updated_at Дата оновлення
 * @property int|null $published Oпубліковано товар
 * @property string|null $name Назва товару
 * @property string|null $description Опис товару
 * @property string|null $indication Показання
 * @property int|null $category_id Категорія
 * @property string|null $producer Виробник
 * @property int|null $delivery_id Доставка
 * @property int|null $series_id Серія
 * @property int|null $status_id Статус
 * @property int|null $popular_product Популярний товар
 * @property float|null $price Ціна
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'published', 'category_id', 'delivery_id', 'series_id', 'status_id', 'popular_product'], 'integer'],
            [['description', 'indication'], 'string'],
            [['price'], 'number'],
            [['name', 'producer'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата оновлення',
            'published' => 'Oпубліковано товар',
            'name' => 'Назва товару',
            'description' => 'Опис товару',
            'indication' => 'Показання',
            'category_id' => 'Категорія',
            'producer' => 'Виробник',
            'delivery_id' => 'Доставка',
            'series_id' => 'Серія',
            'status_id' => 'Статус',
            'popular_product' => 'Популярний товар',
            'price' => 'Ціна',
        ];
    }
}
