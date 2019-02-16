<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "professor".
 *
 * @property int $id_professor
 * @property string $nome
 * @property string $data_nascimento
 * @property string $data_criacao
 */
class Professor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'professor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'data_nascimento', 'data_criacao'], 'required'],
            [['data_nascimento', 'data_criacao'], 'safe'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_professor' => 'Id Professor',
            'nome' => 'Nome',
            'data_nascimento' => 'Data Nascimento',
            'data_criacao' => 'Data Criacao',
        ];
    }
}
