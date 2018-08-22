<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $id
 * @property int $id_pasien
 * @property int $id_dokter
 * @property string $anamnesa
 * @property string $pemeriksaan_fisik
 * @property string $diagnosa
 * @property string $terapi
 * @property string $biaya
 * @property string $created_date
 * @property string $updated_date
 * @property string $status
 *
 * @property Pasien $pasien
 * @property Dokter $dokter
 */
class Tindakan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pasien','id_pekerja_medis','diagnosa','pemeriksaan_penunjang','tindakan','obat','biaya'], 'required','message'=>"{attribute} tidak boleh kosong"],
            [['id_pasien','id_pekerja_medis'], 'integer'],
            [['obat', 'pemeriksaan_penunjang', 'diagnosa', 'tindakan', 'biaya'], 'string'],
            [['created_date', 'updated_date','tanggal_masuk','tanggal_keluar'], 'safe'],
            [['status','kategori_pasien_rawat_inap','rujukan','kategori_pasien_rawat_jalan'], 'string', 'max' => 100],
            [['status'],'required', 'on'=>['tindakan'],'message'=>"{attribute} tidak boleh kosong"],
            

            // ['tanggal_keluar', 'compare', 'compareAttribute' => 'tanggal_masuk', 'operator' => '<'/*,'message'=>"Tanggal Keluar tidak boleh dibawah tanggal masuk"*/],
            [['kategori_pasien_rawat_inap','tanggal_masuk'/*,'tanggal_keluar'*/],'required', 'on'=>['rawat-inap'],'message'=>"{attribute} tidak boleh kosong"],
            [['kategori_pasien_rawat_jalan'],'required', 'on'=>['rawat-jalan'],'message'=>"{attribute} tidak boleh kosong"],

            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::className(), 'targetAttribute' => ['id_pasien' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pasien' => 'Nama Pasien',
            'obat' => 'Obat',
            'pemeriksaan_penunjang' => 'Pemeriksaan Penunjang',
            'diagnosa' => 'Diagnosis',
            'tindakan' => 'Tindakan',
            'biaya' => 'Biaya',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
            'id_pekerja_medis' => 'Tenaga Medis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::className(), ['id' => 'id_pasien']);
    }

    public function getPekerjaMedis()
    {
        return $this->hasOne(PekerjaMedis::className(), ['id' => 'id_pekerja_medis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

}
