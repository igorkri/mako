<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "np_city".
 *
 * @property int $id
 * @property string|null $ref
 * @property string|null $name
 * @property string|null $area
 */
class NpCity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'np_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ref', 'name', 'area'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'Ref',
            'name' => 'Name',
            'area' => 'Area',
        ];
    }
}
