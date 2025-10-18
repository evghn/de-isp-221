<?php

use app\models\Course;
use app\models\PayType;
use app\models\Status;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

// 2025-10-04 13:49:15
$this->title = "Заявка №" . $model->id . ' от ' . Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i:s');
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="application-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-outline-info']) ?>
        <? # Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) 
        ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'created_at',
                'value' => Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i:s'),
            ],
            [
                'attribute' => 'course_id',
                'value' => Course::getCourses()[$model->course_id],
            ],
            [
                'attribute' => 'master_id',
                'value' => $model?->master?->name ?? "не найден",
            ],
            [
                'attribute' => 'date_start',
                'value' => Yii::$app->formatter->asDate($model->date_start, 'php:d.m.Y'),
            ],
            [
                'attribute' => 'pay_type_id',
                'value' => PayType::getPayTypes()[$model->pay_type_id],
            ],
            [
                'attribute' => 'status_id',
                'value' => Status::getStausTitle($model->status_id),
            ],

            [
                'label' => 'Отзыв',
                'format' => 'html',
                'value' => $model?->feedback?->comment ? nl2br($model?->feedback?->comment) : '',
                'visible' => (bool)$model?->feedback?->comment,
            ],

        ],
    ]) ?>

</div>