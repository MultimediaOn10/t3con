<?php

class TestController extends AppController {
    
    public $helpers = array('Html', 'Form');

    
   
    public function index() {
         $r=new $this->Test;
         $r->getElements("1");
       // $t= new Test();
       //  $test2 =$this->Navigation->getElements("1");
      //   $test3=$this->test2->getElements("1");
       //  $test2->getElements("1");
         echo ("hallo");
        $this->set('test', "Hallo");
    }
    
}
?>
