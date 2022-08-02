<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tbltodo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbltodo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'list')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('ADD', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
