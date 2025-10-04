<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\VarDumper;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
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
            Yii::$app->session->setFlash('success', "Вы успешно вошли в систему!");
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



    public function actionRegister()
    {
        $model = new \app\models\User();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->auth_key = Yii::$app->security->generateRandomString();
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
                if ($model->save()) {
                    // VarDumper::dump($model->attributes, 10, true);
                    // die;
                    Yii::$app->user->login($model, 24 * 3600);
                    Yii::$app->session->setFlash('success', "Пользователь успешно зарегистрирован");
                    Yii::$app->session->setFlash('info', "Пользователь успешно авторизован");
                    return $this->goHome();
                }
            } else {
                VarDumper::dump($model->errors, 10, true);
                die;
            }
        }
        return $this->render('register', ['model' => $model,]);
    }
}
