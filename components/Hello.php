<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
class Hello extends Widget
{    
     public $message;
   
    
public function run() {
    
    
    
    
  //  return "Hello";
 //   return $this->message;
    
        $b= Html::tag("b",$this->message);
        $p= Html::tag("p",$b);
        
        return $p;
}

}
?>
<p><b>message</b></p>