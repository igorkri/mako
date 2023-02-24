<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "learning_in_mako".
 *
 * @property int $id
 * @property string|null $title Назва курсу
 * @property string|null $description Опис позиції
 * @property string|null $date Термін навчання
 * @property string|null $file Зображення
 */
class LearningInMako extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'learning_in_mako';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['title', 'date', 'file'], 'string', 'max' => 255],
//            [['description', 'title', 'file'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Назва курсу',
            'description' => 'Опис позиції',
            'date' => 'Термін навчання',
            'file' => 'Зображення',
        ];
    }
}
