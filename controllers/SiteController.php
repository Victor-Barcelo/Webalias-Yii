<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SearchForm;
use app\models\InsertForm;
use app\models\Links;

class SiteController extends Controller
{
    
    public function actionIndex() {
    }
    
    public function actionSearch() {
        $model = new SearchForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $links = $model->getLinks($model->tag, $model->code);
            return $this->render('searchResults', ['model' => $model, 'links' => $links]);
        } else {
            return $this->render('searchForm', ['model' => $model]);
        }
    }
    
    public function actionInsert() {
        $model = new InsertForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $insertSuccess = $model->insertLink($model->tag, $model->code, $model->url);
            return $this->render('insertForm', ['model' => $model, 'insertSuccess' => $insertSuccess]);
        } else {
            return $this->render('insertForm', ['model' => $model]);
        }
    }
}
