<?php

use app\models\Ordem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\OrdemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ordens';

?>
<div class="ordem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ordem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'idOrdem',
            'dataAbertura',
            'dataFechamento',
            'observacao',
            'idCliente',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Ordem $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idOrdem' => $model->idOrdem]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
