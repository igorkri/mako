<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "series".
 *
 * @property int $id
 * @property string|null $name Назва серії
 * @property string|null $file Зображення
 */
class Series extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'series';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'file'], 'string', 'max' => 255],
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
            'name' => 'Назва серії',
            'file' => 'Зображення',
        ];
    }
}
