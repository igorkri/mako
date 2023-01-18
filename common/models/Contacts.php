<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string|null $address Адреса салону
 * @property string|null $phone Телефон салону
 * @property string|null $salon_work_schedule Графік роботи салону
 * @property string|null $maps google карта
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'phone', 'salon_work_schedule', 'maps'], 'string', 'max' => 255],
            [['maps'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Адреса салону',
            'phone' => 'Телефон салону',
            'salon_work_schedule' => 'Графік роботи салону',
            'maps' => 'google карта',
        ];
    }
}
