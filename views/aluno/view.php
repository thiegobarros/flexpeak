<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Curso;

/* @var $this yii\web\View */
/* @var $model app\models\Aluno */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aluno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id_aluno], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id_aluno], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Dejesa apagar este aluno?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_aluno',
            'nome',
            'data_nascimento',
            'cep',
            'logradouro',
            'bairro',
            'cidade',
            'estado',
            'numero',            
            'data_criacao',
            
            // 'id_curso',
            [
                'attribute' => 'id_curso',
                'value' => function($model){
                    $tmp = Curso::findOne($model->id_curso);
                    return $tmp->nome;
                }
            ],
        ],
    ]) ?>

</div>
