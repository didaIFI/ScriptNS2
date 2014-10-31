<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $name
 * @property string $password
 * @property integer $protein_mgr
 * @property integer $ligand_mgr
 * @property integer $docking_mgr
 */
class User extends CActiveRecord {

    public $verifyCode;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('protein_mgr, ligand_mgr, docking_mgr', 'numerical', 'integerOnly' => true),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
            array('name','match', 'pattern'=>'/^([A-Z a-z])+$/'),
            array('password', 'length', 'min' => 6, 'max' => 20),
            array('name, password', 'length', 'max' => 200),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('user_id, name, password, protein_mgr, ligand_mgr, docking_mgr', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'user_id' => 'User',
            'name' => 'Name',
            'password' => 'Password',
            'protein_mgr' => 'Protein Mgr',
            'ligand_mgr' => 'Ligand Mgr',
            'docking_mgr' => 'Docking Mgr',
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

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('protein_mgr', $this->protein_mgr);
        $criteria->compare('ligand_mgr', $this->ligand_mgr);
        $criteria->compare('docking_mgr', $this->docking_mgr);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    //
   

}
