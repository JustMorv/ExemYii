<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\User;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-4">
    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'username',
            'email:email',
            'role',
            [
                'attribute' => 'role',
                'value' => function ($model) {
                    return $model->role;
                },
                'content' => function ($model) {
                    return Html::dropDownList('role', $model->role, [
                        User::ROLE_ADMIN => 'Admin',
                        User::ROLE_USER => 'User',
                        User::ROLE_TEACHER => 'Teacher',
                        User::ROLE_STUDENT => 'Student',
                    ], [
                        'class' => 'form-control',
                        'data-id' => $model->id,
                    ]);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
</div>
