<?php

class IndexController extends AppController {
    
    public $helpers = array('Html', 'Form');

    
   
    public function index() {
        
        $this->loadModel("Conference");
        $conference=$this->Conference->findById(1);
      //  print_r($conference);
        $this->set('index', "Hallo");
        $this->set('con', $conference);
        
        
    }
    
}
?>
