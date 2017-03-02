<?php
namespace app\models;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php if($name){?>
<p>Entered name:</p><?=$name;?>
<p>Entered name:</p><?=$email;?>
<?php }?>
<?php $f= ActiveForm::begin( ['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?=$f->field($form, 'name')?>
    <?=$f->field($form, 'email')?>
    <?=$f->field($form, 'file')->fileInput()?>

    <?=Html::submitButton('Send')?>
<?php ActiveForm::end();?>

