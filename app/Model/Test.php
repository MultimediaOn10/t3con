<?php


    
class Test extends AppModel {
    

    public $name = 'Test';
    public $validate =array();
    
    
    public function getElements ($condition){
    
        find('select', array(
        'conditions' => array('presentations' => $condition), //array of conditions
      //  'recursive' => 1, //int
        'fields' => array('presentations', 'type', 'discription'), //array of field names
     //   'order' => array('Model.created', 'Model.field3 DESC'), //string or array defining order
     //   'group' => array('Model.field'), //fields to GROUP BY
      //  'limit' => n, //int
      //  'page' => n, //int
      //  'offset' => n, //int
      //  'callbacks' => true //other possible values are false, 'before', 'after'
        ));
    
        return $all;
    }
}
?>
