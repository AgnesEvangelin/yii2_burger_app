<?php

namespace app\controllers;

class BurgerBuilderController extends \yii\web\Controller
{
    public function actionAdditem()
    {
        return $this->render('additem');
    }

    public function actionRemoveitem()
    {
        return $this->render('removeitem');
    }

}
