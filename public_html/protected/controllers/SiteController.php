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
        $userName = Yii::app()->request->getParam('user');
        $repoName = Yii::app()->request->getParam('repo');

        $client = new Github\Client();

        $repo = $client->api('repos')->show($userName, $repoName);

        try {
            $contributors = $client->api('repo')->contributors($userName, $repoName);
        } catch(Exception $e) {
            $contributors = null;
        }

        $this->render('repo', array(
            'repo' => $repo,
            'contributors' => $contributors
        ));
    }

    public function actionUser()
    {
        $userName = Yii::app()->request->getParam('user');

        $client = new Github\Client();
        $user = $client->api('user')->show($userName);

        $this->render('user', array(
            'user' => $user
        ));
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
