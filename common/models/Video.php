<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string|null $data Дата
 * @property string|null $title Назва відео
 * @property string|null $url_file Посилання на відео
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'title'], 'string', 'max' => 255],
            [['url_file'], 'string'],
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
            'title' => 'Назва відео',
            'url_file' => 'Посилання на відео',
        ];
    }
}
