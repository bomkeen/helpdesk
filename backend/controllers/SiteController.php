<?php
namespace backend\controllers;

use Yii;
use yii\web\YiiAsset;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\Helpdeskuser;

/**
 * Site controller
 */
class SiteController extends Controller
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

                  //  'logout' => ['post'],
                ],
            ],
            'access'=>[
          'class'=>AccessControl::className(),
           'only'=>['index'],
          'rules'=>[
            [
              'allow'=>true,
              'actions'=>['index','create','delete','deleteconfirm'],
              'roles'=>['Admin','office','staff']
            ],
            ]
        ]
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
        ];
    }

    public function actionIndex()
    {
      if (!Yii::$app->user->isGuest) {
        $this->layout = 'main_left';
      }else{
        $this->layout = 'main';
      }

        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->renderAjax('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    
}
