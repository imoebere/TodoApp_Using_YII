<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbltodo */

$this->title = 'Create Tbltodo';
$this->params['breadcrumbs'][] = ['label' => 'Tbltodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbltodo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
