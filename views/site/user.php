<?php
use app\components\Hello;
?>
<?=$name;?>
<div> Widjet sais: <?=Hello::widget(['message'=>"Hello World"])?></div>
