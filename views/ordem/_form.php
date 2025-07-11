<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Ordem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ordem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dataAbertura')->input('date') ?>

    <?= $form->field($model, 'dataFechamento')->input('date') ?>

    <?= $form->field($model, 'observacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idCliente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
