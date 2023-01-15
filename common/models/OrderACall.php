<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_a_call".
 *
 * @property int $id
 * @property string $name Iм'я
 * @property string $phone Номер телефону
 * @property string $address Адреса салону
 * @property int $signUpCheckbox Згода на обробку даних
 * @property int|null $created_at Дата створення
 * @property int|null $updated_at Дата оновлення
 * @property string|null $status Статус
 * @property string|null $comment Коментар
 */
class OrderACall extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_a_call';
    }

    public function behaviors()
    {
        return [

            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'address'], 'required'],
            [['signUpCheckbox', 'created_at', 'updated_at'], 'safe'],
            [['name', 'phone', 'address', 'status', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Iм\'я',
            'phone' => 'Номер телефону',
            'address' => 'Адреса салону',
            'signUpCheckbox' => 'Згода на обробку даних',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата оновлення',
            'status' => 'Статус',
            'comment' => 'Коментар',
        ];
    }
}
