<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team_gallery".
 *
 * @property int $id
 * @property string|null $file Забраження
 */
class TeamGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'Забраження',
        ];
    }
}
