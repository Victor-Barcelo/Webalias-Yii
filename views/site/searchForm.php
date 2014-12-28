<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <h2>Consulta un alias</h2>
            <p>Puedes introducir un tag y un código y la página asociada aparecerá! También puedes introducir unicamente un tag y ver todas las páginas asociadas a ese tag.</p>
        </div>
        <div class="col-md-4 my-search">
          <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'tag')->label('Tag') ?>
            <?= $form->field($model, 'code')->label('Código') ?>
          <div class="form-group">
            <?= Html::submitButton('Hazte con el Link!', ['class' => 'btn btn-primary']) ?>
          </div>
        <?php ActiveForm::end(); ?>
        </div>
    
    </div>
</div>
