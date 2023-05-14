<?php

namespace common\models\shop;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

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
 * @property string|null $currency Валюта
 * @property int|null $category_id Категорія
 * @property string|null $producer_id Виробник
 * @property string|null $volume_val Обєм ml
 * @property int|null $delivery_id Доставка
 * @property int|null $series_id Серія
 * @property int|null $status_id Статус
 * @property int|null $popular_product Популярний товар
 * @property float|null $price Ціна
 * @property float|null $volume_int Обєм int
 * @property int|null $main Головний товар
 * @property int|null $group_id Група товарів
 */
class Product extends ActiveRecord implements CartPositionInterface
{
    use CartPositionTrait;
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
            [['main','group_id','created_at', 'updated_at', 'producer_id', 'published', 'category_id', 'series_id', 'status_id', 'popular_product'], 'integer'],
            [['description', 'indication', 'currency', 'volume_val'], 'string'],
            [['price', 'volume_int'], 'number'],
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
            'published' => 'Відображати товар',
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
            'currency' => 'Валюта',
            'volume_int' => 'Об\'єм 0.00',
            'volume_val' => 'Об\'єм ml',
            'group_id' => 'Група товарів',
            'main' => 'Головний товар',
        ];
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
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

    public function getProductGroup()
    {
        return $this->hasOne(GroupProducts::class, ['id' => 'group_id']);
    }

    public function getFilters($gets){
        $filter = [];
        if($gets){
            foreach ($gets as $k => $get){
                $filter[$k] = $get;
            }
        }
        $ser_f = [];
        if(isset($filter['category_id'])){
            $categories = Category::find()->where(['id' => $filter['category_id']])->asArray()->all();
            $ser_f['category'] = $categories;
        }
        if(isset($filter['producer_id'])){
            $producers = Producer::find()->where(['id' => $filter['producer_id']])->asArray()->all();
            $ser_f['producers'] = $producers;
        }
        if(isset($filter['series_id'])){
            $series = Series::find()->where(['id' => $filter['series_id']])->asArray()->all();
            $ser_f['series'] = $series;
        }
        if(isset($filter['popular_product'])){
            $ser_f['popular_product'] = $_SESSION['popular_product'];
        }
        if(isset($filter['sort'])){
            $ser_f['sort'] = $_SESSION['sort'];
        }
        return $ser_f;
    }

    public function getCountFilters($filters){
        $count = [];
        foreach ($filters as $filter){
            foreach ($filter as $f){
                $count[] = $f;
            }
        }
        return count($count);
    }

    public function currencyList(){
        return [
            'UAH' => 'Гривна',
            'USD' => 'Долар'
        ];
    }

}
