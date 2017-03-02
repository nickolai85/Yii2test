<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use app\models\Categories;
use app\modules\admin\models\Categories;

//$form->field($model, 'id')
//     ->dropDownList(
//            ArrayHelper::map(Product::find()->asArray()->all(), 'parent_id', 'name')
//            )
//?>


<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?=$form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Categories::find()->asArray()->all(), 'id', 'name'))?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'status')->radioList(array(1 => 'Published', 0 =>'Unpublished'), array('class' => 'i-checks'));?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
