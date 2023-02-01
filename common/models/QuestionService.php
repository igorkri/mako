<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "question_service".
 *
 * @property int $id
 * @property int|null $service_id Категорія послуги
 * @property string|null $question Питання
 * @property string|null $reply Відповідь
 */
class QuestionService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id'], 'integer'],
                [['question', 'reply'], 'string'],
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
            'reply' => 'Відповідь',
        ];
    }
}
