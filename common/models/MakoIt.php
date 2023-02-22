<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mako_it".
 *
 * @property int $id
 * @property string|null $col1 Колонка 1
 * @property string|null $col2 Колонка 2
 * @property string|null $col3 Колонка 3
 * @property string|null $col4 Колонка 4
 */
class MakoIt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mako_it';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col1', 'col2', 'col3', 'col4'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'col1' => 'Колонка 1',
            'col2' => 'Колонка 2',
            'col3' => 'Колонка 3',
            'col4' => 'Колонка 4',
        ];
    }
}
