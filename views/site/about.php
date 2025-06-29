<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Módulos';

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-3">
            <br>
                <h2>Cadastro</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <?= \yii\helpers\Html::a('Ir para Produtos', ['produto/index'], ['class' => 'btn btn-primary']) ?>
                <?= \yii\helpers\Html::a('Ir para Clientes', ['cliente/index'], ['class' => 'btn btn-primary']) ?>
                <?= \yii\helpers\Html::a('Ir para Veiculo', ['veiculo/index'], ['class' => 'btn btn-primary']) ?>
                <br><br>
                <?= \yii\helpers\Html::a('Ir para Ordem', ['ordem/index'], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="col-lg-4 mb-3">
            <br>
                <h2>Financeiro</h2>

                <p>Em construção.</p>

                <p><a class="btn btn-outline-secondary disabled" href="#">Entrar</a></p>
            </div>
            <div class="col-lg-4">
            <br>
                <h2>Relatório</h2>

                <p>Em construção.</p>

                <p><a class="btn btn-outline-secondary disabled" href="#">Entrar</a></p>
            </div>
        </div>

</div>
