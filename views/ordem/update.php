<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ordem $model */

$this->title = 'Update Ordem: ' . $model->idOrdem;
$this->params['breadcrumbs'][] = ['label' => 'Ordems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idOrdem, 'url' => ['view', 'idOrdem' => $model->idOrdem]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ordem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
