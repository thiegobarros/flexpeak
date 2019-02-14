<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aluno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_nascimento')->textInput() ?>

    <?= $form->field($model, 'logradouro')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'numero')->textInput() ?>

    <?= $form->field($model, 'bairro')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cidade')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'estado')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_criacao')->textInput() ?>

    <?= $form->field($model, 'cep')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_curso')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
