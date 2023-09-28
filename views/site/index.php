<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'My test task';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Выполненное тестовое задание</h1>
        <p><a class="btn btn-outline-dark" href="https://hr.atlassys.tech/otpravlennyetz/php_developer/">TASK</a></p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-6 mb-12  text-center">
                <h2>Запустить скрипт</h2>

                <p><?= Html::a('START', ['/item/get-ten-items'], ['class'=>'btn btn-outline-dark']) ?></p>
            </div>
            <div class="col-lg-6 mb-12 text-center">
                <h2>GitHub</h2>

                <p><a class="btn btn-outline-dark" href="https://www.yiiframework.com/forum/">GITHUB</a></p>
            </div>
        </div>

    </div>
</div>
