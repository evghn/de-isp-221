<?php

use app\models\Application;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h3><?= Html::encode($this->title) ?></h3>


    <?php Pjax::begin(); ?>
    <div class="d-flex  align-items-baseline flex-wrap gap-3">
        <div class="d-flex gap-3">
            <div>
                Сортировка:
            </div>
            <?= $dataProvider->sort->link('course_id') ?> |
            <?= $dataProvider->sort->link('user_id') ?> |
            <?= $dataProvider->sort->link('date_start') ?>
        </div>
        <div class="d-flex align-items-baseline gap-2 flex-wrap">
            <div>
                Фильтр:
            </div>
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'item',
        'pager' => [
            'class' => LinkPager::class
        ],

    ]) ?>
    <?php Pjax::end(); ?>


</div>