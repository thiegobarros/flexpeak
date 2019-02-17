<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Curso;
use Yii;

/**
 * CursoSearch represents the model behind the search form of `app\models\Curso`.
 */
class CursoSearch extends Curso
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_curso', 'id_professor'], 'integer'],
            [['nome', 'data_criacao'], 'safe'],
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
        $query = Curso::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

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
            'id_curso' => $this->id_curso,
            'data_criacao' => $this->data_criacao,
            'id_professor' => $this->id_professor,
        ]);

        $query->andFilterWhere(['ilike', 'nome', $this->nome]);

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
