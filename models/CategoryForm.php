<?php
namespace app\models;

use Yii;
use yii\base\Model;

class CategoryForm extends Model {
    
    public $name;
    public $email;
    public $file;

    //put your code here
    public function rules() {
        
        return [
            
                [['name','email'], 'required' ,'message'=>'Empty field!'],
                ['email','email', 'message'=> 'Wrong e-mail adress!'],
                [['file'],'file'],

               ];
        
        
    }
}
