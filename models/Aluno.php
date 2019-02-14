<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aluno".
 *
 * @property int $id_aluno
 * @property string $nome
 * @property string $data_nascimento
 * @property string $logradouro
 * @property int $numero
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property string $data_criacao
 * @property string $cep
 * @property int $id_curso
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'logradouro', 'bairro', 'cidade', 'estado', 'cep'], 'string'],
            [['data_nascimento', 'data_criacao'], 'safe'],
            [['numero', 'id_curso'], 'default', 'value' => null],
            [['numero', 'id_curso'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_aluno' => 'Id Aluno',
            'nome' => 'Nome',
            'data_nascimento' => 'Data Nascimento',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'data_criacao' => 'Data Criacao',
            'cep' => 'Cep',
            'id_curso' => 'Id Curso',
        ];
    }
}
