<?php

use app\models\Course;
use app\models\PayType;
use app\models\Status;
use yii\bootstrap5\Html;

?>
<div class="card my-3">
    <h5 class="card-header"><?= "Заявка №" . $model->id . ' от ' . Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i:s') ?></h5>
    <div class="card-body">
        <div class="d-flex align-items-start gap-2">
            <div class="text-secondary fs-5">
                Курс:
            </div>
            <div class="fs-5">
                <?= Course::getCourses()[$model->course_id] ?>
            </div>
        </div>
        <!-- Дата начала 24.02.0022
        Тип оплаты Переводом по номеру телефона
        Статус Новая -->
        <div class="d-flex align-items-end gap-2">
            <div class="text-secondary fs-5">
                Дата начала:
            </div>
            <div class="fs-5">
                <?= Yii::$app->formatter->asDate($model->date_start, 'php:d.m.Y') ?>
            </div>
        </div>

        <div class="d-flex align-items-start gap-2">
            <div class="text-secondary fs-5">
                Тип оплаты:
            </div>
            <div class="fs-5">
                <?= PayType::getPayTypes()[$model->pay_type_id] ?>
            </div>
        </div>

        <div class="d-flex align-items-start gap-2">
            <div class="text-secondary fs-5">
                Статус:
            </div>
            <div class="fs-5">
                <?= Status::getStausTitle($model->staus_id) ?>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-3">
            <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-primary']) ?>
        </div>


    </div>
</div>