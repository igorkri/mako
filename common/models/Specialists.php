<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "specialists".
 *
 * @property int $id
 * @property string|null $profession Професії
 * @property string|null $fio ПІБ
 * @property string|null $photo Фото
 * @property string|null $status Статус
 */
class Specialists extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'specialists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profession', 'fio', 'photo', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profession' => 'Професії',
            'fio' => 'ПІБ',
            'photo' => 'Фото',
            'status' => 'Статус',
        ];
    }
}
