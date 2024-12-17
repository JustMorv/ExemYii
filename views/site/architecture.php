<?php

use yii\helpers\Html;

$this->title = 'Архитектура системы';
?>

<div class="container mt-5">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <p class="lead text-center">Посмотрите описание архитектуры системы для вашего проекта.</p>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title">Как устроена система?</h4>
        </div>
        <div class="card-body">
            <p>Архитектура системы включает компоненты, такие как серверы, базы данных и интерфейсы, которые взаимодействуют для выполнения всех функций приложения.</p>
        </div>
    </div>
</div>
