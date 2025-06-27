<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ordem $model */

$this->title = 'Nova Ordem';

?>
<div class="ordem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
