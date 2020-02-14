<?php

namespace backend\controllers;

use Yii;
use app\models\Helpdesktype;
use app\models\HelpdesktypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * HelpdesktypeController implements the CRUD actions for Helpdesktype model.
 */
class HelpdesktypeController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Helpdesktype models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main_left';
        $searchModel = new HelpdesktypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Helpdesktype model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
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
    /**
     * Creates a new Helpdesktype model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Helpdesktype();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Helpdesktype model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Helpdesktype model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Helpdesktype model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Helpdesktype the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Helpdesktype::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
