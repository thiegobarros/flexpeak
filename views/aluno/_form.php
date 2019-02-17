<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use conquer\select2\Select2Widget;
use yii\helpers\ArrayHelper;
use app\models\Curso;
use kartik\date\DatePicker;

$this->registerJsFile('js/jquery.js');
$this->registerJsFile('js/aluno.js');

/* @var $this yii\web\View */
/* @var $model app\models\Aluno */
/* @var $form yii\widgets\ActiveForm */
?>

<br>

<div style="width:400px" class="aluno-form">

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

    <?= $form->field($model, 'cep')->textInput(['maxlength' => '8', 'minlength' => '8']) ?>

    <?= $form->field($model, 'logradouro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bairro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput() ?>    

    <?= $form->field($model, 'data_criacao')->hiddenInput(['value' => date('Y-m-d')])->label(false); ?>

    <?=
    
    $form->field($model, 'id_curso')->widget(
        Select2Widget::className(),
        [
            'items'=>ArrayHelper::map(Curso::find()->all(), 'id_curso', 'nome')
        ]
    );
    
    ?>

    <div class="form-group">
        <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
