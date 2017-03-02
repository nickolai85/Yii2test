<?php
namespace app\models;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $f= ActiveForm::begin(); ?>
    <?=$f->field($form, 'name',$name)?>


    <?=Html::submitButton('Save')?>
<?php ActiveForm::end();?>

