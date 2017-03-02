<?php
use yii\widgets\LinkPager;
?>
<h1>Categories</h1>

<p>Session is is :<?=$name?></p>
<?php 
foreach($categories as $items){?>
    
<li><b><a href="<?=Yii::$app->urlManager->createUrl(['site/user','id'=>$items->id])?>"><?=$items->name;?></a></b></li>
    
<?php }?>
<?=LinkPager::widget(['pagination'=>$pagination])?>