<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "work_in_mako".
 *
 * @property int $id
 * @property string|null $title Назва пропозиції
 * @property string|null $description Опис позиції
 * @property string|null $time Часи роботи
 * @property string|null $money Зарплата
 */
class WorkInMako extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_in_mako';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['title', 'time', 'money'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Назва пропозиції',
            'description' => 'Опис позиції',
            'time' => 'Часи роботи',
            'money' => 'Зарплата',
        ];
    }
}
