<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Job;
use app\models\Category;


class JobController extends \yii\web\Controller
{
    /*
    * Access control
    */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'edit', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create', 'edit', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

     public function actionIndex()
    {
        //create query
        $query = Job::find();

        $pagination = new Pagination([
                'defaultPageSize' => 20,
                'totalCount' => $query->count(),
        ]);

        $jobs = $query->orderBy('create_date DESC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();


        //Render view
        return $this->render('index', [
            'jobs' => $jobs,
            'pagination' => $pagination,
        ]);
    }
    public function actionDetails($id)
    {
        //get Job
        $job = Job::find()
        ->where(['id' => $id])
        ->one();

        //Render View
        return $this->render('details', ['job'=> $job]);
    }

    public function actionCreate()
    {
        $job = new Job();

            if ($job->load(Yii::$app->request->post())) {
                if ($job->validate()) {


                    //save
                    $job->save();

                    yii::$app->getSession()->setFlash('success', 'Job Added');


                    //redirect
                    return $this->redirect('index.php?r=job');
                }
            }

            return $this->render('create', [
                'job' => $job,
                ]);
    }

    public function actionDelete($id)

    {
            $job = Job::findOne($id);

            //save
            $job->delete();

            yii::$app->getSession()->setFlash('success', 'Job Deleted');


            //redirect
            return $this->redirect('index.php?r=job');
    }

    public function actionEdit($id)
    {
        $job = Job::findOne($id);

        if(Yii::$app->user->identity->id != $job->user_id){
            //redirect
            return $this->redirect('index.php?r=job');
        }

            if ($job->load(Yii::$app->request->post())) {
                if ($job->validate()) {


                    //save
                    $job->save();

                    yii::$app->getSession()->setFlash('success', 'Job Updated');


                    //redirect
                    return $this->redirect('index.php?r=job');
                }
            }

            return $this->render('edit', [
                'job' => $job,
                ]);

        }

   

}
