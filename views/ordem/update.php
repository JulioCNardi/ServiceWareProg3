<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ordem $model */

$this->title = 'Alteração da ordem: ' . $model->idOrdem;

?>
<div class="ordem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
