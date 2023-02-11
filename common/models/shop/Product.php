<?php

namespace common\models\shop;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $created_at Дата створення
 * @property int|null $updated_at Дата оновлення
 * @property int|null $published Oпубліковано товар
 * @property string|null $name Назва товару
 * @property string|null $slug Url
 * @property string|null $description Опис товару
 * @property string|null $indication Показання
 * @property int|null $category_id Категорія
 * @property string|null $producer_id Виробник
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

    public $images;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'slug',
                'attribute' => 'name',
                // optional params
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general.
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'producer_id', 'published', 'category_id', 'series_id', 'status_id', 'popular_product'], 'integer'],
            [['description', 'indication'], 'string'],
            [['price'], 'number'],
            [['images'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 255],
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
            'slug' => 'Url',
            'published' => 'Oпубліковано товар',
            'name' => 'Назва товару',
            'description' => 'Опис товару',
            'indication' => 'Показання',
            'category_id' => 'Категорія',
            'producer_id' => 'Виробник',
            'delivery_id' => 'Доставка',
            'series_id' => 'Серія',
            'status_id' => 'Статус',
            'popular_product' => 'Популярний товар',
            'price' => 'Ціна',
            'images' => 'Зображення',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getProducer()
    {
        return $this->hasOne(Producer::class, ['id' => 'producer_id']);
    }

    public function getSerie()
    {
        return $this->hasOne(Series::class, ['id' => 'series_id']);
    }

    public function getProductImages()
    {
        return $this->hasMany(ProductImage::class, ['product_id' => 'id']);
    }


}
