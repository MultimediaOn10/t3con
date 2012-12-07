<?php

class TestController extends AppController {
    
    public $helpers = array('Html', 'Form');

    
   
    public function index() {
        
        $t= new Test();
         $test2 =$this->Navigation->getElements("1");
      //   $test3=$this->test2->getElements("1");
       //  $test2->getElements("1");
         print_r($test2);
        $this->set('test', "Hallo");
    }
    
}
?>
