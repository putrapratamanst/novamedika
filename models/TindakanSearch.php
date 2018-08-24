<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tindakan;

/**
 * TindakanSearch represents the model behind the search form of `app\models\Tindakan`.
 */
class TindakanSearch extends Tindakan
{
    /**
     * @inheritdoc
     */
    public $id_pasien_custom;
    public $end_date;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['pemeriksaan_penunjang', 'obat', 'diagnosa', 'terapi', 'biaya', 'created_date', 'updated_date','id_pasien','id_pasien_custom','end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tindakan::find()->orderBy(['created_date'=>SORT_DESC]);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['pagesize'=>5],

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('pasien');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            // 'tindakan.created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
            'pasien.nama' => $this->id_pasien,
            'pasien.no_rm' => $this->id_pasien_custom,

        ]);

        $query->andFilterWhere(['like', 'pemeriksaan_penunjang', $this->pemeriksaan_penunjang])
            ->andFilterWhere(['like', 'obat', $this->obat])
            ->andFilterWhere(['like', 'diagnosa', $this->diagnosa])
            // ->andFilterWhere(['like', 'pasien.nama', $this->id_pasien])
            // ->andFilterWhere(['like', 'tindakan.created_date', $this->created_date])
            ->andFilterWhere(['between','date(tindakan.created_date)', $this->created_date, $this->end_date])
            
            ->andFilterWhere(['like', 'biaya', $this->biaya]);

        return $dataProvider;
    }
    public function searchDokter($params)
    {   
        $username = Yii::$app->user->identity->name;
        $id_dokter = PekerjaMedis::find()->select('id')->where(['username'=>$username])->one();
        $query = Tindakan::find()->where(['id_pekerja_medis'=>$id_dokter]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
            'id_pasien' => $this->id_pasien,
        ]);

        $query->andFilterWhere(['like', 'pemeriksaan_penunjang', $this->pemeriksaan_penunjang])
            ->andFilterWhere(['like', 'obat', $this->obat])
            ->andFilterWhere(['like', 'diagnosa', $this->diagnosa])
            ->andFilterWhere(['like', 'tindakan', $this->tindakan])
            ->andFilterWhere(['like', 'biaya', $this->biaya]);

        return $dataProvider;
    }
    public function searchRawatJalan($params)
    {
        $query = Tindakan::find()->where(['status'=>0])->orderBy(['created_date'=>SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['pagesize'=>5],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('pasien');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
            // 'id_pasien' => $this->id_pasien,
            'pasien.nama' => $this->id_pasien,
            'pasien.no_rm' => $this->id_pasien_custom,

        ]);

        $query->andFilterWhere(['like', 'pemeriksaan_penunjang', $this->pemeriksaan_penunjang])
            ->andFilterWhere(['like', 'obat', $this->obat])
            ->andFilterWhere(['like', 'diagnosa', $this->diagnosa])
             ->andFilterWhere(['like', 'biaya', $this->biaya]);

        return $dataProvider;
    }
    public function searchRawatInap($params)
    {
        $query = Tindakan::find()->where(['status'=>1])->orderBy(['created_date'=>SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['pagesize'=>5],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('pasien');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
            // 'id_pasien' => $this->id_pasien,
            'pasien.nama' => $this->id_pasien,
            'pasien.no_rm' => $this->id_pasien_custom,
        ]);

        $query->andFilterWhere(['like', 'pemeriksaan_penunjang', $this->pemeriksaan_penunjang])
            ->andFilterWhere(['like', 'obat', $this->obat])
            ->andFilterWhere(['like', 'diagnosa', $this->diagnosa])
             ->andFilterWhere(['like', 'biaya', $this->biaya]);

        return $dataProvider;
    }
    public function searchFisioterapis($params)
    {
        $query = Tindakan::find()->where(['status'=>2])->orderBy(['created_date'=>SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['pagesize'=>5],

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
            'id_pasien' => $this->id_pasien,
        ]);

        $query->andFilterWhere(['like', 'pemeriksaan_penunjang', $this->pemeriksaan_penunjang])
            ->andFilterWhere(['like', 'obat', $this->obat])
            ->andFilterWhere(['like', 'diagnosa', $this->diagnosa])
             ->andFilterWhere(['like', 'biaya', $this->biaya]);

        return $dataProvider;
    }
}
