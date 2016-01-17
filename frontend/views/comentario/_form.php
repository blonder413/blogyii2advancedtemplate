<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model frontend\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'web')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-md-12">{image}</div><div class="col-md-12">{input}</div></div>',
    ]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Comentar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
