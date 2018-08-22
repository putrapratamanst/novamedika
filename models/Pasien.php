<?php
 
namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property string $nama
 * @property string $no_ktp
 * @property string $no_bpjs
 * @property string $cara_bayar
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property string $kategori_pasien
 * @property string $created_date
 * @property string $updated_date
 *
 * @property Tindakan[] $tindakans
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
            [['nama', 'tanggal_lahir', 'alamat','kategori_pasien','cara_bayar'], 'required', 'message'=>"{attribute} tidak boleh kosong"],
            // [['no_ktp','no_bpjs'],'unique','message'=>"{attribute} ini telah diinput sebelumnya"],
            [['tanggal_lahir', 'created_date', 'updated_date'], 'safe'],
            [['alamat','no_rm'], 'string'],
            ['no_ktp', 'string','min'=>16,'max'=>16, 'tooShort' => '{attribute} harus terdiri dari 16 digit' ],
            ['no_bpjs','string','min'=>13,'max'=>13, 'tooShort' => '{attribute} harus terdiri dari 13 digit' ],
            [['no_ktp','no_bpjs'], 'number','message'=>'{attribute} harus angka'],
            // [['no_ktp'], 'findKtp'],
            // ['tanggal_lahir','compareDob'],
            ['nama','match', 'pattern' => '/^[a-zA-Z]+(?:\s[a-zA-Z-]+)*$/', 'message' => '{attribute} harus "Huruf"'],
            ['kategori_pasien', 'string', 'max' => 100],
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
            'no_ktp' => 'No KTP',
            'no_bpjs' => 'No BPJS',
            'cara_bayar' => 'Cara Bayar',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'kategori_pasien' => 'Kategori Pasien',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTindakans()
    {
        return $this->hasMany(Tindakan::className(), ['id_pasien' => 'id']);
    } 
   
    public function compareDob($attribute, $params)
    {
        $date = date("Y-m-d");
        if($this->tanggal_lahir >= $date){
            return $this->addError($attribute,"Tanggal Lahir tidak boleh lebih dari hari ini");
        }
    }

    public static function findAvailablePasien()
    {
            $data = Pasien::find()->select('id,nama')->all();
            
            $data_list = ArrayHelper::map($data, 'id',
                function ($target, $defaultValue) {
                    return  $target['nama'];
                });
           
        return $data_list;
    }

    public static function getAge($birthday)
    {
        list($year, $month, $day) = explode("-", $birthday);
        $year_diff  = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff   = date("d") - $day;
        if($month_diff < 0)
        {
            $year_diff--;
        }
        else if(($month_diff == 0) && ($day_diff < 0))
        {
            $year_diff--;
        }
        return $year_diff;
    }


    // public function findKtp($attribute,$params)
    // {
    //     $data = Pasien::find()->where(['no_ktp'=>$this->no_ktp])->one();

    //   if($this->no_ktp == $data){
    //     return $this->addError($attribute,"Start Year must below $year");
    //  }
    // }
}
