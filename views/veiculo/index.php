<?php

use app\models\Veiculo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\VeiculoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Veiculos';
?>
<div class="veiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Veiculo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'idVeiculo',
            'placa',
            'modelo',
            'ano',
            'marca',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Veiculo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idVeiculo' => $model->idVeiculo]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
