<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $no_ktp
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'no_ktp', 'tempat_lahir', 'tanggal_lahir', 'alamat'], 'required'],
            [['no_ktp'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['alamat'], 'string'],
            [['nama'], 'string', 'max' => 100],
            [['tempat_lahir'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'no_ktp' => 'No Ktp',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
        ];
    }
}
