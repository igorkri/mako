<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category_service".
 *
 * @property int $id
 * @property int|null $parent_id Головна категорія
 * @property string|null $name Назва катагорії
 * @property string|null $slug Slug
 * @property string|null $description Короткий опис
 */
class CategoryService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_service';
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
            [['parent_id'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['name'], 'unique'],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Головна категорія',
            'name' => 'Назва катагорії',
            'slug' => 'Slug',
            'description' => 'Короткий опис',
        ];
    }

    public function getServices()
    {
        return $this->hasMany(Service::class, ['category_service_id' => 'id']);
    }

    public function getParent()
    {
        return $this->hasOne(CategoryService::class, ['id' => 'parent_id']);
    }

    public function getParents()
    {
        return $this->hasMany(CategoryService::class, ['parent_id' => 'id']);
    }
}
