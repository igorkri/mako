<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "certificates".
 *
 * @property int $id
 * @property string|null $title Назва сертифікату
 * @property string|null $file Сертифікат
 */
class Certificates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'certificates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 1000],
            [['file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Назва сертифікату',
            'file' => 'Сертифікат',
        ];
    }
}
