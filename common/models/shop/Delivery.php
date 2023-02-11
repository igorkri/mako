<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property int $id
 * @property string|null $name Служба доставки
 * @property string|null $file Зображення
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery';
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
            'name' => 'Служба доставки',
            'file' => 'Зображення',
        ];
    }
}
