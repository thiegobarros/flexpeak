<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use conquer\select2\Select2Widget;
use yii\helpers\ArrayHelper;
use app\models\Professor;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */
/* @var $form yii\widgets\ActiveForm */
?>

<div style="width:400px" class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_criacao')->hiddenInput(['value' => date('Y-m-d')])->label(false); ?>

    <?=
    
    $form->field($model, 'id_professor')->widget(
        Select2Widget::className(),
        [
            'items'=>ArrayHelper::map(Professor::find()->all(), 'id_professor', 'nome')
        ]
    );
    
    ?>

    <div class="form-group">
        <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
