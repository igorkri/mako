<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property string|null $data Дата
 * @property string|null $сlient Клієнт
 * @property string|null $comment Коментар
 * @property string|null $procedure Процедура
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            [['data', 'сlient', 'procedure'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Дата',
            'сlient' => 'Клієнт',
            'comment' => 'Коментар',
            'procedure' => 'Процедура',
        ];
    }
}
