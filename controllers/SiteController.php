<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html; //подключаем HTML special chars;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Myform; //Я создал в models/MyForm.php;
use app\models\Categories; //Я создал в models/MyForm.php;
use yii\data\Pagination;
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //Categories::find()->offset()->limit()->orderBy()->all();
       $categories = Categories::find();
       //Make pagination:
       
       $pagination=new Pagination([
           'defaultPageSize'=> 5,
           'totalCount' => $categories -> count()
           
       ]);
       $categories  =$categories->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();
       $cookies = Yii::$app->request->cookies;
       
        return $this->render('index',
                ['categories' => $categories,
                 'pagination' => $pagination,
           
                 
                ]);
    }

    
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }       

        $model = new LoginForm();
        
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
       
           return $this->redirect('\admin');
        }
        
        
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    

 


    
    
    public function actionForm() {
        
        $form= new MyForm();
        
        if($form->load(Yii::$app->request->post())&& $form->validate()){
            $name =Html::encode($form->name);
            $email=Html::encode($form->email);
               
           // if($form->file!=''){
                $form->file= UploadedFile::getInstance($form, 'file');
                
               $form->file->saveAs('photo/'.$form->file->baseName.".".$form->file->extension);
         //   }
        }
        else{
            $name='';
            $email='';
        }
        
        return $this->render('form', 
                ['form'=>$form,
                 'name'=>$name,
                 'email'=>$email]
                );
        
    }
    
    
    public function actionCategories() {
        //Categories::find()->offset()->limit()->orderBy()->all();
       $categories = Categories::find();
       //Make pagination:
       
       $pagination=new Pagination([
           'defaultPageSize'=> 5,
           'totalCount' => $categories -> count()
           
       ]);
       $categories  =$categories->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();
       $cookies = Yii::$app->request->cookies;
       
        return $this->render('categories',
                ['categories' => $categories,
                 'pagination' => $pagination,
                 //Get the Cookies Element
                  'name'=>$cookies->getValue('name'),
                 //Get the Session Element
                 // 'name'=> Yii::$app->session->get('name'),
                 
                ]);
    }
    
    
    public function actionUser() {
        $name= Yii::$app->request->get("name","Gest");
//Analog:
        //$name=isset($_GET["name"])? $_GET["name"]: "Gest";
        // the same with POST        
//Write Session
        $session=Yii::$app->session;
        $session->set('name',$name);
        //$session->remove('name');

        //Write Cookies
        $cookies= Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => 'name',
            'value' => $name
        ]
        ));
        //$cookies->remove('name');

        
        return $this->render('user',[
            
            'name'=>$name
            
        ]);
        
    }
    
    }



