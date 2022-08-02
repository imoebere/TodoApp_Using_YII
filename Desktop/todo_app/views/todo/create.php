<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbltodo */

$this->title = 'Create Task';
$this->params['breadcrumbs'][] = ['label' => 'Todo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbltodo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
