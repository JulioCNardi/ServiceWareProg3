<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Ordem $model */

$this->title = $model->idOrdem;
$this->params['breadcrumbs'][] = ['label' => 'Ordems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ordem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idOrdem' => $model->idOrdem], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idOrdem' => $model->idOrdem], [
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
            'idOrdem',
            'dataAbertura',
            'dataFechamento',
            'observacao',
            'idCliente',
        ],
    ]) ?>

</div>
