<?php

use app\models\Course;
use app\models\PayType;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_id')->dropDownList(Course::getCourses(), ['prompt' => 'Выберете курс']) ?>

    <div class="col-md-3 col-12">
        <?= $form->field($model, 'date_start')->textInput(['type' => 'date', 'min' => date('Y-m-d')]) ?>
    </div>

    <?= $form->field($model, 'pay_type_id')->dropDownList(PayType::getPayTypes(), ['prompt' => 'Выберете тип оплаты']) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать заявку', ['class' => 'btn btn-outline-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>