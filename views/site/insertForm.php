<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <h2>Inserta un alias</h2>
            <p>-</p>
        </div>
        <div class="col-md-4 my-search">
          <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'tag')->label('Tag') ?>
            <?= $form->field($model, 'code')->label('Código') ?>
            <?= $form->field($model, 'url')->label('Página Web') ?>
          <div class="form-group">
            <?= Html::submitButton('Añade el link!', ['class' => 'btn btn-primary']) ?>
          </div>
        <?php ActiveForm::end(); ?>
        </div>
    
    </div>
</div>