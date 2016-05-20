<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerJsFile("js/addUrl.js", ['depends' => 'app\assets\AppAsset']);
?>

<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'shortenUrl-form', 'enableClientValidation' => true]); ?>

        <?= $form->field($model, 'originalURL', ['inputOptions' => ['id' => 'originalURL']])->label("Paste your original URL here:") ?>

        <div class="form-group">
            <?= Html::submitButton('Shorten', ['class' => 'btn btn-primary', 'name' => 'shorten-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-lg-5">
        <div id="shortUrl"></div>
    </div>
</div>
