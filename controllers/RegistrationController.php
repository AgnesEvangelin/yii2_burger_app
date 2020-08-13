<?php

namespace app\controllers;

class RegistrationController extends \yii\web\Controller
{
    public function actionSignup()
    {
        return $this->render('signup');
    }

}
