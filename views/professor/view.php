<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Professor */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Professores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="professor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id_professor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id_professor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja apagar este professor?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div style="width:400px">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_professor',
            'nome',
            'data_nascimento',
            'data_criacao',
        ],
    ]) ?>
    </div>

</div>
