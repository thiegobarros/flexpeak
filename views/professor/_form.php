<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Professor */
/* @var $form yii\widgets\ActiveForm */
?>

<br>

<div style="width:400px" class="professor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_nascimento')->widget(DatePicker::classname(), [
        'language' => 'pt',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'data_criacao')->hiddenInput(['value' => date('Y-m-d')])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
