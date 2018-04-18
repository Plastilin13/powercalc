<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EnergySourceTypes */

$this->title = 'Создать тип источника энергии';
$this->params['breadcrumbs'][] = ['label' => 'Типы источников энергии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="energy-source-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>