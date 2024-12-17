<?php

namespace app\controllers;

use app\models\RegisterForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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

    public function actionRegister()
    {
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            Yii::$app->session->setFlash('success', 'Registration successful!');
            return $this->redirect(['site/login']);
        }
        return $this->render('register', ['model' => $model]);
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    // Метод для входа в систему
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            // Если пользователь уже авторизован, перенаправляем на главную страницу
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // Если пользователь авторизован и его роль - admin, перенаправляем на модуль admin
            if (Yii::$app->user->identity->role === 'admin') {
                return $this->redirect(['admin/default/index']);
            }
            // В противном случае, перенаправляем на главную страницу
            return $this->goHome();
        }

        // Если форма не прошла валидацию, возвращаем на страницу логина с ошибками
        return $this->render('login', [
            'model' => $model,
        ]);
    }

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
    public function actionUsers()
    {
        return $this->render('users'); // Рендерит страницу пользователей
    }

    /**
     * Displays the client base analysis page.
     *
     * @return string
     */
    public function actionAnalysis()
    {
        return $this->render('analysis'); // Рендерит страницу анализа клиентской базы
    }
    public function actionPredictive()
    {
        return $this->render('predictive');
    }

    // Сегментация данных
    public function actionSegmentation()
    {
        return $this->render('segmentation');
    }
    public function actionDiagnostic()
    {
        return $this->render('diagnostic');
    }

    // Персонализация
    public function actionPersonalization()
    {
        return $this->render('personalization');
    }

    // Автоматизированная рассылка
    public function actionMailing()
    {
        return $this->render('mailing');
    }

    // Архитектура системы
    public function actionArchitecture()
    {
        return $this->render('architecture');
    }

    /**
     * Displays the send messages page.
     *
     * @return string
     */
    public function actionMessages()
    {
        return $this->render('messages'); // Рендерит страницу отправки сообщений
    }

    /**
     * Displays the system settings page.
     *
     * @return string
     */
    public function actionSettings()
    {
        return $this->render('settings'); // Рендерит страницу настроек системы
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
