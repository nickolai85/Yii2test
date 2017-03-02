<?php
$this->title = 'Products in'.$categoryName->name;

use yii\widgets\LinkPager;
?>
<h1>Products in  <?=$categoryName->name;?></h1>
<?php 
foreach($products as $items){?>
    
<li><b><a href="<?=Yii::$app->urlManager->createUrl(['product','id'=>$items->id])?>"><?=$items->name;?></a></b></li>
    
<?php }?>
<?=LinkPager::widget(['pagination'=>$pagination])?>
