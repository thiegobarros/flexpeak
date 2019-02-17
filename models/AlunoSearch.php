<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aluno;
use Yii;

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
            [['nome', 'data_nascimento', 'logradouro', 'bairro', 'estado', 'data_criacao', 'cep', 'cidade'], 'safe'],
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

        // if(strlen($this->data_nascimento) != 10 && $this->data_nascimento != ''){
        //     Yii::$app->session->setFlash('error', 'Por favor, inserir data no formato: <b>yyyy-mm-dd</b>');
        //     $this->data_nascimento = '';
        // }

        // if(strlen($this->data_criacao) != 10 && $this->data_criacao != ''){
        //     Yii::$app->session->setFlash('error', 'Por favor, inserir data no formato: <b>yyyy-mm-dd</b>');
        //     $this->data_criacao = '';
        // }

        
        if(!$this->validaData($this->data_nascimento)){
            Yii::$app->session->setFlash('error', 'Por favor, inserir data no formato: <b>yyyy-mm-dd</b>');
            $this->data_nascimento = '';
        }
        
        if(!$this->validaData($this->data_criacao)){
            Yii::$app->session->setFlash('error', 'Por favor, inserir data no formato: <b>yyyy-mm-dd</b>');
            $this->data_criacao = '';
        }

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
            ->andFilterWhere(['ilike', 'cidade', $this->bairro])
            ->andFilterWhere(['ilike', 'estado', $this->estado])
            ->andFilterWhere(['ilike', 'cep', $this->cep]);

        return $dataProvider;
    }

    public function validaData($data){
        if(strlen($data) == 10 && $data != ''){
            $tmp = explode("-", $data);

            if(count($tmp) == 3){
                return is_numeric($tmp[0].$tmp[1].$tmp[2]);
            }
        }

        if($data == ''){
            return true;
        }

        return false;
    }
}
