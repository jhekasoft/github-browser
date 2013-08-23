<?php

class SiteController extends Controller
{

    public $searchKeyword;

    public function actionIndex()
    {
        $_GET['user'] = Yii::app()->params['defaultRepo']['username'];
        $_GET['repo'] = Yii::app()->params['defaultRepo']['name'];
        $_GET['main_page'] = true;
        $this->forward('/site/repo');

        //$this->render('index');
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

			$repositories = Like::model()->loadLikeDataToRepositories($repositories);
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

		$contributors = null;
		$additionalContributors = null;

        try {
            $allContributors = $client->api('repo')->contributors($userName, $repoName);
			$allContributors = Like::model()->loadLikeDataToContributors($allContributors);

            $contributors = array_slice($allContributors, 0, 5);
            $additionalContributors = array_slice($allContributors, 5);
        } catch (Exception $e) {
			if (404 != $e->getCode()) {
				echo $e;
				Yii::app()->end();
			}
        }

        $this->render('repo', array(
            'repo' => $repo,
            'contributors' => $contributors,
            'additionalContributors' => $additionalContributors,
            'mainPage' => Yii::app()->request->getParam('mainPage', false)
        ));
    }

    public function actionUser()
    {
        $userName = Yii::app()->request->getParam('user');

        $client = new Github\Client();
        $user = $client->api('user')->show($userName);

		$likeModel = Like::model()->find('type=:type AND name=:name', array(
			'type' => 'user', 'name' => $userName
		));
		$isLiked = !empty($likeModel)?true:false;

        $this->render('user', array(
            'user' => $user,
			'isLiked' => $isLiked
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
