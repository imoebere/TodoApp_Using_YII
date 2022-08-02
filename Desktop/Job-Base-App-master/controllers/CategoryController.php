<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Category;


class CategoryController extends \yii\web\Controller
{
    /*
    * Access control
    */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

	public function actionIndex()
    {
    	//create query
    	$query = category::find();

    	$pagination = new Pagination([
    			'defaultPageSize' => 10,
    			'totalCount' => $query->count(),
    	]);

    	$categories = $query->orderBy('name')
    	->offset($pagination->offset)
    	->limit($pagination->limit)
    	->all();



        return $this->render('index', [
        	'categories' => $categories,
        	'pagination' => $pagination,
        ]);
    }
    
    public function actionCreate()
    {
        #return $this->render('create');
        $category = new Category();

    if ($category->load(Yii::$app->request->post())) {
    	//Validation
        if ($category->validate()) {
            // Save Record
            $category->save();
            //send message
            yii::$app->getSession()->setFlash('success', 'Category Added');

            return $this->redirect('index.php?r=category');
        }
    }

    return $this->render('create', [
        'category' => $category,
    ]);
    }
    
     public function actionJobspercategory($id)
    {
        //get category
        $category = Category::find()
        ->where(['id' => $id])
        ->one();

        //Render View
        return $this->render('jobspercategory', ['category'=> $category]);
    }
}
