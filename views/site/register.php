<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var ActiveForm $form */
?>
<div class="site-register">
    <h3>Регистрация пользователя</h3>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'full_name') ?>
    <?= $form->field($model, 'phone') ?>
    <?= $form->field($model, 'email') ?>

    <div class="form-group">
        <div class="d-flex justify-content-between">
            <?= Html::a('Авторизация', ['login'], ['class' => 'btn btn-outline-info']) ?>
            <?= Html::submitButton('Создать пользователя', ['class' => 'btn btn-outline-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->