<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_video".
 *
 * @property int $id
 * @property int|null $service_id Категорія послуги
 * @property string|null $url Посилання
 * @property string|null $name Назва відео
 *
 * @property Service $service
 */
class ServiceVideo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id'], 'integer'],
            [['url', 'name'], 'string', 'max' => 255],
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
            'url' => 'Посилання',
            'name' => 'Назва відео',
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
