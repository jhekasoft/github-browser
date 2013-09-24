<?php

/**
 * This is the model class for table "ghb_like".
 *
 * The followings are the available columns in table 'ghb_like':
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $datetime
 */
class Like extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'ghb_like';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type, name, datetime', 'required'),
            array('type', 'length', 'max'=>4),
            array('name', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, type, name, datetime', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'datetime' => 'Datetime',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('type',$this->type,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('datetime',$this->datetime,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Adds like data to contributors
     * @param  array $allContributors
     * @return array
     */
    public function loadLikeDataToContributors(array $allContributors)
    {
        $allContributorsLogins = array();
        if (count($allContributors) > 0) {
            foreach ($allContributors as $contributor) {
                $allContributorsLogins[] = $contributor['login'];
            }
        }

        $likes = $this->getLikes('user', $allContributorsLogins);

        if (count($allContributors) > 0) {
            foreach ($allContributors as $key => $contributor) {
                $allContributors[$key]['like'] = isset($likes[$contributor['login']]);
            }
        }

        return $allContributors;
    }

    /**
     * Adds like data to repositories
     * @param  array $repositories
     * @return array
     */
    public function loadLikeDataToRepositories(array $repositories)
    {
        $repositoriesNames = array();
        if (count($repositories) > 0) {
            foreach ($repositories as $repository) {
                $repositoriesNames[] = $repository['username'] . '/' . $repository['name'];
            }
        }

        $likes = $this->getLikes('repo', $repositoriesNames);

        if (count($repositories) > 0) {
            foreach ($repositories as $key => $repository) {
                $repositories[$key]['like'] = isset($likes[$repository['username'] . '/' . $repository['name']]);
            }
        }

        return $repositories;
    }

    /**
     * Return likes
     * @param  string     $type
     * @param  null|array $names
     * @return null|array
     */
    protected function getLikes($type = 'user', $names = null)
    {
        if (null == $names) {
            return null;
        }

        $criteria = new CDbCriteria();
        $criteria->condition = 'type=:type';
        $criteria->params = array('type' => $type);

        $criteria->addInCondition('name', $names);
        $likesAll = self::model()->findAll($criteria, array('index' => 'login'));

        $likes = array();
        if (count($likesAll) > 0) {
            foreach ($likesAll as $like) {
                $likes[$like->name] = true;
            }
        }

        return $likes;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param  string $className active record class name.
     * @return Like   the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
