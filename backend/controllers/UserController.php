<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can( 'watcher' )){
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can( 'watcher' )){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);

        }else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can( 'createUser' )){
            $model = new User();

            if ($model->load(Yii::$app->request->post())) {
                $lastInsertID = $model->getPrimaryKey();
                $model->id = $lastInsertID;

                $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);

                $model->created_at = time();
                $model->updated_at = time();

                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        }else{
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can( 'editUser' )){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
                if(count($_POST['User']['password_hash']) <= 59){
                    $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
                }
                $model->updated_at = time();
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }

        }else{
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can( 'deleteUser' )){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);

        }else{
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
