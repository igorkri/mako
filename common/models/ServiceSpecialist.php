<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_specialist".
 *
 * @property int $id
 * @property int|null $service_id Категорія послуги
 * @property int|null $specialist_id Спеціаліст
 *
 * @property Service $service
 */
class ServiceSpecialist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_specialist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id'], 'integer'],
            [['specialist_id'], 'safe'],
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
            'specialist_id' => 'Спеціаліст',
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

    public function getSpecialist()
    {
        return $this->hasOne(Specialists::class, ['id' => 'specialist_id']);
    }
}
