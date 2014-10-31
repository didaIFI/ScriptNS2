<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $project_id
 * @property string $project_name
 * @property string $file_dpf
 * @property integer $user_id
 * @property integer $protein_id
 * @property integer $ligand_id
 * @property integer $map_id
 * @property string $job_stat
 * @property string $job_rslt
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Protein $protein
 * @property Ligand $ligand
 * @property Map $map
 */
class Project extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Project the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'project';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('project_name', 'required'),
            array('user_id, protein_id, ligand_id, map_id', 'numerical', 'integerOnly' => true),
            array('project_name, file_dpf, job_stat, job_rslt', 'length', 'max' => 200),
            array('project_id, project_name, file_dpf, user_id, protein_id, ligand_id, map_id, job_stat, job_rslt', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'protein' => array(self::BELONGS_TO, 'Protein', 'protein_id'),
            'ligand' => array(self::BELONGS_TO, 'Ligand', 'ligand_id'),
            'map' => array(self::BELONGS_TO, 'Map', 'map_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'project_id' => 'Project',
            'project_name' => 'Project Name',
            'file_dpf' => 'File Dpf',
            'user_id' => 'User',
            'protein_id' => 'Protein',
            'ligand_id' => 'Ligand',
            'map_id' => 'Map',
            'job_stat' => 'Job Stat',
            'job_rslt' => 'Job Rslt',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('project_id', $this->project_id);
        $criteria->compare('project_name', $this->project_name, true);
        $criteria->compare('file_dpf', $this->file_dpf, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('protein_id', $this->protein_id);
        $criteria->compare('ligand_id', $this->ligand_id);
        $criteria->compare('map_id', $this->map_id);
        $criteria->compare('job_stat', $this->job_stat, true);
        $criteria->compare('job_rslt', $this->job_rslt, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'project_name ASC',
            ),
        ));
    }

    //fucntion to get status of job
    public static function status($model) {
        ////will get model->subject 
        $this->job_stat = 'Done';
   
     

    }
public function disableProfilers() {
        if (Yii::app()->getComponent('log')) {
            foreach (Yii::app()->getComponent('log')->routes as $route) {
                if (in_array(get_class($route), array('CProfileLogRoute', 'CWebLogRoute', 'YiiDebugToolbarRoute', 'DbProfileLogRoute'))) {
                    $route->enabled = false;
                }
            }
        }
    }
}
