<?php

class AjaxrequestController extends AppController {
    
    public $helpers = array('Html', 'Form');

    $trackID = $_POST ["trackID"];

     $this->loadModel("Programpoint");
             $programpoints=$this->Programpoint->query("Select * from programpoints where `programpoint_id`='$trackID'");

    $getmycontent = $programpoints; //mysql_query("Select * from ");  

    $rows = array();
        
    while($row = mysql_fetch_array($givemenameandcolors)) {
      $rows[] = $row;
    }
    echo json_encode(array("items" => $rows));
    }
    
}
?>
