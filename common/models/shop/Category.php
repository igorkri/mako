<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $parent_id Батьківська категорія
 * @property string|null $name Назва категорії
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Батьківська категорія',
            'name' => 'Назва категорії',
        ];
    }
}
