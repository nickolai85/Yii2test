<?php

namespace app\controllers;


use Yii;
use yii\helpers\Html; //подключаем HTML special chars;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\CategoryForm; //Я создал в models/MyForm.php;

use app\models\Categories; //Я создал в models/MyForm.php;
use app\models\Products; //Я создал в models/MyForm.php;

use yii\data\Pagination;


class ProductController extends Controller{

        public function actionCategory()
    {
            $id= \Yii::$app->request->get('id');
            $category=Categories::findOne($id);

            $products = Products::find()->where(['category_id' => $id]);
            $pagination=new Pagination([
                'defaultPageSize'=> 5,
                'totalCount' => $products -> count()
           
                 ]);
            $products =$products->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();
       
             return $this->render('index',
                [
                    'categoryName' => $category,
                    'products' => $products,
                    'pagination' => $pagination,

                ]);
    }
    
    
    public function actionNewcategory() {
        $form= new CategoryForm();
        $name='jora';
//        if($form->load(Yii::$app->request->post())&& $form->validate()){
//            $name =Html::encode($form->name);
//               
//        }
//        else{
//            $name='';
//        }
        
        return $this->render('CategoryForm', 
                [
                 'form'=>$form,
                 'name'=>$name,
                 
                ]
                );
        
    }
    
    
    public function actionIndex()
    {
            $id= \Yii::$app->request->get('id');
            $product=Products::findOne($id);

             return $this->render('view_product',
                [
                    'product' => $product,

                ]);
    }
    
    
}
