<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_gallery".
 *
 * @property int $id
 * @property int|null $service_id Категорія послуги
 * @property int|null $position Позиція відображення
 * @property string|null $file Зображення
 *
 * @property Service $service
 */
class ServiceGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'position'], 'integer'],
            [['file'], 'string', 'max' => 255],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Категорія послуги',
            'file' => 'Зображення',
            'position' => 'Позиція відображення',
        ];
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }
}
