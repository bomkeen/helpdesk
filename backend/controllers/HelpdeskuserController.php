<?php

namespace backend\controllers;

use Yii;
use app\models\Helpdeskuser;
use app\models\HelpdeskuserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * HelpdeskuserController implements the CRUD actions for Helpdeskuser model.
 */
class HelpdeskuserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
                'access'=>[
          'class'=>AccessControl::className(),
           'only'=>['index','create','delete','deleteconfirm','update'],
          'rules'=>[
            [
              'allow'=>true,
              'actions'=>['index','create','delete','deleteconfirm','udate'],
              'roles'=>['Admin']
            ],
               [
              'allow'=>true,
              'actions'=>['index','create','update'],
              'roles'=>['office','staff']
            ],
            ]
        ]
        ];
    }

    /**
     * Lists all Helpdeskuser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main_left';
        $searchModel = new HelpdeskuserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Helpdeskuser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Helpdeskuser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Helpdeskuser();

        if ($model->load(Yii::$app->request->post())) {
              if($model->role==''){
                 $model->role='User'; 
              }
            if ($model->save()) {
            $auth = Yii::$app->authManager;
            $authorRole = $auth->getRole($model->role); 
            $auth->assign($authorRole, $model->getPrimaryKey());
        }
            return $this->render(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Helpdeskuser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            if ($model->save()) {
                 $auth = Yii::$app->authManager;
                $roleUser = $auth->getRolesByUser($id);
                $auth->revokeAll($id);
                $authorRole = $auth->getRole($model->role);
                $auth->assign($authorRole,$id);
            }
        
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Helpdeskuser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
     public function actionDeleteconfirm($id)
     {

       if (Yii::$app->request->isAjax) {
              return $this->renderAjax('deleteconfirm', [
                  'model' => $this->findModel($id),
              ]);
          } else {
              return $this->render('deleteconfirm', [
                  'model' => $this->findModel($id),
              ]);
          }

     }
    public function actionDelete($id)
    {
      
        $this->findModel($id)->delete();
        $auth = Yii::$app->authManager;
        $auth->revokeAll($id);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Helpdeskuser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Helpdeskuser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id)
    {
        if (($model = Helpdeskuser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
