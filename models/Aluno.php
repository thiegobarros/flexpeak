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
            [['nome', 'data_nascimento', 'logradouro', 'numero', 'bairro', 'estado', 'data_criacao', 'cep', 'id_curso', 'cidade'], 'required'],
            [['data_nascimento', 'data_criacao'], 'safe'],
            [['numero', 'id_curso'], 'default', 'value' => null],
            [['numero', 'id_curso'], 'integer'],
            [['nome', 'logradouro', 'bairro', 'estado', 'cep', 'cidade'], 'string', 'max' => 255],
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
            'data_nascimento' => 'Data de Nascimento',
            'logradouro' => 'Logradouro',
            'numero' => 'Número',
            'bairro' => 'Bairro',
            'estado' => 'Estado',
            'data_criacao' => 'Data de Criação',
            'cep' => 'CEP',
            'id_curso' => 'Curso',
            'cidade' => 'Cidade'
        ];
    }
}
