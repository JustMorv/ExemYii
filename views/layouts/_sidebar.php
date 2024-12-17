<?php
?>

<aside class="shadow">
    <?= \yii\bootstrap5\Nav::widget([
        'options' => [
            'class' => 'd-flex flex-column nav-pills'
        ],
        'items' => [
            // Добавляем ссылки на все компоненты системы
            [
                'label' => Yii::t('app', 'Настройки'),
                'url' => ['site/settings/']
            ],
            [
                'label' => Yii::t('app', 'Анализ клиентской базы'),
                'url' => ['site/analysis']
            ],
            [
                'label' => Yii::t('app', 'Диагностический анализ'),
                'url' => ['site/diagnostic']
            ],
            [
                'label' => Yii::t('app', 'Предсказательный анализ'),
                'url' => ['site/predictive']
            ],
            [
                'label' => Yii::t('app', 'Сегментация данных'),
                'url' => ['site/segmentation']
            ],
            [
                'label' => Yii::t('app', 'Персонализация'),
                'url' => ['site/personalization']
            ],
            [
                'label' => Yii::t('app', 'Автоматизированная рассылка'),
                'url' => ['site/mailing']
            ],
            [
                'label' => Yii::t('app', 'Архитектура системы'),
                'url' => ['site/architecture']
            ]
        ]
    ]) ?>
</aside>
