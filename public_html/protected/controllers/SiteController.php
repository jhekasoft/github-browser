<?php

class SiteController extends Controller
{

    public $searchKeyword;

    public function actionIndex()
    {
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionSearch()
    {
        $searchKeyword = Yii::app()->request->getParam('search');

        $repositories = array();
        if (strlen($searchKeyword) > 0) {
            $client = new Github\Client();
            $response = $client->api('repos')->find($searchKeyword, array());
            $repositories = $response['repositories'];
        }

        $this->render('search', array(
            'searchKeyword' => $searchKeyword,
            'repositories' => $repositories
        ));
    }

    public function actionRepo()
    {
        $this->render('repo');
    }

    public function actionUser()
    {
        $this->render('user');
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
