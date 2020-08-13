<?php

namespace app\controllers;

class OrderController extends \yii\web\Controller
{
    public function actionListorders()
    {
        return $this->render('listorders');
    }

    public function actionSaveorders()
    {
        return $this->render('saveorders');
    }

}
