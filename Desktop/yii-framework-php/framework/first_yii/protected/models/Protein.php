<?php

/**
 * This is the model class for table "protein".
 *
 * The followings are the available columns in table 'protein':
 * @property integer $protein_id
 * @property string $name
 * @property string $file_name
 *
 * The followings are the available model relations:
 * @property Map[] $maps
 * @property Project[] $projects
 */
class Protein extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Protein the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'protein';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, file_name', 'required'),
            array('name, file_name', 'length', 'max' => 200),
            array('protein_id, name, file_name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'maps' => array(self::HAS_MANY, 'Map', 'protein_id'),
            'projects' => array(self::HAS_MANY, 'Project', 'protein_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'protein_id' => 'Protein',
            'name' => 'Name',
            'file_name' => 'File Name',
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

        $criteria->compare('protein_id', $this->protein_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('file_name', $this->file_name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
