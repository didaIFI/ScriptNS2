<?php

Yii::import('ext.helpers.EDownloadHelper');

class ProjectController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'refresh', 'dock', 'download', 'send', 'copy'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('*'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

//    public function actionAjax(){
//        $model=new Project;
//        
//        if(isset($_POST['Project'])){
//            $model->attributes=$_POST['Project'];
//            if($model->validate()){
//                //print_r($_REQUEST);
//                
//                return;
//            }
//        }
//          $this->render('_form',array('model'=>$model));
//    }
//    public function actionProjects() {
//        $ligand = Ligand::model()->findAll(array('order' => 'file_name'));
//        $ligand_array = array('0' => '');
//        foreach ($ligand as $val) {
//            $ligand_array[$val->id] = $val->file_name;
//        }
//        $model = new Project('search');
//        $model->unsetAttributes();  // clear any default values
//        if (isset($_GET['Project']))
//            $model->attributes = $_GET['Project'];
//        $this->render('users_grid',array(
//            'model'=>$model, 'ligand' => $ligand, 'ligand_array' => $ligand_array_array,
//        ));
//        
//    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('dock', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Project;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Project'])) {

            $model->attributes = $_POST['Project'];

            if ($model->save()) {
                if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(array(
                        'status' => 'success',
                        'div' => "Project successfully added"
                    ));
                    exit;
                } else {
                    $this->redirect(array('view', 'id' => $model->project_id));
                }
            }
        }

        if (Yii::app()->request->isAjaxRequest) {
            echo CJSON::encode(array(
                'status' => 'failure',
                'div' => $this->renderPartial('_form', array('model' => $model), true)));
            exit;
        } else {
            $this->render('create', array(
                'model' => $model,
            ));
        }
    }

    //docking
    public function actionDock($id) {
        $this->render('dock', array(
            'model' => $this->loadModel($id),
        ));
    }

    //download
    public function actionDownload($id) {
         $this->render('download', array(
            'model' => $this->loadModel($id),
        ));
    }
       //refresh
    public function actionRefresh($id) {
        $this->render('refresh', array(
            'model' => $this->loadModel($id),
        ));
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        // post from update.
        if (0 == $id) {
            if (isset($_SESSION['id_update_project']))
                $id = $_SESSION['id_update_project'];
            else
                throw new Exception('update error');
        }
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Project'])) {
            $model->attributes = $_POST['Project'];
            $project_name = $_POST['Project']['project_name'];
            $file_dpf = $_POST['Project']['file_dpf'];

            if ($model->save()) {
                if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(array(
                        'status' => 'success',
                        'div' => "Project successfully added"
                    ));
                    exit;
                } else {
                    $this->redirect(array('view', 'id' => $model->project_id));
                }
            }
        }

        if (Yii::app()->request->isAjaxRequest) {
            $_SESSION['id_update_project'] = $id;
            echo CJSON::encode(array(
                'status' => 'failure',
                'div' => $this->renderPartial('_form', array('model' => $model), true)));
            exit;
        } else {
            $this->render('create', array(
                'model' => $model,
            ));
        }
    }

//    public function actionDownload($id, $file_field, $file_name) {
//        $model = $this->loadModel($id);
//        header('Pragma: public');
//        header('Expires: 0');
//        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//        header('Content-Transfer-Encoding: binary');
//        //header('Content-length: 1665');
//        header('Content-Type: text/html');
//        header('Content-Disposition: attachment; filename=' . Yii::app()->baseUrl . "/protected/views/project/fileUpload/1OKE.pdbqt" . $file_name);
//
//        echo stream_get_contents($model->$file_field, -1, 0);
//    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();
        Yii::import('ext.helpers.EDownloadHelper');
        EDownloadHelper::download(Yii::getPathOfAlias('webroot.tmp_param.18413736') . DIRECTORY_SEPARATOR . 'DLG.zip');
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Project');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {



        $model = new Project('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Project']))
            $model->attributes = $_GET['Project'];


        $this->render('admin', array(
            'model' => $model,
        ));
    }




    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Project the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Project::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Project $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'project-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

//    public function actionDownload() {
//        EDownloadHelper::download(EDownloadHelper::download(Yii::getPathOfAlias('webroot.tmp_param.18413736') . DIRECTORY_SEPARATOR . 'DLG.zip'));
//
//        if (file_exists($file)) {
//            return Yii::app()->getRequest()->sendFile('DLG.zip', @file_get_contents(Yii::getPathOfAlias('webroot.tmp_param.18413736') . DIRECTORY_SEPARATOR . 'DLG.zip'));
//        }
//    }

//    public function actionDownload($id) {
//        $model = new Project;
//        Yii::import('ext.helpers.EDownloadHelper');
//        EDownloadHelper::download(Yii::getPathOfAlias('webroot.tmp_param.18413736') . DIRECTORY_SEPARATOR . 'DLG.zip');
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
//        if (isset($_POST['Project'])) {
//            $model->attributes = $_POST['Project'];
//            if ($model->save())
//                $this->redirect(array('download', 'id' => $model->project_id));
//        }
//
//        $this->render('download', array(
//            'model' => $model,
//        ));
//        $model = new Project;
//        if(isset($_POST['Project'])){
//            $file = $_POST['Project']['file_dpf'];
//            exec(`cp $file /home/dida`);
//        }
    //$request = Yii::app()->getRequest();
    //$request->sendFile('autodock.tar.bz2', file_get_contents(Yii::app()->basePath . '/protected/views/project/fileUpload'));
    //}
    //$this->disableProfilers();  
//        $rootPathServer = $_SERVER['SCRIPT_FILENAME'];
//        $fullPathDir = substr($rootPathServer, 0, strpos($rootPathServer, 'index')) . 'tmp_param';
//        $fullPathLigandFile = $fullPathDir . '/' . 'result.rar';
//        $file = Yii::app()->baseUrl . '/protected/views/project/1OKE.pdbqt';
//
//        Yii::app()->request->sendFile('1OKE.pdbqt', file_get_contents($file));
//     public function actionDownloadFile()
//{
//    // Recherche de l'enregistrement en base de données
//    $model=Image::model()->findByPk('7');
// 
//    // code introduit pour transférer le fichier 
//    header('Pragma: public');
//    header('Expires: 0');
//    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//    header('Content-Transfer-Encoding: binary');
//    header('Content-length: '.$model->file_size);
//    header('Content-Type: '.$model->file_type);
//    header('Content-Disposition: attachment; filename='.$model->file_dpf);
// 
//    // Récupération du fichier        
//    echo $model->file_content;
//}
//    public function disableProfilers() {
//        if (Yii::app()->getComponent('log')) {
//            foreach (Yii::app()->getComponent('log')->routes as $route) {
//                if (in_array(get_class($route), array('CProfileLogRoute', 'CWebLogRoute', 'YiiDebugToolbarRoute', 'DbProfileLogRoute'))) {
//                    $route->enabled = false;
//                }
//            }
//        }
//    }
}