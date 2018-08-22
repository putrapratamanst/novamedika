<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pasien;

/**
 * PasienSearch represents the model behind the search form of `app\models\Pasien`.
 */
class PasienSearch extends Pasien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama', 'no_ktp', 'no_bpjs','no_rm', 'cara_bayar', 'tanggal_lahir', 'alamat', 'kategori_pasien', 'created_date', 'updated_date'], 'safe'],
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
        $query = Pasien::find()->orderBy(['created_date'=>SORT_DESC]);

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
            'cara_bayar' => $this->cara_bayar,
            'nama' => $this->nama,
            // 'no_bpjs' => $this->no_bpjs,
            // 'updated_date' => $this->updated_date,
        ]);

        // $query->andFilterWhere(['like', 'nama', $this->nama])
        $query->andFilterWhere(['like', 'no_ktp', $this->no_ktp])
            ->andFilterWhere(['like', 'no_bpjs', $this->no_bpjs])
            ->andFilterWhere(['like', 'no_rm', $this->no_rm])
            // ->andFilterWhere(['like', 'cara_bayar', $this->cara_bayar])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kategori_pasien', $this->kategori_pasien]);

        return $dataProvider;
    }
    public function searchIndex($params)
    {
        $query = Pasien::find();

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
            'no_ktp' => $this->no_ktp,
            'no_bpjs' => $this->no_bpjs,
            // 'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            // ->andFilterWhere(['like', 'no_ktp', $this->no_ktp])
            // ->andFilterWhere(['like', 'no_bpjs', $this->no_bpjs])
            ->andFilterWhere(['like', 'cara_bayar', $this->cara_bayar])
            ->andFilterWhere(['like', 'no_rm', $this->no_rm])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kategori_pasien', $this->kategori_pasien]);

        return $dataProvider;
    }
}
