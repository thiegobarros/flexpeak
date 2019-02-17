<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfessorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Professores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cadastrar Professor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_professor',
            'nome',
            'data_nascimento',
            'data_criacao',

            ['class' => 'yii\grid\ActionColumn', 'visible' => Yii::$app->user->identity->username == 'admin'],
        ],
    ]); ?>
</div>
