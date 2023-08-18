<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string|null $title Назва
 * @property string|null $description Опис
 * @property string|null $file Зображення
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['title', 'file'], 'string', 'max' => 255],
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
            'title' => 'Назва',
            'description' => 'Опис',
            'file' => 'Зображення',
        ];
    }
}
