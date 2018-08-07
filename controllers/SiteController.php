<?php

namespace app\controllers;

use app\models\Orders;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\ArrayHelper;
use app\models\Avto;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
     * {@inheritdoc}
     * Polysons: Town - delivary in town, 15 - 15 km from RoundRoute, Obl - Region SP
     *
     */
    public function actionPiterTown(){
        return '
        { "type": "Polygon", "coordinates": [
  [
    [60.092961, 30.367098],[60.043542, 30.433016],[59.989921, 30.486574],[59.969962, 30.552492], [59.872061, 30.531893],
    [59.848576, 30.454988],[59.811935, 30.328646],[59.834754, 30.270967],[59.798790, 30.155611], [59.818160, 30.008669],
    [59.814010, 29.842500],[59.869299, 29.775209],[59.900358, 29.659853], [60.020867, 29.727144],
    [60.039421, 29.974336],[60.060710, 30.141878],[60.100505, 30.265474]
    
  ]
] }
        ';
    }
    public function actionPiter15(){
        return '
        { "type": "Polygon", "coordinates": [
        [
            [59.958636, 30.823881],[59.842046, 30.775816],[59.768017, 30.657713],[59.710478, 30.433866], [59.704233, 30.264952],
    [59.693128, 30.046598],[59.700069, 29.850218],[59.702151, 29.652464],[59.782559, 29.473936], [59.965366, 29.389757],
    [60.176067, 29.803117],[60.220505, 30.080522],[60.221871, 30.357927], [60.154168, 30.587266],
    [60.096612, 30.708116],[60.005276, 30.820726]    
        
        
        ],
  [
    [60.092961, 30.367098],[60.043542, 30.433016],[59.989921, 30.486574],[59.969962, 30.552492], [59.872061, 30.531893],
    [59.848576, 30.454988],[59.811935, 30.328646],[59.834754, 30.270967],[59.798790, 30.155611], [59.818160, 30.008669],
    [59.814010, 29.842500],[59.869299, 29.775209],[59.900358, 29.659853], [60.020867, 29.727144],
    [60.039421, 29.974336],[60.060710, 30.141878],[60.100505, 30.265474]
    
  ]
] }
        ';
    }
    public function actionPiterObl(){
        return '
        { "type": "Polygon", "coordinates": [
  [
     [61.323121, 29.291179],[60.693817, 32.949626],[61.206741, 35.685222],[59.324320, 35.377604], [59.098982, 34.751384],
    [59.419637, 32.982585],[59.110284, 32.587077],[59.425236, 31.916911],[58.448539, 30.027263], [59.008428, 27.753093],
    [59.386027, 28.192546],[60.602120, 27.862956],[60.887136, 28.346354]
  ],
  [
     [59.958636, 30.823881],[59.842046, 30.775816],[59.768017, 30.657713],[59.710478, 30.433866], [59.704233, 30.264952],
    [59.693128, 30.046598],[59.700069, 29.850218],[59.702151, 29.652464],[59.782559, 29.473936], [59.965366, 29.389757],
    [60.176067, 29.803117],[60.220505, 30.080522],[60.221871, 30.357927], [60.154168, 30.587266],
    [60.096612, 30.708116],[60.005276, 30.820726]   
    
  ]
] }
        ';
    }
    /**59.816073, 30.008495
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $model = new Orders();
        $data=ArrayHelper::map(Avto::find()->asArray()->all(), 'id_avto', 'model_avto');
        $this->layout ='map';
        return $this->render('index',[
            'model'=>$model,
            'data'=>$data,

        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
