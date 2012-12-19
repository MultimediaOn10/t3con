<?php

class IndexController extends AppController {
    
    public $helpers = array('Html', 'Form');

    
   
    public function index() {
        
        $this->loadModel("Conference");
        $conference=$this->Conference->findById(1);
      //  print_r($conference);
      //  $this->set('index', "Hallo");

        $id=1;
        
        $this->loadModel("Programpoint");
        $programpoints=$this->Programpoint->query("Select * from programpoints left join Referents as referent1 on Programpoints.referent_id=referent1.id left join Referents as referent2 on Programpoints.referent2_id=referent2.id left join topics on programpoints.topic_id=topics.id order by programpoints.start_time ASC");
       // print_r($programpoints);
      /*  $options['conditions']=array('programpoints.conference_id'=>$id);
        //$options['fields']=array();
        $options['joins']=array(
            array(
                'table' => 'referents',
           //     'alias'=>'r',
                'type'=>'LEFT',
                'conditions'=>array('Programpoint.referent_id=referents.id'),
                'fields'=>array('lastname AS lastname1','firstname AS firstname1'),
            )/*,
            array(
                'table' => 'referents',
               // 'alias'=>'r',
                'type'=>'LEFT',
                'conditions'=>array('Programpoint.referent2_id=referents.id')
            )*///);
       // $rows=$this->Programpoint->find('all',$options); 
     //   print_r($rows);
        
        
        
        $this->set('con', $conference);
        $this->set('points', $programpoints);
        $this->render('home');
        
        
    }
    
}
?>
