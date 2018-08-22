<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "pekerja_medis".
 *
 * @property int $id
 * @property string $nama
 * @property string $posisi
 */
class PekerjaMedis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pekerja_medis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'posisi'], 'required'],
            [['nama', 'posisi','username'], 'string', 'max' => 255],
            [['user_id'], 'integer'],
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
            'posisi' => 'Posisi',
        ];
    }

    public function FindAvailableDokter()
    {
        $data = PekerjaMedis::find()->select('nama','id')->where(['posisi'=>"dokter"])->all();
        
        $data_list = ArrayHelper::map($data, 'id',
            function ($target, $defaultValue) {
                return  $target['nama'];
            });
           
        return $data_list;
    }

    public function FindPekerjaMedis()
    {
        $data = PekerjaMedis::find()->select(['nama','id','posisi'])->orderBy('posisi')->all();
        
        $data_list = ArrayHelper::map($data, 'id',
            function ($target, $defaultValue) {
                return  $target['nama'];
                // return  $target['posisi']." - ".$target['nama'];
            });
           
        return $data_list;
    }
}
