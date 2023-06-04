<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "np_warehouse".
 *
 * @property int $id
 * @property int|null $city_id
 * @property string|null $ref
 * @property string|null $cityRef
 * @property string|null $shortAddress
 * @property string|null $cityDescription
 * @property string|null $description
 */
class NpWarehouse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'np_warehouse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id'], 'integer'],
            [['ref', 'cityRef', 'shortAddress', 'cityDescription', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'ref' => 'Ref',
            'cityRef' => 'City Ref',
            'shortAddress' => 'Short Address',
            'cityDescription' => 'City Description',
            'description' => 'Description',
        ];
    }
}
