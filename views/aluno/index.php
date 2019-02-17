<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Curso;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlunoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alunos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cadastrar Aluno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_aluno',
            'nome',
            'data_nascimento',
            'cep',
            'logradouro',
            'bairro',
            'cidade',
            'estado',
            'numero',
            // 'id_curso',
            [
                'attribute' => 'id_curso',
                'value' => function($searchModel){
                    $tmp = Curso::findOne($searchModel->id_curso);
                    return $tmp->id_curso.'-'.$tmp->nome;
                }
            ],
            'data_criacao',            

            ['class' => 'yii\grid\ActionColumn', 'visible' => Yii::$app->user->identity->username == 'admin'],
        ],
    ]); ?>
</div>
