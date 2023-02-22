<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property int|null $category_service_id Категорія послуги
 * @property string|null $short_description Короткий опис послуги
 * @property string|null $description Опис послуги
 * @property string|null $indication Показання
 * @property string|null $name Назва послуги
 * @property string|null $slug Slug
 * @property float|null $price Ціна за процедуру
 * @property integer|null $popular Популярна
 *
 * @property ServiceGallery[] $serviceGalleries
 * @property ServiceQuestion[] $serviceQuestions
 * @property ServiceSpecialist[] $serviceSpecialists
 * @property ServiceVideo[] $serviceVideos
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    public function behaviors()
    {
        return [
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
            [['category_service_id', 'popular', 'name', 'short_description', 'description'], 'required'],
            [['category_service_id', 'popular'], 'integer'],
            [['description', 'indication', 'name', 'slug', 'price'], 'string'],
//            [['price'], 'number'],
            [['short_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_service_id' => 'Категорія послуги',
            'popular' => 'Популярна послуга',
            'name' => 'Назва послуги',
            'slug' => 'Slug',
            'short_description' => 'Короткий опис послуги',
            'description' => 'Опис послуги',
            'indication' => 'Показання',
            'price' => 'Ціна за процедуру',
        ];
    }

    /**
     * Gets query for [[ServiceGalleries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceGalleries()
    {
        return $this->hasMany(ServiceGallery::class, ['service_id' => 'id']);
    }

    /**
     * Gets query for [[ServiceQuestions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceQuestions()
    {
        return $this->hasMany(QuestionService::class, ['service_id' => 'id']);
    }

    /**
     * Gets query for [[ServiceSpecialists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceSpecialists()
    {
        return $this->hasMany(ServiceSpecialist::class, ['service_id' => 'id']);
    }

    /**
     * Gets query for [[ServiceVideos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceVideos()
    {
        return $this->hasMany(ServiceVideo::class, ['service_id' => 'id']);
    }

    /**
     * Gets query for [[CategoryService]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryService()
    {
        return $this->hasOne(CategoryService::class, ['id' => 'category_service_id']);
    }

    /**
     * Gets query for [[CategoryService]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryServices()
    {
        return $this->hasMany(CategoryService::class, ['id' => 'category_service_id']);
    }
}
