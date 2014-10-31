<?php
class getProjectInfoWaiting {
  public $projectID; // int
}

class getProjectInfoWaitingResponse {
  public $return; // int
}

class getOutput {
  public $projectID; // int
}

class getOutputResponse {
  public $return; // string
}

class getProjectInfoCompleted {
  public $projectID; // int
}

class getProjectInfoCompletedResponse {
  public $return; // int
}

class getProjectInfoRunning {
  public $projectID; // int
}

class getProjectInfoRunningResponse {
  public $return; // int
}

class submit_project {
  public $protein_ID; // string
  public $list_ligand_filename; // string
  public $center_X; // float
  public $center_Y; // float
  public $center_Z; // float
  public $sizeX; // float
  public $sizeY; // float
  public $sizeZ; // float
  public $docking_parameter_filename; // string
}

class submit_projectResponse {
  public $return; // int
}

class getProjectInfoFailed {
  public $projectID; // int
}

class getProjectInfoFailedResponse {
  public $return; // int
}


/**
 * dockingws class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class dockingws extends SoapClient {

  private static $classmap = array(
                                    'getProjectInfoWaiting' => 'getProjectInfoWaiting',
                                    'getProjectInfoWaitingResponse' => 'getProjectInfoWaitingResponse',
                                    'getOutput' => 'getOutput',
                                    'getOutputResponse' => 'getOutputResponse',
                                    'getProjectInfoCompleted' => 'getProjectInfoCompleted',
                                    'getProjectInfoCompletedResponse' => 'getProjectInfoCompletedResponse',
                                    'getProjectInfoRunning' => 'getProjectInfoRunning',
                                    'getProjectInfoRunningResponse' => 'getProjectInfoRunningResponse',
                                    'submit_project' => 'submit_project',
                                    'submit_projectResponse' => 'submit_projectResponse',
                                    'getProjectInfoFailed' => 'getProjectInfoFailed',
                                    'getProjectInfoFailedResponse' => 'getProjectInfoFailedResponse',
                                   );

//  public function dockingws($wsdl = "http://g52.ifi.refer.org/dockingws/dockingws?WSDL", $options = array()) {
  public function dockingws($wsdl = "http://localhost:8080/dockingws/dockingws?WSDL", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param getOutput $parameters
   * @return getOutputResponse
   */
  public function getOutput(getOutput $parameters) {
    return $this->__soapCall('getOutput', array($parameters),       array(
            'uri' => 'http://dockingws/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param getProjectInfoWaiting $parameters
   * @return getProjectInfoWaitingResponse
   */
  public function getProjectInfoWaiting(getProjectInfoWaiting $parameters) {
    return $this->__soapCall('getProjectInfoWaiting', array($parameters),       array(
            'uri' => 'http://dockingws/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param getProjectInfoRunning $parameters
   * @return getProjectInfoRunningResponse
   */
  public function getProjectInfoRunning(getProjectInfoRunning $parameters) {
    return $this->__soapCall('getProjectInfoRunning', array($parameters),       array(
            'uri' => 'http://dockingws/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param getProjectInfoCompleted $parameters
   * @return getProjectInfoCompletedResponse
   */
  public function getProjectInfoCompleted(getProjectInfoCompleted $parameters) {
    return $this->__soapCall('getProjectInfoCompleted', array($parameters),       array(
            'uri' => 'http://dockingws/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param getProjectInfoFailed $parameters
   * @return getProjectInfoFailedResponse
   */
  public function getProjectInfoFailed(getProjectInfoFailed $parameters) {
    return $this->__soapCall('getProjectInfoFailed', array($parameters),       array(
            'uri' => 'http://dockingws/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param submit_project $parameters
   * @return submit_projectResponse
   */
  public function submit_project(submit_project $parameters) {
    return $this->__soapCall('submit_project', array($parameters),       array(
            'uri' => 'http://dockingws/',
            'soapaction' => ''
           )
      );
  }

}

?>
