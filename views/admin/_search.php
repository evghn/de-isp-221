<?php

use app\models\Course;
use app\models\PayType;
use app\models\Status;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AdminSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1,
            'class' => 'd-flex gap-1'
        ],
    ]); ?>

    <div class="col-3">
        <?= $form->field($model, 'course_id')->dropDownList(Course::getCourses(), ['prompt' => "Онлайн курс"])->label(false) ?>
    </div>
    <div class="col-3">
        <?= $form->field($model, 'pay_type_id')->dropDownList(PayType::getPayTypes(), ['prompt' => "Тип оплаты"])->label(false)  ?>
    </div>
    <div class="col-3">
        <?= $form->field($model, 'status_id')->dropDownList(Status::getStatuses(), ['prompt' => "Статус заявки"])->label(false) ?>
    </div>

    <div class="form-group d-flex gap-1">
        <?= Html::submitButton('Найти', ['class' => 'btn btn-outline-primary']) ?>
        <?= Html::a('Сброс', '/admin', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>