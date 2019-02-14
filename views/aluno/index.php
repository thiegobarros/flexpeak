<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
        <?= Html::a('Create Aluno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_aluno',
            'nome:ntext',
            'data_nascimento',
            'logradouro:ntext',
            'numero',
            //'bairro:ntext',
            //'cidade:ntext',
            //'estado:ntext',
            //'data_criacao',
            //'cep:ntext',
            //'id_curso',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
