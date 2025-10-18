<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */


$this->title = 'Отмена Заявки: №' . $application->id . ' от ' . Yii::$app->formatter->asDatetime($application->created_at, 'php:d.m.Y H:i:s');;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $application->id, 'url' => ['view', 'id' => $application->id]];
$this->params['breadcrumbs'][] = 'Отмена';
?>
<div class="application-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-6">

        <?= $form->field($model, 'comment')->textarea(['rows' => 5]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Отменить заявку', ['class' => 'btn btn-outline-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>