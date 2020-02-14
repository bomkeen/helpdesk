<?php

namespace frontend\controllers;

use Yii;
use app\models\Helpdesk;
use app\models\HelpdeskSearch;
use app\models\Line_token;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Sort;
use kartik\mpdf\Pdf;
use app\models\Helpdeskuser;
use yii\helpers\Url;
use yii\filters\AccessControl;
/**
 * HelpdeskController implements the CRUD actions for Helpdesk model.
 */
class HelpdeskController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'index','delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create','index'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['admin','office','staff'],
                    ],
                ],
            ],
            
        ];
    }

    /**
     * Lists all Helpdesk models.
     * @return mixed
     */

public function actionReport($id) {
    // get your HTML raw content without any layouts or scripts

        $content = $this->renderPartial('_reportview', [
                'model' => $this->findModel($id)
          ]);


    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_UTF8,
        // A4 paper format
        'format' => array(210,148),
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT,
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER,
        // your html content input
        'content' => $content,
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting
        'cssFile' => '@frontend/web/css/pdf.css',
        //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
          'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',
         // set mPDF properties on the fly
        'options' => ['title' => 'ใบแจ้งซ่อมคอมพิวเตอร์และอุปกรณ์ต่อพ่วง'],
         // call mPDF methods on the fly
        'methods' => [
            //'SetHeader'=>['ศูนย์เทคโนโลยีสารสนเทศ โรงพยาบาลวิเชียรบุรี'],
        //    'SetFooter'=>['หน้า {PAGENO}'],
        ]
    ]);

    // return the pdf output as per the destination setting
    return $pdf->render();
}

    public function actionIndex()
    {

        $searchModel = new HelpdeskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Helpdesk model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
       return $this->render('view', [
            'model' => $this->findModel($id),
            'userrole'=>$this->userrole()
        ]);
    }

    /**
     * Creates a new Helpdesk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
      if (Yii::$app->user->isGuest) {
          $userrole = 1;
      } else {
          $usermodel = new Helpdeskuser();
          $usermodel = Helpdeskuser::find()->where(['username'=>Yii::$app->user->identity->username])->one();
          $userrole = $usermodel->role;
      }
        $model = new Helpdesk();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->tickets_id]);
            $linemodel = new Line_token();
            $linemodel = Line_token::find()->one();
            $linetoken = $linemodel->token;
            if ($linemodel->active<>1)
              {
                  return $this->redirect(['index']);
              }else{
                  return $this->redirect('./line.php?message="แจ้งซ่อมเรื่อง '.$model->subject.' - แผนกที่แจ้ง '.$model->depfullname.'"&token='.$linetoken);
              }
        } else {
            return $this->render('create', [
                'model' => $model,
                'user_role' => $userrole,
            ]);
        }
    }

    /**
     * Updates an existing Helpdesk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
       $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->tickets_id]);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'user_role' => $this->userrole(),
            ]);
        }
    }

    /**
     * Deletes an existing Helpdesk model.
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
     * Finds the Helpdesk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Helpdesk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Helpdesk::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     protected function userrole()
    {
          $usermodel = Helpdeskuser::find()->where(['username'=>Yii::$app->user->identity->username])->one();
          $userrole = $usermodel->role;
          return $userrole;
    }
}
