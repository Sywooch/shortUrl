<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\Url;
use app\models\ShortenUrlForm;

class ShortUrlController extends Controller
{
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

    public function actionIndex()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $originalURL = $data['originalURL'];
            $mUrl = new Url();
            $mUrl->insertUrl($originalURL);
            $token = $mUrl->token;
            $shortUrl = \yii\helpers\Url::canonical() . rawurlencode($token);
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ['shortUrl' => $shortUrl];
        }

        $model = new ShortenUrlForm();

        return $this->render('index',['model' => $model]);
    }

    public function actionRedirect()
    {
        $token = rawurldecode(Yii::$app->request->get('token'));
        $mUrl = new Url();
        $url = $mUrl->find()->getUrl($token);
        $url = \yii\helpers\Html::encode($url);

        return $this->redirect($url,302);
    }
}
