<?php

class LikeController extends Controller
{

    public function actionLike()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            throw new CHttpException(404, 'Not found');
        }

        $user = Yii::app()->request->getParam('user');
        $name = Yii::app()->request->getParam('name', null);
        $type = Yii::app()->request->getParam('type');

        $likeName = !empty($name)?$user . '/' . $name:$user;

        $like = Like::model()->find('type=:type AND name=:name', array(
            'type' => $type, 'name' => $likeName
        ));

        $result = 'ok';

        if (!$like) {
            $now = new DateTime();

            $modelLike = new Like;
            $modelLike->attributes = array(
                'type' => $type,
                'name' => $likeName,
                'datetime' => $now->format(DateTime::ISO8601),
            );

            if (!$modelLike->save()) {
                $result = 'fail';
            }
        }

        $data = array('result' => $result);
        echo CJavaScript::jsonEncode($data);
        Yii::app()->end();
    }

    public function actionUnlike()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            throw new CHttpException(404, 'Not found.');
        }

        $user = Yii::app()->request->getParam('user');
        $name = Yii::app()->request->getParam('name', null);
        $type = Yii::app()->request->getParam('type');

        $likeName = !empty($name)?$user . '/' . $name:$user;

        $like = Like::model()->find('type=:type AND name=:name', array(
            'type' => $type, 'name' => $likeName
        ));

        $result = 'fail';

        if ($like) {
            if ($like->delete()) {
                $result = 'ok';
            }
        } else {
            $result = 'ok';
        }

        $data = array('result' => $result);
        echo CJavaScript::jsonEncode($data);
        Yii::app()->end();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param  integer        $id the ID of the model to be loaded
     * @return Like           the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Like::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');

        return $model;
    }
}
