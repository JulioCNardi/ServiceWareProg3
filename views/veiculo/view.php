<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Veiculo $model */

$this->title = $model->idVeiculo;
\yii\web\YiiAsset::register($this);
?>
<div class="veiculo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idVeiculo' => $model->idVeiculo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idVeiculo' => $model->idVeiculo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idVeiculo',
            'placa',
            'modelo',
            'ano',
            'marca',
        ],
    ]) ?>

</div>
