<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Ingredients;
use yii\helpers\Json;

class BurgerBuilderController extends Controller
{
    //  yii2_burger_app/web/burger-builder/list-ingredient
    public function actionListIngredient()
    {
        // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // return Ingredients::find()->all();
        return Json::encode([
            'data' => Ingredients::find()->all(),
            'status' => 200
        ]);
    }

    public function actionAdditem()
    {
        return $this->render('additem');
    }

    public function actionRemoveitem()
    {
        return $this->render('removeitem');
    }

}
