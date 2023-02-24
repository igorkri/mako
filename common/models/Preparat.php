<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "preparats".
 *
 * @property int $id
 * @property string|null $name Назва препапрату
 * @property string|null $file Зображення
 */
class Preparat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'preparats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва препапрату',
            'file' => 'Зображення',
        ];
    }
}
