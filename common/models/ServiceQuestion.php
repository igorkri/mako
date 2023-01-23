<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_question".
 *
 * @property int $id
 * @property int|null $service_id Категорія послуги
 * @property string|null $question Питання
 * @property string|null $answer Відповідь
 *
 * @property Service $service
 */
class ServiceQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id'], 'integer'],
            [['question', 'answer'], 'string'],
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
            'question' => 'Питання',
            'answer' => 'Відповідь',
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
