<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $name Назва статті
 * @property string|null $created_at Дата публікації
 * @property string|null $updated_at Дата оновлення
 * @property string|null $name_header Заголовок
 * @property string|null $text Текст
 * @property string|null $file Зображення
 * @property string|null $file_thumb Зображення превю
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

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
            [['text'], 'string'],
            [['name', 'name_header', 'file', 'slug', 'file_thumb'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва статті',
            'created_at' => 'Дата публікації',
            'updated_at' => 'Дата оновлення',
            'name_header' => 'Заголовок',
            'text' => 'Текст',
            'file_thumb' => 'Зображення прев\'ю (524 х 524)',
            'file' => 'Зображення (1024 х 481)',
        ];
    }
}
