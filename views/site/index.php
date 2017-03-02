<?php
$this->title = 'Categories';

use yii\widgets\LinkPager;
?>
<h1>Categories</h1>
<?php 
foreach($categories as $items){?>
    
<li><b><a href="<?=Yii::$app->urlManager->createUrl(['product/category/','id'=>$items->id])?>"><?=$items->name;?></a></b></li>
    
<?php }?>
<?=LinkPager::widget(['pagination'=>$pagination])?>