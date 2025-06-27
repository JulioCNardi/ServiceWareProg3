<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Veiculo $model */

$this->title = 'Alterar Veiculo: ' . $model->idVeiculo;
?>
<div class="veiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
