<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $id_curso
 * @property string $nome
 * @property string $data_criacao
 * @property int $id_professor
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'data_criacao', 'id_professor'], 'required'],
            [['data_criacao'], 'safe'],
            [['id_professor'], 'default', 'value' => null],
            [['id_professor'], 'integer'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'nome' => 'Nome',
            'data_criacao' => 'Data de Criação',
            'id_professor' => 'Professor Responsável',
        ];
    }
}
