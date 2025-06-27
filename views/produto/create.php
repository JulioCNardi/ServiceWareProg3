<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Produto $model */

$this->title = 'Cadastro de Produto';

?>
<div class="produto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
