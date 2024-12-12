<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Register';
?>
<div class="site-register">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to register:</p>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Register', ['class' => 'btn btn-success', 'name' => 'register-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <p>Already have an account? <?= Html::a('Login here', ['site/login']) ?></p>
</div>
