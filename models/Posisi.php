<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posisi".
 *
 * @property int $id
 * @property string $posisi
 */
class Posisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['posisi'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'posisi' => 'Posisi',
        ];
    }
}
