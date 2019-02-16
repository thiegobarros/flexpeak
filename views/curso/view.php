<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Professor;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="curso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id_curso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id_curso], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja apagar este curso?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_curso',
            'nome',
            'data_criacao',
            // 'id_professor',
            [
                'attribute' => 'id_professor',
                'value' => function($model){
                    $tmp = Professor::findOne($model->id_professor);
                    return $tmp->nome;
                }
            ],
        ],
    ]) ?>

</div>
