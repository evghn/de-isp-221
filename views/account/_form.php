<?php

use app\models\Course;
use app\models\Master;
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

    <div class="alert alert-info alert-db d-none" role="alert">
        Для прохождения курса необходимо наличие сервера базы данных у пользователя.
    </div>

    <div class="row-cols-md-6 d-flex gap-3">
        <?= $form->field($model, 'date_start')->textInput(['type' => 'date']) ?>
        <?= $form->field($model, 'time_start')->textInput(['type' => 'time']) ?>
    </div>

    <?= $form->field($model, 'pay_type_id')->dropDownList(PayType::getPayTypes(), ['prompt' => 'Выберете тип оплаты']) ?>

    <?= $form->field($model, 'master_id')->dropDownList(Master::getMasters(), ['prompt' => 'Выберете преподавателя для курса']) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать заявку', ['class' => 'btn btn-outline-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJsFile('/js/application.js', ['depends' => 'yii\web\YiiAsset']);
