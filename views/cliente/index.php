<?php

use app\models\Cliente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ClienteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clientes';
?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'idCliente',
            'nome',
            'cpf',
            'endereco',
            'email:email',
            //'telefone',
            //'cidade',
            //'numero',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cliente $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idCliente' => $model->idCliente]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
