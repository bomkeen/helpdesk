<?php

namespace backend\controllers;

use Yii;
use app\models\Staff;
use app\models\StaffSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
          'access' => [
              'class' => AccessControl::className(),

              'rules' => [
                  [
                      'actions' => ['create','index','view','update','delete','deleteconfirm'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
          ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                  //  'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main_left';
        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Staff model.
     * @param integer $staff_id
     * @param string $staff_name
     * @return mixed
     */
    public function actionView($staff_id, $staff_name)
    {

      if (Yii::$app->request->isAjax) {
             return $this->renderAjax('view', [
                 'model' => $this->findModel($staff_id, $staff_name),
             ]);
         } else {
             return $this->render('view', [
                 'model' => $this->findModel($staff_id, $staff_name),
             ]);
         }

    }
    public function actionDeleteconfirm($staff_id, $staff_name)
    {

      if (Yii::$app->request->isAjax) {
             return $this->renderAjax('deleteconfirm', [
                 'model' => $this->findModel($staff_id, $staff_name),
             ]);
         } else {
             return $this->render('deleteconfirm', [
                 'model' => $this->findModel($staff_id, $staff_name),
             ]);
         }

    }
    /**
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'empty';
        $model = new Staff();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          //  return $this->redirect(['view', 'staff_id' => $model->staff_id, 'staff_name' => $model->staff_name]);
              return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $staff_id
     * @param string $staff_name
     * @return mixed
     */
    public function actionUpdate($staff_id, $staff_name)
    {
        $this->layout = 'empty';
        $model = $this->findModel($staff_id, $staff_name);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'staff_id' => $model->staff_id, 'staff_name' => $model->staff_name]);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Staff model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $staff_id
     * @param string $staff_name
     * @return mixed
     */
    public function actionDelete($staff_id, $staff_name)
    {
        $this->findModel($staff_id, $staff_name)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $staff_id
     * @param string $staff_name
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($staff_id, $staff_name)
    {
        if (($model = Staff::findOne(['staff_id' => $staff_id, 'staff_name' => $staff_name])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
