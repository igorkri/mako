<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promo".
 *
 * @property int $id
 * @property string|null $file Зображення
 * @property string $begin_data Дата начала акції
 * @property string $end_data Дата закінчення акції
 * @property string $description Опис акції
 */
class Promo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['begin_data', 'end_data', 'description'], 'required'],
            [['description'], 'string'],
            [['file', 'begin_data', 'end_data'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'Зображення',
            'begin_data' => 'Дата начала акції',
            'end_data' => 'Дата закінчення акції',
            'description' => 'Опис акції',
        ];
    }
}
