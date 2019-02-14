<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aluno;

/**
 * AlunoSearch represents the model behind the search form of `app\models\Aluno`.
 */
class AlunoSearch extends Aluno
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_aluno', 'numero', 'id_curso'], 'integer'],
            [['nome', 'data_nascimento', 'logradouro', 'bairro', 'cidade', 'estado', 'data_criacao', 'cep'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Aluno::find();

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
            'id_aluno' => $this->id_aluno,
            'data_nascimento' => $this->data_nascimento,
            'numero' => $this->numero,
            'data_criacao' => $this->data_criacao,
            'id_curso' => $this->id_curso,
        ]);

        $query->andFilterWhere(['ilike', 'nome', $this->nome])
            ->andFilterWhere(['ilike', 'logradouro', $this->logradouro])
            ->andFilterWhere(['ilike', 'bairro', $this->bairro])
            ->andFilterWhere(['ilike', 'cidade', $this->cidade])
            ->andFilterWhere(['ilike', 'estado', $this->estado])
            ->andFilterWhere(['ilike', 'cep', $this->cep]);

        return $dataProvider;
    }
}
