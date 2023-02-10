<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "producer".
 *
 * @property int $id
 * @property string|null $name Назва виробника
 * @property string|null $file Зображення
 */
class Producer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producer';
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
            'name' => 'Назва виробника',
            'file' => 'Зображення',
        ];
    }
}
