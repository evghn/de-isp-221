<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\web\JqueryAsset;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var ActiveForm $form */

$disabled = $model->rule ? "" : "disabled";
?>
<div class="site-register">
    <h3>Регистрация пользователя</h3>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login') ?>
    <?= $form->field($model, 'password')/* ->passwordInput() */ ?>
    <?= $form->field($model, 'password_repeat')/* ->passwordInput() */ ?>
    <?= $form->field($model, 'full_name') ?>
    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
        'mask' => '8(999)999-99-99',
    ]) ?>


    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'rule')->checkbox() ?>

    <div class="form-group">
        <div class="d-flex justify-content-between align-items-end">
            <?= Html::a('Авторизация', ['login'], ['class' => '']) ?>
            <?= Html::submitButton('Создать пользователя', ['class' => "btn btn-outline-primary $disabled  btn-register"]) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->
<?php
$this->registerJsFile('/js/register.js', ['depends' => JqueryAsset::class]);
