<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_a_call".
 *
 * @property int $id
 * @property string $name Iм'я
 * @property string $phone Номер телефону
 * @property string $address Адреса салону
 * @property int $signUpCheckbox Згода на обробку даних
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['name', 'phone', 'address'], 'required'],
            [['signUpCheckbox'], 'integer'],
            [['name', 'phone', 'address'], 'string', 'max' => 255],
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
        ];
    }
}
